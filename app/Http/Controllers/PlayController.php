<?php

namespace App\Http\Controllers;

use App\Models\Play;
use App\Http\Requests\StorePlayRequest;
use App\Http\Requests\UpdatePlayRequest;
use Carbon\Carbon;
use App\Traits\HttpResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Resources\PlaysResource;
use Illuminate\Validation\Rule;

class PlayController extends Controller
{
    use HttpResponse ;

    public function index()
    {
        #  return PlaysResource::collection(
        #   Play::where('user_id',Auth::user()->id)->get() ) ; // get plays thats users are authenticated

        // return PlaysResource::collection(
        //     Play::where('user_id',Auth::user()->id)->get() ) ; // get plays thats users are authenticated
        return $this->success(PlaysResource::collection(Play::all())) ;
    }

    // public function nameSearch($name)
    // {
    //     //
    //     return $this->success(Play::where("name","like","%".$name."%")->get());
    // }

    public function search(Request $request)
{
    $query = Play::query();

    if ($request->has('name')) {
        $query->where('name', 'like', '%' . $request->input('name') . '%');
    }


    if ($request->has('type')) {
        $query->where('type', 'like', '%' . $request->input('type') . '%');
    }

    if ($request->has('start_date')) {
        $query->where('start_date', '=', $request->input('start_date') );
    }
    if ($request->has('start_time')) {
        $query->where('start_time', '=', $request->input('start_time') );
    }
    if ($request->has('end_time')) {
        $query->where('end_time', '=', $request->input('end_time') );
    }

    if ($request->has('target_people')) {
        $query->where('target_people', 'like', '%' . $request->input('target_people') . '%');
    }

    if ($request->has('teacher_experience')) {
        $query->where('teacher_experience', 'like', '%' . $request->input('teacher_experience') . '%');
    }

    if ($request->has('teacher_name')) {
        $query->where('teacher_name', 'like', '%' . $request->input('teacher_name') . '%');
    }

    $play = $query->get();
    // not working
    // if (!$play) {
    //     return $this->error('','No results found !',404);
    // }

    // return view('play.index', compact('play'));
    return $this->success($play);

}

/* Validation for realtime booking Plays DONT FORGET TO MAKE
    CODE A GAIN FOR Lectures
public function rules()
{
    return [
        'start_date' => 'required',
        'start_time' => 'required',
        'end_time' => 'required',
         Rule::unique('lectures')->where(function ($query) {
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
    public function store(StorePlayRequest $request)
     {
        $request -> validated($request->all() );
        // $request->start_date=Carbon::createFromFormat('j-n-Y', $request->start_date)->format('j-n-Y');
        //  dd($request->start_date);
        $play = Play::create([


            // 'user_id' => Auth::user()->id ,
            // 'user_id'            => $request->user()->id,

            'user_id'            => auth()->user()->id,
            'name'               => $request-> name,
            'type'               => $request-> type,
            'start_date'         => $request-> start_date,
            'start_time'         => $request-> start_time,
            'end_time'           => $request-> end_time,
            'target_people'      => $request-> target_people,
            'teacher_experience' => $request-> teacher_experience,
            'teacher_name'       => $request-> teacher_name,
        ]);

        return $this->success( new PlaysResource($play) , 'Play has added succussfully')  ;
    }


    public function show(Play $play)
    {
        return $this->success( new PlaysResource($play));
    }


    public function update(UpdatePlayRequest $request, Play $play)
    {
        // this work correctly
        // in postman make the method : Post (not patch not put)
        // and make in request body : _method = PUT

        $play=Play::find($play->id);
        // if (Auth::user()->id !== $play->user_id) {
        //     return $this->error('','You are not Authorized to make this request',403);
        //     // you should use the trait   (use HttpResponses ;) above

        // }

        $play->update($request->all());
        $play->save();

        return $this->success( new PlaysResource($play),'the Play has updated succeffuly');
    }


    public function destroy(Play $play)
    {
        // way 1 :
            $play->delete();
            // return $this->success('Play was Deleted Successfuly ','play was deleted successfully',204);
            return $this->success('Play was Deleted Successfuly ','play was deleted successfully',200);

        // way 2 : (it is best to do it in Show & Update functions [Implement Private function below] )

        // return $this->isNotAuthorized($play) ? $this->isNotAuthorized($play) : $play->delete();
        // return true (1) if the delete successfuly occoured
    }

    private function isNotAuthorized($play)
    {
        if (Auth::user()->id !== $play->user_id) {
            return $this->error('','You are not Authorized to make this request',403);
            }
        }
}
