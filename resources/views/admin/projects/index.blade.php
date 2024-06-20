@extends('layouts.admin')

@section('content')
    <div class="container py-5">
        <h1 class="text-center">Project Table</h1>

        @if (session('message'))
            <div class="alert alert-success">
                {{ session('message') }}
            </div>
        @endif

        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Title</th>
                    <th scope="col">Description</th>
                    <th scope="col">Slug</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($projectsArray as $project)
                    <tr>
                        <th scope="row"> {{ $project->title }} </th>
                        <td> {{ $project->description }} </td>
                        <td> {{ $project->slug }} </td>
                        <td> <a class='btn btn-info'
                                href="{{ route('admin.projects.show', ['project' => $project->slug]) }}">Details</a>
                             <a class='btn btn-warning'
                                href="{{ route('admin.projects.edit', ['project' => $project->slug]) }}">Modify</a>

                            <form action="{{ route('admin.projects.destroy', ['project' => $project->slug]) }}"
                                method="POST">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger" type="submit">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
