@extends('layouts.app')

@section('content')
    
    <div class="col-lg-3">
        <div class="panel panel-info">
            
            <div class="panel-heading text-center">
                Posted
            </div>
            <div class="panel-body text-center">
                <h1>{{ $post_count }}</h1>
            </div>
        </div>
    </div>

    <div class="col-lg-3">
        <div class="panel panel-danger">
            <div class="panel-heading text-center">
                Trashed Post
            </div>
            <div class="panel-body text-center">
                <h1>{{ $trash_count }}</h1>
            </div>
        </div>
    </div>

    <div class="col-lg-3">
        <div class="panel panel-success">
            <div class="panel-heading text-center">
                Users
            </div>
            <div class="panel-body text-center">
                <h1>{{ $users_count }}</h1>
            </div>
        </div>
    </div>

    <div class="col-lg-3">
        <div class="panel panel-info">
            <div class="panel-heading text-center">
                Categories
            </div>
            <div class="panel-body text-center">
                <h1>{{ $category_count }}</h1>
            </div>
        </div>
    </div>
            


@endsection
