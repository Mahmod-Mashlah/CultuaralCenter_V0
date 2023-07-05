<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Http\Requests\StoreBookRequest;
use App\Http\Requests\UpdateBookRequest;
use App\Traits\HttpResponse;
use App\Http\Resources\BooksResource;
use Illuminate\Support\Facades\Auth;

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

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreBookRequest $request)
    {

        $request -> validated($request->all() );

        $book = Book::create([

            'name' => $request->name,
            'author' => $request->author,
            'amount' => $request->amount,
            'type' => $request->type,
            'row' => $request->row,

            //relations :

                // 'department_name' => $request->department_name,
        ]);

        return new BooksResource($book) ;
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
            // you should use the trait   (use HttpResponses ;) above

        }

        $book->update($request->all());
        $book->save();

        return new BooksResource($book);
    }

    public function destroy(Book $book)
    {
        // way 1 :
            // $book->delete();
            // return $this->success('Book was Deleted Successfuly ',null,204);

        // way 2 : (it is best to do it in Show & Update functions [Implement Private function below] )

        return $this->isNotAuthorized($book) ? $this->isNotAuthorized($book) : $book->delete();
        // return true (1) if the delete successfuly occoured
    }

    private function isNotAuthorized($book)
    {
        if (Auth::user()->id !== $book->user_id) {
            return $this->error('','You are not Authorized to make this request',403);
            }
        }

    }
