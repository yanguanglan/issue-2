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
                <form action="{{ url('pool') }}" method="POST" class="form-horizontal">
                    {{ csrf_field() }}
                    <!-- Pool Api -->
                    <div class="form-group">
                        <label for="pool-api" class="col-sm-3 control-label">Pool Api</label>

                        <div class="col-sm-6">
                            <input type="text" name="api" id="pool-api" class="form-control">
                        </div>
                    </div>

                    <!-- Pool Name -->
                    <div class="form-group">
                        <label for="pool-name" class="col-sm-3 control-label">Pool Name</label>

                        <div class="col-sm-6">
                            <input type="text" name="name" id="pool-name" class="form-control">
                        </div>
                    </div>

                    <!-- Add Order Button -->
                    <div class="form-group">
                        <div class="col-sm-offset-3 col-sm-6">
                            <button type="submit" class="btn btn-default">
                                <i class="fa fa-plus"></i> Add Pool
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