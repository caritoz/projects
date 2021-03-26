<?php

namespace App\Http\Controllers;

use App\Columns;
use App\Http\Requests\ColumnsFormRequest;
use App\Table;
use Illuminate\Http\Request;


class ColumnsController extends Controller
{
    /**
     * @var Columns
     */
    protected $columns;

    /**
     * RowsController constructor.
     * @param Columns $columns
     */
    public function __construct(Columns $columns)
    {
        $this->columns = $columns;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index( Table $table  )
    {
        $columns = $this->columns->where('table_id', $table->id)->orderBy('updated_at', 'desc')->paginate(4);

        return view('columns.index', ['columns' => $columns, 'table' => $table] );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create( Table $table )
    {
        $table = Table::findOrFail($table->id);

        return view('columns.create', compact( 'table', $table) );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ColumnsFormRequest $request)
    {
        $columns = new Columns();

        $columns->create([
            'name'        => $request->name,
            'table_id'    => $request->table_id
        ]);

        return redirect( route('columns.index', $request->table_id) );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Columns  $columns
     * @return \Illuminate\Http\Response
     */
    public function destroy(Columns $columns)
    {
        //
    }
}
