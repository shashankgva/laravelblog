@extends('layouts.app')

@section('content')
	
	@if (count($errors) > 0) 
		<div class="list-group">
			@foreach ($errors->all() as $error)
				<li class="list-group-item text-danger">
					{{ $error }}					
				</li>
			@endforeach
		</div>


	@endif

	<div class="panel panel-default">
		<div class="panel-heading">
			Create New Tag			
		</div>
		<div class="panel-body">
			<form action="{{ route('tag.store') }}" method="post" accept-charset="utf-8" enctype="multipart/form-data">
				{{ csrf_field() }}

				<div class="form-group">
					<label for="name">Tag</label>
					<input type="text" name="tag" class="form-control">
				</div>

				<div class="form-group">
					<div class="text-center">
						<button class="btn btn-success" type="submit">
							Create
						</button>
					</div>	
				</div>

			</form>
		</div>
	</div>
@stop