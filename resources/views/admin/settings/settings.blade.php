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
			Edit blog setting		
		</div>
		<div class="panel-body">
			<form action="{{ route('settings.update') }}" method="post" accept-charset="utf-8" enctype="multipart/form-data">
				{{ csrf_field() }}

				<div class="form-group">
					<label for="name">Site Name</label>
					<input type="text" name="site_name" value="{{ $settings->site_name }}" class="form-control">
				</div>
				<div class="form-group">
					<label for="email">Address</label>
					<input type="text" name="address" class="form-control" value="{{ $settings->address }}">
				</div>
				<div class="form-group">
					<label for="email">Contact Phone</label>
					<input type="text" name="contact_number" class="form-control" value="{{ $settings->contact_number }}">
				</div>
				<div class="form-group">
					<label for="email">Contact Email</label>
					<input type="text" name="contact_email" class="form-control" value="{{ $settings->contact_email }}">
				</div>

				<div class="form-group">
					<div class="text-center">
						<button class="btn btn-success" type="submit">
							Update site settings
						</button>
					</div>	
				</div>

			</form>
		</div>
	</div>
@stop