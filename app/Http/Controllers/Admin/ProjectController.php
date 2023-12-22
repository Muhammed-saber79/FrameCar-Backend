<?php

namespace App\Http\Controllers\Admin;

use App\Models\Project;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $projects = Project::latest()->paginate(10);
        return view('admin.projects.index',compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required',
            'photo'=>'required',
        ]);

        Project::create(array_merge($request->only(['name','photo']),
        [
            'photo' => $request->file('photo')->store('projects', ['disk' => 'public']),
        ]
        ));
        return back();
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name'=>'required',
        ]);
        $project=Project::findorfail($id);
        $old_image = $project->photo;

        $data = [];
        if ($request->hasFile("photo")){
            $file = $request->file('photo');

            if ($file->isValid()) {
                $data = array_merge(
                    $request->only(['name','photo']),
                    ['photo' => $request->file('photo')->store('projects',
                        ['disk' => 'public']
                    )]
                );
            }

            if ($old_image) {
                Storage::disk('public')->delete($old_image);
            }

            $project->update($data);
        }
        else{

            $project->update([
                'name'=>$request->name
            ]);
        }

        return back()->with('success', 'تم تحديث بيانات المشروع بنجاح');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $project=Project::findorfail($id);

        Storage::delete($project['photo']);
        $project->delete();
        return back();

    }
}
