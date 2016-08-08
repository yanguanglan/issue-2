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
                <div class="panel-heading">提取IP</div>

                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/getip') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('ddh') ? ' has-error' : '' }}">
                            <label for="ddh" class="col-md-4 control-label">订单号</label>

                            <div class="col-md-6">
                                <input id="ddh" type="text" class="form-control" name="ddh" value="{{ old('ddh') }}">

                                @if ($errors->has('ddh'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('ddh') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('sl') ? ' has-error' : '' }}">
                            <label for="sl" class="col-md-4 control-label">数量</label>

                            <div class="col-md-6">
                                <input id="sl" type="text" class="form-control" name="sl" value="{{ old('sl') }}">

                                @if ($errors->has('sl'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('sl') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" name="online" value="1" class="btn btn-primary">
                                    在线提取
                                </button>
                                <button type="submit" name="api" value="1" class="btn btn-primary">
                                    生成API
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
