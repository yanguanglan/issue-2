@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row">
	 <!-- Display Validation Errors -->
        @include('errors.form')
	</div>
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                Order <a href="/order" role="button" class="pull-right btn btn-default">New</a>
                </div>
                <div class="panel-body">
	                <table class="table">
					<thead>
						<tr>
							<th>
								OrderKey
							</th>
							<th>
								OrderName
							</th>
							<th>
								CreateAt
							</th>
						</tr>
					</thead>
					<tbody>
					@foreach($orders as $order)
						<tr>
							<td>
								{{$order->ddh}}						
							</td>
							<td>
								{{$order->name}}	
							</td>
							<td>
								{{$order->created_at}}	
							</td>
						</tr>
					@endforeach
					</tbody>
				</table>					
				{{ $orders->links() }}
			</div>
            </div>
        </div>
    </div>
</div>
@endsection