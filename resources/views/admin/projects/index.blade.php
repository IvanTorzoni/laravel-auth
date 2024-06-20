@extends('layouts.admin')

@section('content')
    <div class="container py-5">
        <h1 class="text-center">Project Table</h1>

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
                        <td> <a class='btn btn-info' href="{{ route('admin.projects.show',['project'=>$project->slug])}}">Dettagli</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
