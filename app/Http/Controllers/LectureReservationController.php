<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Lecture;
use App\Traits\HttpResponse;
use Illuminate\Http\Request;
use App\Models\LectureReservation;
use Illuminate\Support\Facades\Auth;
use App\Http\Resources\LectureReservationsResource;
use App\Http\Requests\StoreLectureReservationRequest;
use App\Http\Requests\UpdateLectureReservationRequest;

class LectureReservationController extends Controller
{
    use HttpResponse;

    public function allReservations()
    {
        return LectureReservationsResource::collection(
            LectureReservation::all()
        );
        // $reservations = LectureReservation::all() ;
        // return $reservations ;
    }
    public function acceptReservation(Request $request, $id)
    {
        $lecture_reservation = LectureReservation::findOrFail($id);
        $lecture_reservation->status = 'accepted';

        $lectureDetails = Lecture::find($lecture_reservation->lecture_id);
        $UserDetails = User::find($lecture_reservation->user_id);

        // $lectureDetails->amount->update(['amount' => $lectureDetails->amount-1 ]);

        // if ($lecture_reservation->status = 'accepted' && $lectureDetails->amount>=1 ) {
        //     $lectureDetails->amount = $lectureDetails->amount -1 ;
        // }
        $lecture_reservation->save();

        // dd($lectureDetails->amount);
        // $lecture = Lecture::findOrFail($request->lecture_id);
        // $lectureing->lecture_id;
        // $theLecture->amount = $theLecture->amount -1 ;

        // Additional logic based on your requirements
        return $this->success([
            "reservation" => $lecture_reservation,
            "lecture" => $lectureDetails,
            "user" => $UserDetails,
        ], 'Lecture Reservation has been accepted');
    }

    public function declineReservation(Request $request, $id)
    {
        $lecture_reservation = LectureReservation::findOrFail($id);
        $lecture_reservation->status = 'declined';
        $lecture_reservation->save();

        $lectureDetails = Lecture::find($lecture_reservation->lecture_id);
        $UserDetails = User::find($lecture_reservation->user_id);

        // Additional logic based on your requirements
        return $this->success([
            "reservation" => $lecture_reservation,
            "lecture" => $lectureDetails,
            "user" => $UserDetails,
        ], 'Lecture Reservation has been declined ');
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return LectureReservationsResource::collection(
            LectureReservation::where('user_id', Auth::user()->id)->get()
        ); // get lectureReservations thats users are authenticated
    }


    public function store(StoreLectureReservationRequest $request)
    {
        $request->validated($request->all());

            $lectureReservation = LectureReservation::create([
                'user_id'   => Auth::user()->id,
                'lecture_id'   => $request->lecture_id,
                'status'    => "waiting",
            ]);

            // $lecture = Lecture::findOrFail($request->lecture_id);

                return $this->success(
                    new LectureReservationsResource($lectureReservation),
                    'Lecture Reservation has been created , please wait until the resquest will be accepted '
                );

    }


    public function show(LectureReservation $lectureReservation)
    {
        if (Auth::user()->id !== $lectureReservation->user_id) {
            return $this->error('', 'You are not Authorized to make this request', 403);
            // you should use the trait   (use HttpResponses ;) above
        }
        return new LectureReservationsResource($lectureReservation);
    }

    public function update(UpdateLectureReservationRequest $request, LectureReservation $lectureReservation)
    {
        // in postman make the method : Post (not patch not put)
        // and make in request body : _method = PUT

        $lectureReservation = LectureReservation::find($lectureReservation->id);
        if (Auth::user()->id !== $lectureReservation->user_id) {
            return $this->error('', 'You are not Authorized to make this request', 403);
            // you should use the trait   (use HttpResponses ;) above

        }

        $lectureReservation->update($request->all());
        $lectureReservation->save();

        return new LectureReservationsResource($lectureReservation);
    }


    public function destroy(LectureReservation $lectureReservation)
    {
        // way 1 :
        // $lectureReservation->delete();
        // return $this->success('LectureReservation was Deleted Successfuly ',null,204);

        // way 2 : (it is best to do it in Show & Update functions [Implement Private function below] )

        return $this->isNotAuthorized($lectureReservation) ? $this->isNotAuthorized($lectureReservation) : $lectureReservation->delete();
        // return true (1) if the delete successfuly occoured
    }

    private function isNotAuthorized($lectureReservation)
    {
        if (Auth::user()->id !== $lectureReservation->user_id) {
            return $this->error('', 'You are not Authorized to make this request', 403);
        }
    }
}
