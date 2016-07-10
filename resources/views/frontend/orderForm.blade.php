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
            
            <div class="products_container" id="products_container">
                
                <div class="row">
                    <div class="col-xs-8 col-md-6">
                        {!! Form::label('quantity', 'Halwapoori pack (Serves 1)') !!}
                        <strong class="help-block price" data-price="55">Rs. 55/-</strong>
                        <p>
                            2 Large Poories <br>
                            Murgh chana <br>
                            Aloo girebi <br>
                            Halwa <small class='text-xs'>(100 Grams)</small> <br>
                            Achari piyaz <br>
                            Yogurt & Creame <br>
                        </p>
                    </div>
                    <div class="col-xs-4 col-md-offset-3 col-md-3">
                        {!! Form::number('quantity[0]', 0, ['class'=>'form-control', 'min'=>0]) !!}
                        <small class="help-block">Total Rs.&nbsp;<span class='total'>0</span>/-</small>
                    </div>
                    {!! Form::hidden('product_id[0]', 0) !!}
                </div>
                <hr>

                <div class="row">
                    <div class="col-xs-8 col-md-6">
                        {!! Form::label('quantity', 'Halwa (150 Grams)') !!}
                        <strong class="help-block price" data-price="30">Rs. 30/-</strong>
                    </div>
                    <div class="col-xs-4 col-md-offset-3 col-md-3">
                        {!! Form::number('quantity[1]', 0, ['class'=>'form-control', 'min'=>0]) !!}
                        <small class="help-block">Total Rs.&nbsp;<span class='total'>0</span>/-</small>
                    </div>
                    {!! Form::hidden('product_id[1]', 0) !!}
                </div>
                <hr>
            
            </div>

            
            

            <div class="clearfix"></div>
            <br>

            {!! Form::submit('Place order', ['class'=>'btn btn-primary']) !!}

            <strong class="pull-right">Order Total: Rs. <span id="grand_total">0</span>/-</strong>
            
            <div class="clearfix"></div>
            <br>
            

        {!! Form::close() !!}

    </div>
</div>