@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            </div>
            <div class="col-md-12">
                <h3>Projects <small><a href="{{ route('projects.create') }}" class="btn btn-link">Add +</a></small></h3>
            </div>
            <div class="col-md-12">
                <table class="table">
                    <thead class="thead-light">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">@</th>
                    </tr>
                    </thead>
                    <tbody>
                    @forelse ($projects as $key => $project)
                        <tr>
                            <th scope="row">{{$project->id}}</th>
                            <td>{{ $project->name }}</td>
                            <td>
                                <div class="clearfix">
                                    <a href="{{ route('tables.index', $project->id)}}" title="View" class="btn btn-link float-left">View Tables</a>
                                    <a href="{{ route('tables.create', $project->id)}}" title="Add++" class="btn btn-link float-left">Add Table [++]</a>
                                    <form action="{{ route('projects.destroy', $project->id)}}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-link" onclick="return confirm('Are you sure you want to delete?')"> Delete </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td>There are no project</td>
                        </tr>
                    @endforelse
                    </tbody>
                </table>
            </div>
            <div class="col-md-12">
                {{ $projects->links() }}
            </div>
        </div>
    </div>
@endsection
