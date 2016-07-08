@extends('layouts.backend.app')

@section('title', 'Add Product')
@section('heading', 'Add product')

@section('content')

    {!! Form::open() !!}

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
                    {!! Form::label('Product name') !!}
                    {!! Form::text('name', null, ['class'=>'form-control']) !!}
                </div>
            </div>
            <div role="tabpanel" class="tab-pane" id="Options">Options here</div>
        </div>
    </div>

    {!! Form::submit('Submit', ['class'=>'btn btn-primary']) !!}

    {!! Form::close() !!}

@endsection
