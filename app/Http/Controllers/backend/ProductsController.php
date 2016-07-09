<?php

namespace App\Http\Controllers\Backend;

use App\Http\Requests;
use Illuminate\Http\Request;

use App\Models\Backend\Product;
use App\Models\Backend\Group;
use App\Models\Backend\Option;
use App\Models\Backend\ProductOption;
use App\Models\Backend\ProductOptionItem;


class ProductsController extends Controller
{
    protected $products;

    public function __construct(Product $products)
    {
        $this->products = $products;

        Parent::__construct();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = $this->products->paginate(10);
        return view('backend.products.products', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $product = new Product();
        $Group = new Group();
        $Groups = $Group->lists('name', 'id');

        $Option = new Option();
        $Options = $Option->with('items')->get();

        return view('backend.products.form', ['product'=>$product, 'Groups'=>$Groups, 'Options'=>$Options]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Requests\ProductRequest $request)
    {
        // Add product
        $product = $this->products->create($request->only('name','group_id','cost','price'));

        $options = $request->input('options');

        // Add options
        foreach ($options as $option) {
            
            $product_option = new ProductOption();
            $product_option->product_id = $product->id;
            $product_option->option_id = $option['option_id'];
            $product_option->save();

            // Add option items
            foreach ($option['items'] as $item) {

                $product_option_item = new ProductOptionItem();
                $product_option_item->product_option_id = $product_option->id;
                $product_option_item->option_item_id = $item['item_id'];
                $product_option_item->price = $item['price'];
                $product_option_item->status = $item['status'];
                $product_option_item->save();
            }
        }

        return redirect(route('products.index'))->with('status', 'Product has been created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {   
        $product = $this->products->findOrFail($id);

        $Group = new Group();
        $Groups = $Group->lists('name', 'id');

        $Option = new Option();
        $Options = $Option->with('items')->get();

        return view('backend.products.form', ['product'=>$product, 'Groups'=>$Groups, 'Options'=>$Options]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Requests\ProductRequest $request, $id)
    {
        $product = $this->products->findOrFail($id);
        $product->fill($request->only('name','group_id','cost','price'))->save();

        foreach ($product->options as $option) {
            foreach ($option->optionItems as $item) {
                $item->delete();
            }
            $option->delete();
        }
        
        $options = $request->input('options');

        // Add options
        foreach ($options as $option) {
            
            $product_option = new ProductOption();
            $product_option->product_id = $product->id;
            $product_option->option_id = $option['option_id'];
            $product_option->save();

            // Add option items
            foreach ($option['items'] as $item) {

                $product_option_item = new ProductOptionItem();
                $product_option_item->product_option_id = $product_option->id;
                $product_option_item->option_item_id = $item['item_id'];
                $product_option_item->price = $item['price'];
                $product_option_item->status = $item['status'];
                $product_option_item->save();
            }
        }

        return redirect(route('products.edit', $id))->with('status', 'Product has been updated');
    }

    // Change status of product
    public function change($id)
    {
        $product = $this->products->findOrFail($id);
        
        $product->status = ($product->status == 0)? 1 : 0;
        $product->save();

        return redirect(route('products.index'))->with('status', 'Product status has been updated');
    }

    // Display confirmation for deleting product
    public function confirm($id)
    {
        $product = $this->products->findOrFail($id);
        return view('backend.products.confirm', compact('product'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = $this->products->findOrFail($id);

        foreach ($product->options as $option) {
            foreach ($option->optionItems as $item) {
                $item->delete();
            }
            $option->delete();
        }

        $product->delete();

        return redirect(route('products.index'))->with('status', 'Product has been deleted');
    }
}
