@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h3>Add a Cell to Table <strong>{{$table->name}}</strong></h3>
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
                    <form method="post" action="{{ route('cells.store') }}">
                        @csrf

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="first_name">Row:</label>
                                    <select class="form-control" name="row_id">
                                        @foreach($table->rows as $row)
                                            <option value="{{ $row->id }}">{{ $row->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="first_name">Column:</label>
                                    <select class="form-control" name="column_id">
                                        @foreach($table->columns as $column)
                                            <option value="{{ $column->id }}">{{ $column->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>


                        <div class="form-group">
                            <label for="first_name">Name:</label>
                            <textarea class="form-control" name="description">{{old('description')}}</textarea>
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
