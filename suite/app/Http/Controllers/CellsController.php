<?php

namespace App\Http\Controllers;

use App\Cells;
use App\Http\Requests\CellsFormRequest;
use App\Table;
use Illuminate\Http\Request;

class CellsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create( Table $table )
    {
        $table = Table::findOrFail($table->id);

        return view('cells.create', compact( 'table', $table) );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CellsFormRequest $request)
    {
        $table = Table::findOrFail($request->table_id);

        $cells = new Cells();

        $cells->create([
            'description'   => $request->description,
            'row_id'        => $request->row_id,
            'column_id'     => $request->column_id
        ]);

        return redirect( route('tables.index', $table->project()->first()->id) );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Cells  $cells
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cells $cells)
    {
        //
    }
}
