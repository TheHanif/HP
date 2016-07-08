<?php

namespace App\Http\Controllers\Backend;

use App\Http\Requests;
use Illuminate\Http\Request;

use App\Models\Backend\Product;
use App\Models\Backend\Group;


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
        return view('backend.products', compact('products'));
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

        return view('backend.form_product', ['product'=>$product, 'Groups'=>$Groups]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Requests\ProductRequest $request)
    {
        $this->products->create($request->only('name','group_id','cost','price'));

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

        return view('backend.form_product', ['product'=>$product, 'Groups'=>$Groups]);
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

        return redirect(route('products.edit', $product->id))->with('status', 'Product has been updated');
    }

    // Change status of product
    public function change($id)
    {
        $product = $this->products->findOrFail($id);
        
        $product->status = ($product->status == 0)? 1 : 0;
        $product->save();

        return redirect(route('products.index'))->with('status', 'Product status has been updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
