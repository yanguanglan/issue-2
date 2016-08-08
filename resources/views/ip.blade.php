@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">提取IP</div>

                <div class="panel-body">
                    @if(isset($url))
                    提取链接：{{$url}}
                    @else
                    @foreach($ips as $ip)
                    {{$ip}}<br/>
                    @endforeach
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
