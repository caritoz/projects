@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
        </div>
        <div class="col-md-12">
            <h3>Rows by Table <strong>{{$table->name}}</strong><small>
                    <small><a href="{{ route('tables.index', $table->project()->first()->id)}}" class="btn btn-link float-right"><< Back</a></small>
                    <a href="{{ route('rows.create', $table->id)}}" class="btn btn-link">Add +</a></small></h3>
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
                @forelse($rows as $key => $row)
                    <tr>
                        <th scope="row">{{$row->id}}</th>
                        <td>{{ $row->name }}</td>
                        <td>
                            <div class="clearfix">
{{--                                <a href="{{ route('rows.index', $row->id)}}" title="View" class="btn btn-link float-left">View Rows</a>--}}
{{--                                <a href="{{ route('rows.create', $row->id)}}" title="Add++" class="btn btn-link float-left">Add Row [+]</a>--}}
{{--                                <form action="{{ route('rows.destroy', $row->id)}}" method="post">--}}
{{--                                    @csrf--}}
{{--                                    @method('DELETE')--}}
{{--                                    <button type="submit" class="btn btn-link" onclick="return confirm('Are you sure you want to delete?')"> Delete </button>--}}
{{--                                </form>--}}
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="3">There are no rows</td>
                    </tr>
                @endforelse
                </tbody>
            </table>
        </div>
        <div class="col-md-12">
            {{ $rows->links() }}
        </div>
    </div>
    </div>
@endsection
