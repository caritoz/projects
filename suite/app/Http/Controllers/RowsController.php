<?php

namespace App\Http\Controllers;

use App\Http\Requests\RowsFormRequest;
use App\Rows;
use App\Table;
use Illuminate\Http\Request;

class RowsController extends Controller
{
    protected $rows;

    /**
     * RowsController constructor.
     * @param Rows $row
     */
    public function __construct(Rows $rows)
    {
        $this->rows = $rows;
    }

    /**
     * Display a listing of the resource.
     *
     * @param Table $table
     * @return \Illuminate\Http\Response
     */
    public function index(Table $table)
    {
        $rows = $this->rows->where('table_id', $table->id)->orderBy('updated_at', 'desc')->paginate(4);

        return view('rows.index', ['rows' => $rows, 'table' => $table] );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create( Table $table )
    {
        $table = Table::findOrFail($table->id);

        return view('rows.create', compact( 'table', $table) );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RowsFormRequest $request)
    {
        $rows = new Rows();

        $rows->create([
            'name'        => $request->name,
            'table_id'    => $request->table_id
        ]);

        return redirect( route('rows.index', $request->table_id ) );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Rows  $rows
     * @return \Illuminate\Http\Response
     */
    public function destroy(Rows $rows)
    {
        //
    }
}
