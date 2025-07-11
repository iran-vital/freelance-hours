<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Project;

class ProjectsController extends Controller
{
    public function index()
    {
        return view('projects.index');
    }

    public function show(Project $project)
    {
        return view('projects.show', ['project' => $project]);
    }
}
