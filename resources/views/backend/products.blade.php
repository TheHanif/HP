@extends('layouts.backend.app')

@section('title', 'Products')
@section('heading', 'Products')

@section('content')

    <table class="table table-hover table-bordered table-condensed">
    	<tr>
    		<th>Name</th>
    		<th>Group</th>
    		<th>Cost price</th>
    		<th>Price</th>
    		<th>Status</th>
    		<th>Create at</th>
    		<th>Updated at</th>
    		<th>Actions</th>
    	</tr>

    	<tbody>
    		@if($products->isEmpty())
				<tr>
					<td colspan="7" align="center">Thre are no products</td>
				</tr>
			@else
				@foreach($products as $product)
				
					<tr>
						<td>{{ $product->name }}</td>
						<td>{{ $product->group['name'] }}</td>
						<td>{{ $product->cost }}</td>
						<td>{{ $product->price }}</td>
						<td>{{ ($product->status == 0)? 'Inactive' : 'Active'}}</td>
						<td>{{ $product->created_at }}</td>
						<td>{{ $product->updated_at or 'Never updated' }}</td>
						<td>
							<a href="{{ route('products.edit', $product->id) }}" class="btn btn-default">
								<e>Edit</e>
							</a>
							<a href="{{ route('products.change', $product->id) }}" class="btn btn-default">
								<e>{{ ($product->status == 0)? 'Activate' : 'Inactive'}}</e>
							</a>
						</td>
					</tr>
				@endforeach
		    @endif
    	</tbody>
    </table>

    

@endsection
