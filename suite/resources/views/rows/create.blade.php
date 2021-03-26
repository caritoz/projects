@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h3>Add a Row to Table <strong>{{$table->name}}</strong></h3>
            </div>
            <div class="col-md-12">
                <div>
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div><br />
                    @endif
                    <form method="post" action="{{ route('rows.store') }}">
                        @csrf
                        <div class="form-group">
                            <label for="first_name">Name:</label>
                            <input type="text" class="form-control" name="name" value="{{old('name')}}"/>
                        </div>
                        <input type="hidden" name="table_id" value="{{$table->id}}"/>
                        <button type="submit" class="btn btn-primary">Add</button>
                        <a href="{{ route('tables.index', $table->project()->first()->id)}}" class="btn btn-link">Cancel</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
