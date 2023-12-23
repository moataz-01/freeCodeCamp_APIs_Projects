<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Resources\ExerciseResource;
use App\Http\Resources\V1\UserCollection;
use App\Http\Resources\V1\UserResource;
use App\Models\Exercise;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return new UserCollection(User::all());
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
        return new UserResource(User::create($request->all()));
    }

    public function addExercise(Request $request, string $id)
    {
        if ($request->date == null) {
            $exercise = Exercise::create([
                'description' => $request->description,
                'duration' => $request->duration,
                'date' => date('Y-m-d')
            ]);
            $user = User::find($id);
            $user->exercises()->attach($exercise);
            $data = [
                'exercise' => new ExerciseResource($exercise),
                'user' => new UserResource($user),
            ];

            return response()->json([
                'success' => true,
                'message' => 'Exercise added successfully!',
                'data' => $data,
            ]);
        } else {
            $exercise = Exercise::create([
                'description' => $request->description,
                'duration' => $request->duration,
                'date' => $request->date
            ]);
            $user = User::find($id);
            $user->exercises()->attach($exercise);
            $data = [
                'exercise' => new ExerciseResource($exercise),
                'user' => new UserResource($user),
            ];

            return response()->json([
                'success' => true,
                'message' => 'Exercise added successfully!',
                'data' => $data,
            ]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $user = User::find($id);
        return new UserResource($user);

    }

    public function getLogs(string $id, Request $request) 
    {
        $user = User::with('exercises')->find($id);
        return new UserResource($user);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //exercises
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
