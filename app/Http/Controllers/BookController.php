<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Department;
use App\Traits\HttpResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Resources\BooksResource;
use App\Http\Requests\StoreBookRequest;
use App\Http\Requests\UpdateBookRequest;

class BookController extends Controller
{
    use HttpResponse ;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        #  return BooksResource::collection(
        #   Book::where('user_id',Auth::user()->id)->get() ) ; // get books thats users are authenticated

        return BooksResource::collection(Book::get()) ; // get books thats users are authenticated

    }

    public function search(Request $request)
    {
        $query = Book::query();

        if ($request->has('name')) {
            $query->where('name', 'like', '%' . $request->input('name') . '%');
        }


        if ($request->has('author')) {
            $query->where('author', 'like', '%' . $request->input('author') . '%');
        }


        if ($request->has('amount')) {
            $query->where('amount', 'like', '%' . $request->input('amount') . '%');
        }

        if ($request->has('row')) {
            $query->where('row', 'like', '%' . $request->input('row') . '%');
        }

        if ($request->has('type')) {
            $query->where('type', 'like', '%' . $request->input('type') . '%');
        }

        $result = $query->get();

        return $this->success($result,'Searching done',200);

    }
    public function store(StoreBookRequest $request)
    {

        $request -> validated($request->all() );

        $department = Department::find('department_id');


        $book = Book::create([

            'name' => $request->name,
            'author' => $request->author,
            'amount' => $request->amount,
            'type' => $request->type,
            'row' => $request->row,
            'department_id' => $department->id,

            //relations :

                // 'department_name' => $request->department_name,
        ]);

        return $this->success(new BooksResource($book),'The Book has created Successfuly ',200);

    }

    public function show(Book $book)
    {

        return new BooksResource($book);
    }

    public function update(UpdateBookRequest $request, Book $book)
    {
        $book=Book::find($book->id);
        if (Auth::user()->id !== $book->user_id) {
            return $this->error('','You are not Authorized to make this request',403);



        }

        $book->update($request->all());
        $book->save();

        return $this->success(new BooksResource($book),'The Book data has updated Successfuly ',200);

    }

    public function destroy(Book $book)
    {
        // way 1 :
            $book->delete();
            return $this->success([],'Book has been Deleted Successfuly ',200);

        // way 2 : (it is best to do it in Show & Update functions [Implement Private function below] )

        // return $this->isNotAuthorized($book) ? $this->isNotAuthorized($book) : $book->delete();
        // return true (1) if the delete successfuly occoured
    }

    // private function isNotAuthorized($book)
    // {
    //     if (Auth::user()->id !== $book->user_id) {
    //         return $this->error('','You are not Authorized to make this request',403);
    //         }
    //     }

    }
