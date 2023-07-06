<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Traits\HttpResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Resources\DepartmentsResource;
use App\Http\Requests\StoreDepartmentRequest;
use App\Http\Requests\UpdateDepartmentRequest;

class DepartmentController extends Controller
{
    use HttpResponse ;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
         #  return DepartmentsResource::collection(
        #   Department::where('user_id',Auth::user()->id)->get() ) ; // get departments thats users are authenticated

        return DepartmentsResource::collection(Department::get()) ; // get departments thats users are authenticated

    }

    public function search(Request $request)
    {
        $query = Department::query();

        if ($request->has('name')) {
            $query->where('name', 'like', '%' . $request->input('name') . '%');
        }


        if ($request->has('rows_count')) {
            $query->where('rows_count', 'like', '%' . $request->input('rows_count') . '%');
        }

        if ($request->has('max_row_books')) {
            $query->where('max_row_books', '=', $request->input('max_row_books') );
        }

        $department = $query->get();
        return $this->success($department);

    }
    public function store(StoreDepartmentRequest $request)
    {
        $request -> validated($request->all() );

        $department = Department::create([

            'name'  => $request-> name,
            'rows_count'  => $request-> rows_count,
            'max_row_books'  => $request-> max_row_books,

            //relations :

                // 'user_id' => $request->department_name, //as an exapmle
        ]);

        return new DepartmentsResource($department) ;
    }

    public function show(Department $department)
    {
        return new DepartmentsResource($department);
    }


    public function update(UpdateDepartmentRequest $request, Department $department)
    {
        $department=Department::find($department->id);
        if (Auth::user()->id !== $department->user_id) {
            return $this->error('','You are not Authorized to make this request',403);
            // you should use the trait   (use HttpResponses ;) above

        }

        $department->update($request->all());
        $department->save();

        return new DepartmentsResource($department);
    }


    public function destroy(Department $department)
    {
          // way 1 :
            // $department->delete();
            // return $this->success('Department was Deleted Successfuly ',null,204);

        // way 2 : (it is best to do it in Show & Update functions [Implement Private function below] )

        return $this->isNotAuthorized($department) ? $this->isNotAuthorized($department) : $department->delete();
        // return true (1) if the delete successfuly occoured

    }

    private function isNotAuthorized($department)
    {
        if (Auth::user()->id !== $department->user_id) {
            return $this->error('','You are not Authorized to make this request',403);
            }
        }

}
