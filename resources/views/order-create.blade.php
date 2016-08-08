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
                Order
                </div>
                <div class="panel-body">
                <!-- New Order Form -->
		        <form action="{{ url('order') }}" method="POST" class="form-horizontal">
		            {{ csrf_field() }}

		            <!-- Order Name -->
		            <div class="form-group">
		                <label for="order-name" class="col-sm-3 control-label">Order Name</label>

		                <div class="col-sm-6">
		                    <input type="text" name="name" id="order-name" class="form-control">
		                </div>
		            </div>

		            <!-- Add Order Button -->
		            <div class="form-group">
		                <div class="col-sm-offset-3 col-sm-6">
		                    <button type="submit" class="btn btn-default">
		                        <i class="fa fa-plus"></i> Add Order
		                    </button>
		                </div>
		            </div>
		        </form>
	            </div>
            </div>
        </div>
    </div>
</div>
@endsection