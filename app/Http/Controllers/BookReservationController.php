<?php

namespace App\Http\Controllers;

use App\Models\BookReservation;
use Illuminate\Support\Facades\Auth;
use App\Http\Resources\BookReservationsResource;
use App\Http\Requests\StoreBookReservationRequest;
use App\Http\Requests\UpdateBookReservationRequest;
use App\Models\Book;
use App\Traits\HttpResponse;

class BookReservationController extends Controller
{
    use HttpResponse ;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
          return BookReservationsResource::collection(
           BookReservation::where('user_id',Auth::user()->id)->get() ) ; // get bookReservations thats users are authenticated



    }


    public function store(StoreBookReservationRequest $request)
    {
        $request -> validated($request->all() );

        $bookReservation = BookReservation::create([
            'user_id'   => Auth::user()->id ,
            'book_id'   => $request->book_id ,
            'from_date' => $request->from_date ,
            'to_date'   => $request->to_date ,
        ]);

        $book = Book::findOrFail($request->book_id);
        $book->amount= $book->amount -1 ;

        if ($book->book->amount > 0 ) {

            return new BookReservationsResource($bookReservation) ;
        }

        else {
            return $this->error([],'There is no available book at the moment . Try again later ',404);
        }
    }


    public function show(BookReservation $bookReservation)
    {
        if (Auth::user()->id !== $bookReservation->user_id) {
            return $this->error('','You are not Authorized to make this request',403);
            // you should use the trait   (use HttpResponses ;) above
        }
        return new BookReservationsResource($bookReservation);
    }

    public function update(UpdateBookReservationRequest $request, BookReservation $bookReservation)
    {
        // in postman make the method : Post (not patch not put)
        // and make in request body : _method = PUT

        $bookReservation=BookReservation::find($bookReservation->id);
        if (Auth::user()->id !== $bookReservation->user_id) {
            return $this->error('','You are not Authorized to make this request',403);
            // you should use the trait   (use HttpResponses ;) above

        }

        $bookReservation->update($request->all());
        $bookReservation->save();

        return new BookReservationsResource($bookReservation);

    }


    public function destroy(BookReservation $bookReservation)
    {
        // way 1 :
            // $bookReservation->delete();
            // return $this->success('BookReservation was Deleted Successfuly ',null,204);

        // way 2 : (it is best to do it in Show & Update functions [Implement Private function below] )

        return $this->isNotAuthorized($bookReservation) ? $this->isNotAuthorized($bookReservation) : $bookReservation->delete();
        // return true (1) if the delete successfuly occoured
    }

    private function isNotAuthorized($bookReservation)
    {
        if (Auth::user()->id !== $bookReservation->user_id) {
            return $this->error('','You are not Authorized to make this request',403);
            }
        }

}
