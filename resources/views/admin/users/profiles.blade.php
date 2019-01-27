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
			Edit your profile			
		</div>
		<div class="panel-body">
			<form action="{{ route('user.profile.update') }}" method="post" accept-charset="utf-8" enctype="multipart/form-data">
				{{ csrf_field() }}

				<div class="form-group">
					<label for="name">User</label>
					<input type="text" name="name" value="{{ $user->name }}" class="form-control">
				</div>
				<div class="form-group">
					<label for="email">Email</label>
					<input type="text" name="email" class="form-control" value="{{ $user->email}}">
				</div>
				<div class="form-group">
					<label for="password">New password</label>
					<input type="text" name="password" class="form-control">
				</div>
				<div class="form-group">
					<label for="avatar">Upload New Avatar</label>
					<input type="file" name="avatar" class="form-control">
				</div>
				<div class="form-group">
					<label for="avatar">Facebook Profile</label>
					<input type="text" name="facebook" class="form-control" value="{{ $user->profile->facebook }}">
				</div>
				<div class="form-group">
					<label for="youtube">Youtube Profile</label>
					<input type="text" name="youtube" class="form-control" value="{{ $user->profile->youtube }}">
				</div>
				<div class="form-group">
					<label for="youtube">About You</label>
					<textarea name="about" id="about" cols="6" rows="5" class="form-control" value="{{ $user->profile->about }}"></textarea>
				</div>
 
				<div class="form-group">
					<div class="text-center">
						<button class="btn btn-success" type="submit">
							Edit Profile
						</button>
					</div>	
				</div>

			</form>
		</div>
	</div>
@stop