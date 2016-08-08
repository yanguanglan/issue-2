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
                <div class="panel-heading">Log</div>
                <div class="panel-body">
	                <table class="table">
					<thead>
						<tr>
							<th>
								Message
							</th>
							<th>
								CreatedAt
							</th>
						</tr>
					</thead>
					<tbody>
					@foreach($logs as $log)
						<tr>
							<td>
								{{$log->log}}						
							</td>
							<td>
								{{$log->created_at}}	
							</td>
						</tr>
					@endforeach
					</tbody>
				</table>					
				{{ $logs->links() }}
			</div>
            </div>
        </div>
    </div>
</div>
@endsection