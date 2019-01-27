@extends('layouts.app')

@section('content')

	<div class="panel panel-default">
		<div class="panel-heading">
			Tags
		</div>
		<div class="panel-body">
			<table class="table table-hover">
				<thead>
					<tr>
						<th>Tag Name</th>
						<th>Edit</th>
						<th>Delete</th>
					</tr>
				</thead>
				<tbody>
					@if ($tags->count() > 0)
						@foreach( $tags as $tag )
							<tr>
								<td>{{ $tag->tag }}</td>
								<td>
									<a href="{{ route('tag.edit', [ 'id' => $tag->id] ) }}" class="btn btn-info btn-xs" title="">Edit</a>
								</td>

								<td>
									<a href="{{ route('tag.delete', ['id' => $tag->id]) }}" class="btn btn-danger btn-xs" title="">Delete</a>
								</td>	
							</tr>
						@endforeach
					@else
						<tr >
							<th colspan="5" class="text-center">No Tags found</th>
						</tr>
					@endif 
				</tbody>
			</table>
		</div>
	</div>
@stop























