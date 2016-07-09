@extends('layouts.backend.app')

@section('title', 'Delete Product')
@section('heading', 'Confirm delete '. $product->name)

@section('content')

    {!! Form::model($product, [
        'method' => 'delete',
        'route' =>  ['products.destroy', $product->id]
    ]) !!}
        
        <div class="alert alert-danger">
            <strong>Warning!</strong> You are about to delete a product. This action cannot be undone. Are you sure you want to continue?
        </div>

        {!! Form::submit('Yes, delete this product!', ['class'=>'btn btn-danger']) !!}

        <a href="{{ route('products.index') }}" class="btn btn-success">
            <strong>No, get me out of here!</strong>
        </a>

    {!! Form::close() !!}

@endsection
