<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Http\Requests\StoreProjectRequest;
use App\Http\Requests\UpdateProjectRequest;
use App\Models\Technology;
use App\Models\Type;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $projects = Project::all();
        return view('Admin.Project.index', compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //prendiamo le tipologie e le importiamo in create
        $types = Type::all();

        //prendiamo le tecnologie e le importiamo in create
        $technologies = Technology::all();

        return view('Admin.Project.create', compact('types', 'technologies'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProjectRequest $request)
    {

        //dati da salvare
        $data = $request->validated();

        $project = new Project();
        $project->title = $data['title'];
        $project->description = $data['description'];
        $project->code = $data['code'];
        $project->last_commit = $data['last_commit'];
        $project->type_id = $data['type_id'];

        //salviamo i dati
        $project->save();

        //associamo i valori selezionati all id del progetto
        $project->technology()->sync($data['technologies']);

        //reindiriziamo alla pagina principale
        return redirect()->route('admin.project.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {

        //tramite id mostriamo la pagina show.blade.php con i dati del progetto tramite id
        $project = Project::find($id);

        return view('admin.project.show', compact('project'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Project $project)
    {
        //prendiamo le tipologie e le importiamo nell edit
        $types = Type::all();

        //prendiamo le tecnologie e le importiamo in edit
        $technologies = Technology::all();

        // mostriamo la pagina edit.blade.php 
        return view('admin.project.edit', compact('project', 'types', 'technologies'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProjectRequest $request, Project $project)
    {

        //dati da salvare
        $data = $request->validated();

        $project->title = $data['title'];
        $project->description = $data['description'];
        $project->code = $data['code'];
        $project->last_commit = $data['last_commit'];
        $project->type_id = $data['type_id'];

        //salviamo i dati
        $project->save();

        //associamo i valori selezionati all id del progetto
        $project->technology()->sync($data['technologies']);

        //reindiriziamo alla pagina principale
        return redirect()->route('admin.project.index');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $project = Project::findOrFail($id);
        //metodo per eliminare 

        $project_id = $project->id;
        $project->delete();


        //reindiriziamo alla pagina principale
        return redirect()->route('admin.project.index')->with('message', 'progetto $project_id cancellato correttamente');
    }
}
