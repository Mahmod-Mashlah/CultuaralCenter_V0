<?php

namespace App\Http\Controllers;

use App\Models\Plan;
use App\Http\Requests\StorePlanRequest;
use App\Http\Requests\UpdatePlanRequest;
use App\Models\TypeLecture;
use App\Models\TypePlay;
use Database\Factories\TypeLectureFactory;
use RealRashid\SweetAlert\Facades\Alert;
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
    public function create()
    {
        $plans = Plan::all();
        $lectures = TypeLecture::all();
        $plays = TypePlay::all();
        return view('web.plans.add' ,compact([
            'plans','lectures','plays'
        ]));
    }

    public function store(StorePlanRequest $request)
    {
        // Validate the form data
        $validatedData = $request->validate([

            'date'           => 'required | date | after_or_equal:2024-01-01', // or ['required'],['date'],
            'start_time'     => 'required | time',
            'end_time'       => 'required | time',
            'min_lectures'   => 'required | min:3',
            'max_lectures'   => 'required | max:100',
            'min_activities' => 'required | min:2',
            'max_activities' => 'required | max:150',
            'min_plays'      => 'required | min:1',
            'max_plays'      => 'required | max:60',
            // Relations :
            'lectures'       => 'array',
            'plays'          => 'array',
        ]);

        // $plan = new Plan();
        // if ($plan->plays == [] || $plan->lecturess == [] ) {
        //     Alert::warning('warning !', 'You should select at least one play type and one lecture type');
        // }

        // Create the plan

        $plan = Plan::create([

            'date'           => $validatedData['date'],
            'start_time'     => $validatedData['start_time'],
            'end_time'       => $validatedData['end_time'],
            'min_lectures'   => $validatedData['min_lectures'],
            'max_lectures'   => $validatedData['max_lectures'],
            'min_activities' => $validatedData['min_activities'],
            'max_activities' => $validatedData['max_activities'],
            'min_plays'      => $validatedData['min_plays'],
            'max_plays'      => $validatedData['max_plays'],
            // Relations :
            'lectures'       => $validatedData['lectures'],
            'plays'          => $validatedData['plays'],
        ]);


        // Attach the selected lectures to the plan
        $plan->type_lectures()->attach($validatedData['lectures']);
        $plan->type_plays()->attach($validatedData['plays']);

        $plan->save();
        // Redirect or return a response
        Alert::success('Done !', 'a new plan has been created Successfully');

        return redirect()->route('plans.add',compact(['plan','validatedData']))->with('success', 'A new Plan has created successfully!');
    }

    public function test_store(StorePlanRequest $request)
    {
        // //
        // // // Validate the input
        // // $validatedData = $request->validate([
        // //     'field1' => 'required',
        // //     'field2' => 'required',
        // //     // Add validation rules for other fields
        // // ]);

        // // // Create a new record
        // // Plan::create($validatedData);

        // $plan = new Plan();
        // // inputs :

        // $plan = Plan::create($request->all());
        // $lecturesFromRequest = $request->input('lectures', []);
        // foreach ($lecturesFromRequest as $lecture_Item) {
        //     // Save $lectures to the database
        //     // $lecture=TypeLecture::find($lecture->id);
        //     // $lecture=$plan->type_lectures;
        //     // $lecture=$lecture_Item;
        //     // $plan->type_lectures = $lecture_Item;

        //     // $lecture_Item->save();
        // }

        // // Or :
        // // $plan->date = $request->input('date');
        // // $plan->start_time = $request->input('start_time');
        // // $plan->end_time = $request->input('end_time');
        // // $plan->min_lectures = $request->input('min_lectures');
        // // $plan->max_lectures = $request->input('max_lectures');
        // // $plan->min_activities = $request->input('min_activities');
        // // $plan->max_activities = $request->input('max_activities');
        // // $plan->min_plays = $request->input('min_plays');
        // // $plan->max_plays = $request->input('max_plays');

        // //Relations :

        // // $plan->type_plays = $request->input('name');
        // // $plan->type_lectures = $request->input('name');

        // $plan->type_lectures()->attach($request->input('type_lectures'));
        // $plan->type_plays()->attach($request->input('type_plays'));

        // $plan->save();
        // // Redirect or return a response
        // Alert::success('Done !', 'a new plan has been created Successfully');

        // return redirect()->route('plans')->with('success', 'A new Plan has created successfully!');
    }

    public function edit($id)
    {
        $plan = Plan::find($id);
        return view('web.plans.update', compact('plan'));
    }

    public function update(UpdatePlanRequest $request, $id)
    {
        $plan = Plan::findOrFail($id) ;

        $validated = $request->validate([
            'date'           => 'required | date | after_or_equal:2024-01-01', // or ['required'],['date'],
            'start_time'     => 'required | time',
            'end_time'       => 'required | time',
            'min_lectures'   => 'required | min:3',
            'max_lectures'   => 'required | max:100',
            'min_activities' => 'required | min:2',
            'max_activities' => 'required | max:150',
            'min_plays'      => 'required | min:1',
            'max_plays'      => 'required | max:60',
            // Relations :
            'lectures'       => 'array',
            'plays'          => 'array',
        ]);
        //dd($validated);
        $plan->update($validated);
        // or :
            // $plan->update([
            //     'name' => $request->input('name'),  //.... and so on
            // ]);

        $plan->save();
        if ($plan->save()) {
            Alert::success('Done !', 'a new plan has been updated Successfully');
        }
        return redirect()->route('plans')->with('success', 'Plan has been updated successfully!');
    }

}
