<?php

namespace App\Http\Controllers;

use App\Http\Requests\TableFormRequest;
use App\Project;
use App\Table;
use Illuminate\Http\Request;

/**
 * @property Table table
 */
class TableController extends Controller
{
    /**
     * @var Table
     */
    protected $table;

    public function __construct(Table $table)
    {
        $this->table = $table;
    }

    /**
     * Display a listing of the resource.
     *
     * @param Project $project
     * @return \Illuminate\Http\Response
     */
    public function index(Project $project)
    {
        $tables = $this->table->where('project_id', $project->id)->orderBy('updated_at', 'desc')->paginate(4);

        return view('tables.index', ['tables' => $tables, 'project' => $project]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param Project $project
     * @return \Illuminate\Http\Response
     */
    public function create(Project $project)
    {
        $project = Project::findOrFail($project->id);

        return view('tables.create', compact( 'project', $project));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TableFormRequest $request)
    {
        $table = new Table();

        $table->create([
            'name'          => $request->name,
            'project_id'    => $request->project_id
        ]);

        return redirect( route('tables.index', $request->project_id) );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Table  $table
     * @return \Illuminate\Http\Response
     */
    public function destroy(Table $table)
    {
        //
    }
}
