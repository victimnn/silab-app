<?php

namespace App\Http\Controllers;

use App\Models\scheduling;
use Illuminate\Http\Request;
use App\Models\Place;

class SchedulingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $places = Place::all();
        return view('Scheduling/index', [
            'places' => $places,
        ]);
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
        try {
            $scheduling = new scheduling();
            $scheduling->date = $request->date;
            $scheduling->class_number = $request->class_number;
            $scheduling->shift = $request->shift;
            $scheduling->place_id = $request->place_id; 
            $scheduling->user_id = $request->user_id;
            $scheduling->save();

            return response()->json(['success' => 'Agendamento realizado com sucesso'], 200);
        }
        catch (\Exception $e) {
            return response()->json([
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(scheduling $scheduling)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(scheduling $scheduling)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, scheduling $scheduling)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(scheduling $scheduling)
    {
        //
    }
}
