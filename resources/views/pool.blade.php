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
                <div class="panel-heading">Pool <a href="/pool" role="button" class="pull-right btn btn-default">New</a></div>
                <div class="panel-body">
	                <table class="table">
					<thead>
						<tr>
							<th>
								PoolApi
							</th>
							<th>
								PoolName
							</th>
							<th>
								PoolStatus
							</th>
						    <th>
								UpdatedAt
							</th>
						</tr>
					</thead>
					<tbody>
					@foreach($pools as $pool)
						<tr>
							<td>
								{{$pool->api}}						
							</td>
							<td>
								{{$pool->name}}	
							</td>
							<td @if($pool->status) class="success" @else class="danger" @endif >
								@if($pool->status) YES @else NO @endif	
							</td>
							<td>
								{{$pool->updated_at}}	
							</td>
						</tr>
					@endforeach
					</tbody>
				</table>					
				{{ $pools->links() }}
			</div>
            </div>
        </div>
    </div>
</div>
@endsection