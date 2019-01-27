@extends('layouts.app')

@section('content')

	<div class="panel panel-default">
		<div class="panel-heading">
			Users
		</div>
		<div class="panel-body">
			<table class="table table-hover">
				<thead>
					<tr>
						<th>Image</th>
						<th>Name</th>
						<th>Permission</th>
						<th>Delete</th>
					</tr>

				</thead>
				<tbody>
					@if ($users->count() >0)
						@foreach( $users as $user )
							<tr>
								<td>
									<img src="{{ asset($user->profile->avatar) }}" alt="" width="60px" height="60px"> 
								</td>
								<td> {{ $user->name }}</td>
								<td> 
									@if ($user->admin)
										<a href="{{ route('user.notadmin', ['id' => $user->id]) }}" title="" class="btn btn-xs btn-danger">Remove Admin</a>
									@else
										<a href="{{ route('user.admin', ['id' => $user->id]) }}" title="" class="btn btn-xs btn-success">Make Admin</a>
									@endif
								</td>
								<td> 
									@if (Auth::id() !== $user->id ) 
										<a href="{{ route('user.delete', ['id' => $user->id]) }}" title="" class="btn btn-xs btn-danger">Delete</a>

									@endif

								</td>
							</tr>
						@endforeach
					@else
						<tr>
							<th colspan="5" class="text-center">No Users</th>
						</tr>
					@endif 
				</tbody>
			</table>
		</div>
	</div>
@stop
