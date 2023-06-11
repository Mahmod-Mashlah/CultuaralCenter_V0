<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Lecture;
use App\Traits\HttpResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Resources\LecturesResource;
use App\Http\Requests\StoreLectureRequest;
use App\Http\Requests\UpdateLectureRequest;

class LectureController extends Controller
{
    use HttpResponse ;

    public function index()
    {
        #  return LecturesResource::collection(
        #   Lecture::where('user_id',Auth::user()->id)->get() ) ; // get lectures thats users are authenticated

        // return LecturesResource::collection(
        //     Lecture::where('user_id',Auth::user()->id)->get() ) ; // get lectures thats users are authenticated
        return $this->success(LecturesResource::collection(Lecture::all())) ;
    }

    public function nameSearch($name)
    {
        //
        return $this->success(Lecture::where("name","like","%".$name."%")->get());
    }

    public function search(Request $request)
{
    $query = Lecture::query();

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

    $lecture = $query->get();

    // return view('lecture.index', compact('lecture'));
    return $this->success($lecture);



}

    public function store(StoreLectureRequest $request)
     {
        $request -> validated($request->all() );
        // $request->start_date=Carbon::createFromFormat('j-n-Y', $request->start_date)->format('j-n-Y');
        //  dd($request->start_date);
        $lecture = Lecture::create([


            // 'user_id' => Auth::user()->id ,

            'name'               => $request-> name,
            'type'               => $request-> type,
            'start_date'         => $request-> start_date,
            'start_time'         => $request-> start_time,
            'end_time'           => $request-> end_time,
            'target_people'      => $request-> target_people,
            'teacher_experience' => $request-> teacher_experience,
            'teacher_name'       => $request-> teacher_name,
        ]);

        return $this->success( new LecturesResource($lecture) , 'Lecture has added succussfully')  ;
    }


    public function show(Lecture $lecture)
    {
        return $this->success( new LecturesResource($lecture));
    }


    public function update(UpdateLectureRequest $request, Lecture $lecture)
    {
        // this work correctly
        // in postman make the method : Post (not patch not put)
        // and make in request body : _method = PUT

        $lecture=Lecture::find($lecture->id);
        // if (Auth::user()->id !== $lecture->user_id) {
        //     return $this->error('','You are not Authorized to make this request',403);
        //     // you should use the trait   (use HttpResponses ;) above

        // }

        $lecture->update($request->all());
        $lecture->save();

        return $this->success( new LecturesResource($lecture),'the Lecture has updated succeffuly');
    }


    public function destroy(Lecture $lecture)
    {
        // way 1 :
            $lecture->delete();
            // return $this->success('Lecture was Deleted Successfuly ','lecture was deleted successfully',204);
            return $this->success('Lecture was Deleted Successfuly ','lecture was deleted successfully',200);

        // way 2 : (it is best to do it in Show & Update functions [Implement Private function below] )

        // return $this->isNotAuthorized($lecture) ? $this->isNotAuthorized($lecture) : $lecture->delete();
        // return true (1) if the delete successfuly occoured
    }

    private function isNotAuthorized($lecture)
    {
        if (Auth::user()->id !== $lecture->user_id) {
            return $this->error('','You are not Authorized to make this request',403);
            }
        }
}
