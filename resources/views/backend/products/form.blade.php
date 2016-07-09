@extends('layouts.backend.app')

@section('title', $product->exists ? 'Edit Product' : 'New Product')
@section('heading', $product->exists ? 'Editing '. $product->name : 'Create New Product')

@section('content')

    {!! Form::model($product, [
        'method' => $product->exists ? 'put' : 'post',
        'route' => $product->exists ? ['products.update', $product->id] : ['products.store']
    ]) !!}


        <div role="tabpanel">
            <!-- Nav tabs -->
            <ul class="nav nav-tabs" role="tablist">
                <li role="presentation" class="active">
                    <a href="#General" aria-controls="General" role="tab" data-toggle="tab">General</a>
                </li>
                <li role="presentation">
                    <a href="#Options" aria-controls="Options" role="tab" data-toggle="tab">Options</a>
                </li>
            </ul>
        
            <!-- Tab panes -->
            <div class="tab-content">
                <div role="tabpanel" class="tab-pane active" id="General">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                {!! Form::label('name', 'Product name') !!}
                                {!! Form::text('name', null, ['class'=>'form-control']) !!}
                            </div>
                        </div>
                        <div class="col-md-6">
                            
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                {!! Form::label('cost', 'Product cost') !!}
                                {!! Form::text('cost', null, ['class'=>'form-control']) !!}
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                {!! Form::label('price', 'Product price') !!}
                                {!! Form::text('price', null, ['class'=>'form-control']) !!}
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                {!! Form::label('group_id', 'Product group') !!}
                                {!! Form::select('group_id', $Groups, null, ['class'=>'form-control']) !!}
                            </div>
                        </div>
                    </div>

                </div>
                <div role="tabpanel" class="tab-pane" id="Options">

                    @foreach($Options as $option_key => $option)

                        <?php 

                            if($product->exists){
                                foreach($product->options as $product_option){
                                    if($product_option->option_id == $option->id){
                                        $option->product_options = $product_option;
                                        break;
                                    }
                                }
                            }
                         ?>

                        <h3>{{ $option->name }}</h3>
                        <hr>
                        {!! Form::hidden('options['.$option_key.'][option_id]', $option->id) !!}
                        
                        @foreach($option->items as $item_key => $item)
                            <div class="row">
                                
                                <?php 
                                    $price = 0;
                                    $status = 0;

                                    if (isset($option->product_options)) {
                                        foreach ($option->product_options->items as $product_item) {
                                            if ($product_item->id == $item->id) {
                                                $price = $product_item->price;
                                                $status = $product_item->status;
                                            }
                                        }
                                    }
                                ?>

                                {!! Form::hidden('options['.$option_key.'][items]['.$item_key.'][item_id]', $item->id) !!}
                                <div class="col-md-2">{{ $item->name }}</div>
                                <div class="col-md-2">{{ Form::text('options['.$option_key.'][items]['.$item_key.'][price]', $price, ['class'=>'form-control', 'placeholder'=>'Item price']) }}</div>
                                <div class="col-md-2">{{ Form::select('options['.$option_key.'][items]['.$item_key.'][status]', [0=>'Inactive', 1=>'Active'], $status, ['class'=>'form-control']) }}</div>
                            </div>
                        @endforeach

                        <hr>
                    @endforeach

                </div>
            </div>
        </div>

        {!! Form::submit('Submit', ['class'=>'btn btn-primary']) !!}

    {!! Form::close() !!}

@endsection
