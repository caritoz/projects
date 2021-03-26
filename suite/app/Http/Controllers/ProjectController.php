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
     * @return void
     */
    public function index()
    {
        $projects = $this->project->orderBy('updated_at', 'desc')->paginate(5);

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
     * Remove the specified resource from storage.
     *
     * @param  \App\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try
        {
            $this->project->projectDestroy($id);
//            Project::destroy($project->id);

            return redirect('/projects');
        }
        catch (Exception $ex)
        {
            // something...

            echo $ex->getTraceAsString();
        }
    }
}
