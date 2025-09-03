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
        $date = request('date', now()->toDateString());
        if ($date < now()->toDateString()) {
            $date = now()->toDateString();
        }

        $places = Place::orderBy('name')->get();

        $classNumbers = range(1, 7);

        $schedules = scheduling::query()
            ->select('class_number', 'shift', 'place_id', 'user_id')
            ->with('user:id,name')
            ->whereDate('date', $date)
            ->get()
            ->keyBy(fn($s) => $s->class_number . '-' . $s->place_id);

            $lookup = [];
            foreach ($classNumbers as $class) {
                foreach ($places as $place) {
                    $lookup[$class][$place->id] = $schedules[$class . '-' . $place->id]
                        ?? (object)[
                            "class_number" => $class,
                            "place_id" => $place->id,
                            "shift" => "MANHA"
                    ];
                }
            }

            return view('Scheduling/index', [
                'places' => $places,
                'schedules' => $lookup,
                'date' => $date,
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
            if ($request->date < now()->toDateString()) {
                return response()->json(['error' => 'Não é possível agendar em datas passadas.'], 400);
            }

            // Check if slot is already scheduled
            $existing = scheduling::where('date', $request->date)
                ->where('class_number', $request->class_number)
                ->where('shift', $request->shift)
                ->where('place_id', $request->place_id)
                ->first();

            if ($existing) {
                return response()->json([
                    'error' => 'Este horário já está agendado.'
                ], 409);
            }

            $scheduling = new scheduling();
            $scheduling->date = $request->date;
            $scheduling->class_number = $request->class_number;
            $scheduling->shift = $request->shift;
            $scheduling->place_id = $request->place_id; 
            $scheduling->user_id = $request->user_id;
            $scheduling->save();

            return response()->json([
                'success' => 'Agendamento realizado com sucesso',
                'user_name' => $scheduling->user->name
            ], 200);
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
