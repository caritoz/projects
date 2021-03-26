@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="column">
        </div>
        <div class="col-md-12">
            <h3>Columns by Table <strong>{{$table->name}}</strong><small>
                    <small><a href="{{ route('tables.index', $table->project()->first()->id)}}" class="btn btn-link float-right"><< Back</a></small>
                    <a href="{{ route('columns.create', $table->id)}}" class="btn btn-link">Add +</a></small></h3>
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
                @forelse($columns as $key => $column)
                    <tr>
                        <th scope="column">{{$column->id}}</th>
                        <td>{{ $column->name }}</td>
                        <td>
                            <div class="clearfix">
{{--                                <a href="{{ route('columns.index', $column->id)}}" title="View" class="btn btn-link float-left">View columns</a>--}}
{{--                                <a href="{{ route('columns.create', $column->id)}}" title="Add++" class="btn btn-link float-left">Add column [+]</a>--}}
{{--                                <form action="{{ route('columns.destroy', $column->id)}}" method="post">--}}
{{--                                    @csrf--}}
{{--                                    @method('DELETE')--}}
{{--                                    <button type="submit" class="btn btn-link" onclick="return confirm('Are you sure you want to delete?')"> Delete </button>--}}
{{--                                </form>--}}
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="3">There are no columns</td>
                    </tr>
                @endforelse
                </tbody>
            </table>
        </div>
        <div class="col-md-12">
            {{ $columns->links() }}
        </div>
    </div>
    </div>
@endsection
