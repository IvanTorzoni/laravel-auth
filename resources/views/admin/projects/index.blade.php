@extends('layouts.admin')

@section('content')
    <div class="container py-5">
        <h1 class="text-center">Project Table</h1>

        <div>
            <form action="">
                <label for="perPage">Select the number of elements in page</label>
                <select name="perPage" id="perPage">
                    <option value="5" @selected($projectsArray->perPage() == 5)>5</option>
                    <option value="10" @selected($projectsArray->perPage() == 10)>10</option>
                    <option value="15" @selected($projectsArray->perPage() == 15)>15</option>
                </select>

                <button type="submit" class="btn btn-primary">Apply</button>
            </form>
        </div>

        @include('partials.session_message')

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
                        <td>
                            <div class="d-flex align-item-center">
                                <a class='btn btn-info'
                                    href="{{ route('admin.projects.show', ['project' => $project->slug]) }}"><i class="fa-solid fa-circle-info" title="Details"></i></a>
                                <a class='btn btn-warning'
                                    href="{{ route('admin.projects.edit', ['project' => $project->slug]) }}"><i class="fa-solid fa-pen" title="Modify"></i></a>

                                <form action="{{ route('admin.projects.destroy', ['project' => $project->slug]) }}"
                                    method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger" type="submit"><i class="fa-solid fa-trash" title="Delete"></i></button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div>
        {{ $projectsArray->links() }}
    </div>
@endsection
