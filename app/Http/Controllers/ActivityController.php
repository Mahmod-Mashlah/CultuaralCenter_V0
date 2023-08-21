<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use App\Traits\HttpResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Resources\ActivitiesResource;
use App\Http\Requests\StoreActivityRequest;
use App\Http\Requests\UpdateActivityRequest;

class ActivityController extends Controller
{
    use HttpResponse ;

    public function index()
    {
        #  return ActivitiesResource::collection(
        #   Activity::where('user_id',Auth::user()->id)->get() ) ; // get activitys thats users are authenticated

        // return ActivitiesResource::collection(
        //     Activity::where('user_id',Auth::user()->id)->get() ) ; // get activitys thats users are authenticated
        // return $this->success(ActivitiesResource::collection(Activity::all())) ;
         return response()->json(ActivitiesResource::collection(Activity::all()), 200,); ;
    }

    // public function nameSearch($name)
    // {
    //     //
    //     return $this->success(Activity::where("name","like","%".$name."%")->get());
    // }

    public function search(Request $request)
{

    $query = Activity::query();

    if ($request->has('name')) {
        $query->where('name', 'like', '%' . $request->input('name') . '%');
    }


    if ($request->has('type')) {
        $query->where('type', 'like', '%' . $request->input('type') . '%');
    }

    if ($request->has('users_count')) {
        $query->where('users_count', '=', $request->input('users_count') );
    }
    if ($request->has('target_people')) {
        $query->where('target_people', '=', $request->input('target_people') );
    }
    if ($request->has('start_date')) {
        $query->where('start_date', '=', $request->input('start_date') );
    }

    if ($request->has('days_duration')) {
        $query->where('days_duration', 'like', '%' . $request->input('days_duration') . '%');
    }

    if ($request->has('room_number')) {
        $query->where('room_number', 'like', '%' . $request->input('room_number') . '%');
    }

    if ($request->has('teacher_name')) {
        $query->where('teacher_name', 'like', '%' . $request->input('teacher_name') . '%');
    }

    if ($request->has('teacher_experience')) {
        $query->where('teacher_experience', 'like', '%' . $request->input('teacher_experience') . '%');
    }

    if ($request->has('session_start_time')) {
        $query->where('session_start_time', 'like', '%' . $request->input('session_start_time') . '%');
    }

    if ($request->has('session_end_time')) {
        $query->where('session_end_time', 'like', '%' . $request->input('session_end_time') . '%');
    }

    $activity = $query->get();
    // not working
    // if (!$activity) {
    //     return $this->error('','No results found !',404);
    // }

    // return view('activity.index', compact('activity'));
    return $this->success($activity,'Results Found');

}

/* Validation for realtime booking activitys DONT FORGET TO MAKE
    CODE A GAIN FOR PLAYS
public function rules()
{
    return [
        'start_date' => 'required',
        'start_time' => 'required',
        'end_time' => 'required',
         Rule::unique('activitys')->where(function ($query) {
            return $query->where('start_date', $this->start_date)
                ->where('start_time', $this->start_time)
                ->where('end_time', $this->end_time);
            }),
    ];
}
public function messages()
{
    return [
        'column3.unique' => 'The combination of column1 and column2 must be unique.',
    ];
}
*/
    public function store(StoreActivityRequest $request)
     {
        $request -> validated($request->all() );
        // $request->start_date=Carbon::createFromFormat('j-n-Y', $request->start_date)->format('j-n-Y');
        //  dd($request->start_date);
        $activity = Activity::create([
            // 'user_id' => Auth::user()->id ,
            // 'user_id'            => $request->user()->id,

            // 'user_id'            => auth()->user()->id,
            'name'               => $request-> name,
            'type'               => $request-> type,
            'users_count'        => $request-> users_count,
            'target_people'      => $request-> target_people,
            'start_date'         => $request-> start_date,
            'days_duration'      => $request-> days_duration,
            'room_number'        => $request-> room_number,
            'teacher_name'       => $request-> teacher_name,
            'teacher_experience' => $request-> teacher_experience,
            'session_start_time' => $request-> session_start_time,
            'session_end_time'   => $request-> session_end_time,
            'days'   => $request-> days,
        ]);

        return $this->success( new ActivitiesResource($activity) , 'Activity has added succussfully')  ;
    }


    public function show(Activity $activity)
    {
        return $this->success( new ActivitiesResource($activity));
    }


    public function update(UpdateActivityRequest $request, Activity $activity)
    {
        // this work correctly
        // in postman make the method : Post (not patch not put)
        // and make in request body : _method = PUT

        $activity=Activity::find($activity->id);
        // if (Auth::user()->id !== $activity->user_id) {
        //     return $this->error('','You are not Authorized to make this request',403);
        //     // you should use the trait   (use HttpResponses ;) above

        // }

        $activity->update($request->all());
        $activity->save();

        return $this->success( new ActivitiesResource($activity),'the Activity has updated succeffuly');
    }


    public function destroy(Activity $activity)
    {
        // way 1 :
            $activity->delete();
            // return $this->success('Activity was Deleted Successfuly ','activity was deleted successfully',204);
            return $this->success('Activity was Deleted Successfuly ','activity was deleted successfully',200);

        // way 2 : (it is best to do it in Show & Update functions [Implement Private function below] )

        // return $this->isNotAuthorized($activity) ? $this->isNotAuthorized($activity) : $activity->delete();
        // return true (1) if the delete successfuly occoured
    }

    private function isNotAuthorized($activity)
    {
        if (Auth::user()->id !== $activity->user_id) {
            return $this->error('','You are not Authorized to make this request',403);
            }
        }
}
