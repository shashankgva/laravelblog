@extends('layouts.app')

@section('content')

	<div class="panel panel-default">
		<div class="panel-body">
			<table class="table table-hover">
				<thead>
					<tr>
						<th>Featured</th>
						<th>Title</th>
						<th>Edit</th>
						<th>Trash</th>
					</tr>

				</thead>
				<tbody>
					@if ($posts->count() >0)
						@foreach( $posts as $post )
							<tr>
								<td> <img src="{{ $post->featured }}" alt="Post Img" width="90px" height="50px"></td>
								<td>{{ $post->title }}</td>
								<td>
									<a href="{{ route('post.edit', [ 'id' => $post->id] ) }}" class="btn btn-info btn-xs" title="">Edit</a>
								</td>

								<td>
									<a href="{{ route('post.delete', ['id' => $post->id]) }}" class="btn btn-danger btn-xs" title="">Delete</a>
								</td>	
							</tr>
						@endforeach
					@else
						<tr >
							<th colspan="5" class="text-center">No Trash post</th>
						</tr>
					@endif 
				</tbody>
			</table>
		</div>
	</div>
@stop
