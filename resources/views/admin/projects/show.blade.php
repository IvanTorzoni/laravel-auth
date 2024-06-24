@extends('layouts.admin')

@section('content')
    <h1 class="text-center py-5">Details Page</h1>

    @if (session('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
    @endif
    
    <div class="container card">
        <h2>Title: {{ $project->title }}</h2>
        <p>Description: {{ $project->description }}</p>
        <p>Slug: {{ $project->slug }}</p>
    </div>
@endsection
