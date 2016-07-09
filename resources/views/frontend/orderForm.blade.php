<div class="row">
    <div class="col-md-6 col-md-offset-3">
        <h2 class="text-center">Order now</h2>
        
        <hr>

        {!! Form::open() !!}
            
            <h4>Delivery detail...</h4>
            <hr>
            <div class="row">
                <div class="col-md-6 col-sm-12">
                    <div class="form-group">
                        {!! Form::label('first_name', 'First name') !!}
                        {!! Form::text('first_name', null, ['class'=>'form-control']) !!}
                    </div>
                </div>
                <div class="col-md-6 col-sm-12">
                    <div class="form-group">
                        {!! Form::label('last_name', 'Last name') !!}
                        {!! Form::text('last_name', null, ['class'=>'form-control']) !!}
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6 col-sm-12">
                    <div class="form-group">
                        {!! Form::label('phone', 'Phone or Mobile') !!}
                        {!! Form::text('phone', null, ['class'=>'form-control']) !!}
                    </div>
                </div>
                <div class="col-md-6 col-sm-12">
                    <div class="form-group">
                        {!! Form::label('email', 'Email address') !!}
                        {!! Form::email('email', null, ['class'=>'form-control']) !!}
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6 col-sm-12">
                    <div class="form-group">
                        {!! Form::label('city', 'Your city') !!}
                        {!! Form::email('city', null, ['class'=>'form-control']) !!}
                    </div>
                </div>
                <div class="col-md-6 col-sm-12">
                    <div class="form-group">
                        {!! Form::label('area', 'Delivery area') !!}
                        {!! Form::text('area', null, ['class'=>'form-control']) !!}
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12 col-sm-12">
                    <div class="form-group">
                        {!! Form::label('address', 'Delivery address') !!}
                        {!! Form::textarea('address', null, ['class'=>'form-control']) !!}
                    </div>
                </div>
            </div>


            <hr>
            <h4>Order detail...</h4>
            <hr>

            {!! Form::submit('Place order', ['class'=>'btn btn-primary btn-lg']) !!}
            
            <div class="clearfix"></div>
            <br>
            

        {!! Form::close() !!}

    </div>
</div>