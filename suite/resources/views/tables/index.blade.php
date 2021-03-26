@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
        </div>
        <div class="col-md-12">
            <h3>Tables by Project <strong>{{$project->name}}</strong><small><small><a href="/projects" class="btn btn-link float-right"><< Back</a></small> <a href="{{ route('tables.create', $project->id)}}" class="btn btn-link">Add +</a></small></h3>
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
                @forelse($tables as $key => $table)
                    <tr>
                        <th scope="row">{{$table->id}}</th>
                        <td>{{ $table->name }}</td>
                        <td>
                            <div class="clearfix">

                                <a href="{{ route('columns.index', $table->id)}}" title="View" class="btn btn-link float-left">View Columns</a>
                                <a href="{{ route('columns.create', $table->id)}}" title="Add++" class="btn btn-link float-left">Add Column [+]</a>

                                <a href="{{ route('rows.index', $table->id)}}" title="View" class="btn btn-link float-left">View Rows</a>
                                <a href="{{ route('rows.create', $table->id)}}" title="Add++" class="btn btn-link float-left">Add Row [+]</a>


                                <a href="{{ route('cells.create', $table->id)}}" title="Add+" class="btn btn-link float-left">Add Cells [+]</a>

{{--                                <form action="{{ route('tables.destroy', $table->id)}}" method="post">--}}
{{--                                    @csrf--}}
{{--                                    @method('DELETE')--}}
{{--                                    <button type="submit" class="btn btn-link" onclick="return confirm('Are you sure you want to delete?')"> Delete </button>--}}
{{--                                </form>--}}
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td>There are no tables</td>
                    </tr>
                @endforelse
                </tbody>
            </table>
        </div>
        <div class="col-md-12">
            {{ $tables->links() }}
        </div>
    </div>
    </div>
@endsection
