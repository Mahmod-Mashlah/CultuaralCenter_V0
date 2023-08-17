<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Traits\HttpResponse;
use Illuminate\Http\Request;
use App\Models\BookReservation;
use Illuminate\Support\Facades\Auth;
use App\Http\Resources\BookReservationsResource;
use App\Http\Requests\StoreBookReservationRequest;
use App\Http\Requests\UpdateBookReservationRequest;
use App\Models\User;
use Carbon\Carbon;

class BookReservationController extends Controller
{
    use HttpResponse;

    public function allReservations()
    {
        return BookReservationsResource::collection(
            BookReservation::all()
        );
        // $reservations = BookReservation::all() ;
        // return $reservations ;
    }
    public function acceptReservation(Request $request, $id)
    {
        $booking = BookReservation::findOrFail($id);
        $booking->status = 'accepted';

        $bookDetails = Book::find($booking->book_id);
        $UserDetails = User::find($booking->user_id);

        // $bookDetails->amount->update(['amount' => $bookDetails->amount-1 ]);



        // if ($booking->status = 'accepted' && $bookDetails->amount>=1 ) {
        //     $bookDetails->amount = $bookDetails->amount -1 ;
        // }
        $booking->save();

        // dd($bookDetails->amount);
        // $book = Book::findOrFail($request->book_id);
        // $booking->book_id;
        // $theBook->amount = $theBook->amount -1 ;

        // Additional logic based on your requirements
        return $this->success([
            "reservation" => $booking,
            "book" => $bookDetails,
            "user" => $UserDetails,
        ], 'Book Reservation has been accepted');
    }

    public function declineReservation(Request $request, $id)
    {
        $booking = BookReservation::findOrFail($id);
        $booking->status = 'declined';
        $booking->save();

        $bookDetails = Book::find($booking->book_id);
        $UserDetails = User::find($booking->user_id);

        // Additional logic based on your requirements
        return $this->success([
            "reservation" => $booking,
            "book" => $bookDetails,
            "user" => $UserDetails,
        ], 'Book Reservation has been declined ');
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return BookReservationsResource::collection(
            BookReservation::where('user_id', Auth::user()->id)->get()
        ); // get bookReservations thats users are authenticated
    }


    public function store(StoreBookReservationRequest $request)
    {
        $request->validated($request->all());



        $startDate = Carbon::parse($request->from_date);
        $endDate = Carbon::parse($request->to_date);

        $twoDaysAfterStartDate = $startDate->addDays(2);

        if ($twoDaysAfterStartDate->lte($endDate)) {

            $bookReservation = BookReservation::create([
                'user_id'   => Auth::user()->id,
                'book_id'   => $request->book_id,
                'from_date' => $request->from_date,
                'to_date'   => $request->to_date,
                'status'    => "waiting",
            ]);

            $book = Book::findOrFail($request->book_id);


            if ($book->amount > 0) {

                return $this->success(
                    new BookReservationsResource($bookReservation),
                    'Book Reservation has been created , please wait until the resquest will be accepted '
                );
            } else {
                return $this->error([], 'There is no available book at the moment . Try again later ', 404);
            }
        } else {
            return $this->error([], 'The Date of restore book should be at least after two days from borrow the book', 400);
        }
    }


    public function show(BookReservation $bookReservation)
    {
        if (Auth::user()->id !== $bookReservation->user_id) {
            return $this->error('', 'You are not Authorized to make this request', 403);
            // you should use the trait   (use HttpResponses ;) above
        }
        return new BookReservationsResource($bookReservation);
    }

    public function update(UpdateBookReservationRequest $request, BookReservation $bookReservation)
    {
        // in postman make the method : Post (not patch not put)
        // and make in request body : _method = PUT

        $bookReservation = BookReservation::find($bookReservation->id);
        if (Auth::user()->id !== $bookReservation->user_id) {
            return $this->error('', 'You are not Authorized to make this request', 403);
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
            return $this->error('', 'You are not Authorized to make this request', 403);
        }
    }
}
