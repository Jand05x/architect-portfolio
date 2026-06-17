<?php

namespace App\Http\Controllers;

use App\Models\Project;

class ProjectController extends Controller
{
    public function index()
    {
        $projects = Project::where('is_published', true)
            ->latest()
            ->get();

        return view('projects.index', compact('projects'));
    }

    public function show(Project $project)
    {
        abort_unless($project->is_published, 404);

        return view('projects.show', compact('project'));
    }
}
