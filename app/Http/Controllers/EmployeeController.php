<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Employee;
use RealRashid\SweetAlert\Facades\Alert;
use App\Http\Requests\StoreEmployeeRequest;
use App\Http\Requests\UpdateEmployeeRequest;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $employees = User::all()-> where('type','user');
        return view('web.employees.index',compact(['employees',]));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('web.employees.add');

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreEmployeeRequest $request)
    {
        $user = new User();
        $validatedData = $request->validate([

            'date'           => 'required','date',
            'start_time'     => 'required','time',
            'end_time'       => 'required','time',
            'min_lectures'   => 'required','min:3',
            'max_lectures'   => 'required','max:100',
            'min_activities' => 'required','min:2',
            'max_activities' => 'required','max:150',
            'min_plays'      => 'required','min:1',
            'max_plays'      => 'required','max:60',
            // Relations :
            'lectures'       => 'array',
            'plays'          => 'array',
        ]);

        $user = User::create([

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
        $user->save();

        Alert::success('Done !', 'a new user has been created Successfully');

        // return redirect()->route('users')->with('success', 'A new User has created successfully!');
        return redirect()->route('users',compact(['user','validatedData']))->with('success', 'A new User has created successfully!');


    }

    /**
     * Display the specified resource.
     */
    public function show(Employee $employee)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Employee $employee)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateEmployeeRequest $request, Employee $employee)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Employee $employee)
    {
        //
    }
}
