<?php

namespace App\Http\Controllers;

use App\Models\GeneralReport;
use Illuminate\Support\Facades\Auth;
use App\Http\Resources\GeneralReportsResource;
use App\Http\Requests\StoreGeneralReportRequest;
use App\Http\Requests\UpdateGeneralReportRequest;
use App\Traits\HttpResponse;

class GeneralReportController extends Controller
{   use HttpResponse;
    public function index()
    {
        #  return GeneralReportsResource::collection(
        #   GeneralReport::where('user_id',Auth::user()->id)->get() ) ; // get generalReports thats users are authenticated

        return GeneralReportsResource::collection(
            GeneralReport::all() ) ; // get generalReports thats users are authenticated

    }

    public function store(StoreGeneralReportRequest $request)
    {
        $request -> validated($request->all() );

        $generalReport = GeneralReport::create([

            'name'              => $request ->  name ,
            'teacher_name'      => $request ->  teacher_name ,
            'attenders_count'   => $request ->  attenders_count ,
            'attenders_percent' => $request ->  attenders_percent ,
            'sessions_count'    => $request ->  sessions_count ,
        ]);

        return $this->success(new GeneralReportsResource($generalReport) , 'General report Has been created successfully');

    }

    public function show(GeneralReport $generalReport)
    {
        if (Auth::user()->id !== $generalReport->user_id) {
            return $this->error('','You are not Authorized to make this request',403);
            // you should use the trait   (use HttpResponses ;) above
        }
        return new GeneralReportsResource($generalReport);
    }

    public function update(UpdateGeneralReportRequest $request,GeneralReport $generalReport)  // this work correctly
        // in postman make the method : Post (not patch not put)
        // and make in request body : _method = PUT
    {
        $generalReport=GeneralReport::find($generalReport->id);
        if (Auth::user()->id !== $generalReport->user_id) {
            return $this->error('','You are not Authorized to make this request',403);
            // you should use the trait   (use HttpResponses ;) above

        }

        $generalReport->update($request->all());
        $generalReport->save();

        return new GeneralReportsResource($generalReport);
    }


    public function destroy(GeneralReport $generalReport)
    {
        // way 1 :
            // $generalReport->delete();
            // return $this->success('GeneralReport was Deleted Successfuly ',null,204);

        // way 2 : (it is best to do it in Show & Update functions [Implement Private function below] )

        return $this->isNotAuthorized($generalReport) ? $this->isNotAuthorized($generalReport) : $generalReport->delete();
        // return true (1) if the delete successfuly occoured
    }

    private function isNotAuthorized($generalReport)
    {
        if (Auth::user()->id !== $generalReport->user_id) {
            return $this->error('','You are not Authorized to make this request',403);
            }
        }
}
