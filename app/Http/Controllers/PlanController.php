<?php

namespace App\Http\Controllers;

use App\Models\Plan;
use App\Http\Requests\StorePlanRequest;
use App\Http\Requests\UpdatePlanRequest;
use App\Models\TypeLecture;
use App\Models\TypePlay;
use Database\Factories\TypeLectureFactory;

class PlanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $plans = Plan::all();
        return view('web.plans.index', compact([
            'plans',
        ]));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $plans = Plan::all();
        $lectures = TypeLecture::all();
        $plays = TypePlay::all();
        return view('web.plans.add' ,compact([
            'plans','lectures','plays'
        ]));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePlanRequest $request)
    {
        //
        // // Validate the input
        // $validatedData = $request->validate([
        //     'field1' => 'required',
        //     'field2' => 'required',
        //     // Add validation rules for other fields
        // ]);

        // // Create a new record
        // Plan::create($validatedData);

        $plan = new Plan();
        // inputs :

        $plan = Plan::create($request->all());
        // Or :
        // $plan->date = $request->input('date');
        // $plan->start_time = $request->input('start_time');
        // $plan->end_time = $request->input('end_time');
        // $plan->min_lectures = $request->input('min_lectures');
        // $plan->max_lectures = $request->input('max_lectures');
        // $plan->min_activities = $request->input('min_activities');
        // $plan->max_activities = $request->input('max_activities');
        // $plan->min_plays = $request->input('min_plays');
        // $plan->max_plays = $request->input('max_plays');

        //Relations :

        // $plan->type_plays = $request->input('name');
        // $plan->type_lectures = $request->input('name');

        $plan->type_lectures()->attach($request->input('type_lectures'));
        $plan->type_plays()->attach($request->input('type_plays'));

        $plan->save();
        // Redirect or return a response
        return redirect()->route('plans')->with('success', 'A new Plan has created successfully!');
    }

    public function edit(Plan $plan)
    {
        //
    }

    public function update(UpdatePlanRequest $request, Plan $plan)
    {
        //
    }

}
