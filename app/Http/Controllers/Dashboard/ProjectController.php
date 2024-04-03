<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProjectRequest;
use App\Http\Requests\UpdateProjectRequest;
use App\Models\Project;
use App\Models\Type;
use Illuminate\Support\Facades\Storage;


class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $projects = Project::all();
        $types = Type::all();
        return view('pages.dashboard.projects.index', compact('projects','types'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $types = Type::all();
        return view('pages.dashboard.projects.create', compact('types'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProjectRequest $request)
    {
        $validated_data = $request->validated();
        $slug = Project::generateSlug($request->title);
        $validated_data['slug'] = $slug;

        if($request->hasFile('cover')){
            $img_path = Storage::disk('public')->put('projects_images', $request->cover);
            $validated_data['cover'] = $img_path;
        }

        $new_project = Project::create($validated_data);
        return redirect()->route('dashboard.projects.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Project $project)
    {
        return view('pages.dashboard.projects.show', compact('project'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Project $project)
    {
        $types = Type::all();
        return view('pages.dashboard.projects.edit', compact('project', 'types'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProjectRequest $request, Project $project)
    {
        $validated_data = $request->validated();
        $slug = Project::generateSlug($request->title);
        $validated_data['slug'] = $slug;

        if($request->hasFile('cover')){
            if($project->cover){
                Storage::delete($project->cover);
            }

            $img_path = Storage::disk('public')->put('projects_images', $request->cover);

            $validated_data['cover'] = $img_path;
        }

        $project->update($validated_data);
        return redirect()->route('dashboard.projects.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Project $project)
    {
        if($project->cover){
            Storage::delete($project->cover);
        }

        $project->delete();
        return redirect()->route('dashboard.projects.index');
    }
}
