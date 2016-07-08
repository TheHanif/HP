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
                <div class="form-group">
                    {!! Form::label('name', 'Product name') !!}
                    {!! Form::text('name', null, ['class'=>'form-control']) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('cost', 'Product cost') !!}
                    {!! Form::text('cost', null, ['class'=>'form-control']) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('price', 'Product price') !!}
                    {!! Form::text('price', null, ['class'=>'form-control']) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('group_id', 'Product group') !!}
                    {!! Form::select('group_id', $Groups, null, ['class'=>'form-control']) !!}
                </div>
            </div>
            <div role="tabpanel" class="tab-pane" id="Options">Options here</div>
        </div>
    </div>

    {!! Form::submit('Submit', ['class'=>'btn btn-primary']) !!}

    {!! Form::close() !!}

@endsection
