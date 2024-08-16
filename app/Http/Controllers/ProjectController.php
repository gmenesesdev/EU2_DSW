<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProjectController extends Controller
{
    public function index()
    {
        return Project::where('created_by', Auth::id())->get();
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'start_date' => 'required|date',
            'status' => 'required|string|max:50',
            'responsible' => 'required|string|max:255',
            'amount' => 'required|numeric',
        ]);

        $project = Project::create([
            'name' => $validated['name'],
            'start_date' => $validated['start_date'],
            'status' => $validated['status'],
            'responsible' => $validated['responsible'],
            'amount' => $validated['amount'],
            'created_by' => Auth::id(),
        ]);

        return response()->json($project, 201);
    }

    public function show($id)
    {
        $project = Project::where('id', $id)->where('created_by', Auth::id())->firstOrFail();
        return response()->json($project);
    }

    public function update(Request $request, $id)
    {
        $project = Project::where('id', $id)->where('created_by', Auth::id())->firstOrFail();

        $validated = $request->validate([
            'name' => 'sometimes|required|string|max:255',
            'start_date' => 'sometimes|required|date',
            'status' => 'sometimes|required|string|max:50',
            'responsible' => 'sometimes|required|string|max:255',
            'amount' => 'sometimes|required|numeric',
        ]);

        $project->update($validated);

        return response()->json($project);
    }

    public function destroy($id)
    {
        $project = Project::where('id', $id)->where('created_by', Auth::id())->firstOrFail();
        $project->delete();

        return response()->json(['message' => 'Proyecto eliminado']);
    }
}

