<?php

namespace App\Http\Controllers;

use App\Project;
use Illuminate\Http\Request;
use Mockery\Exception;

class ProjectController extends Controller
{
    /**
     * @var Project
     */
    protected $project;

    public function __construct(Project $project)
    {
        $this->project = $project;
    }

    /**
     * Display a listing of the resource.
     *
     * @param Project $project
     * @return void
     */
    public function index(  )
    {
        $this->middleware('auth');

        $projects = Project::all();

        return view('projects.index', compact('projects', $projects));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('projects.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $project = new Project();

        $project->create($request->only([
            'name',
        ]));

        return redirect('/projects');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function show(Project $project)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function edit(Project $project)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Project $project)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function destroy(Project $project)
    {
        try
        {
            $project = $this->project->findOrFail($project->id);

            Project::destroy($project->id);

        }
        catch (Exception $ex)
        {
            // something...
        }
    }
}
