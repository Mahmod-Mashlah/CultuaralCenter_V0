<?php

namespace App\Http\Controllers;

use App\Models\Play;
use App\Models\User;
use Illuminate\Http\Request;
use App\Traits\HttpResponse;
use App\Models\PlayReservation;
use Illuminate\Support\Facades\Auth;
use App\Http\Resources\PlayReservationsResource;
use App\Http\Requests\StorePlayReservationRequest;
use App\Http\Requests\UpdatePlayReservationRequest;

class PlayReservationController extends Controller
{
    use HttpResponse;

    public function allReservations()
    {
        return PlayReservationsResource::collection(
            PlayReservation::all()
        );
        // $reservations = PlayReservation::all() ;
        // return $reservations ;
    }
    public function acceptReservation(Request $request, $id)
    {
        $play_reservation = PlayReservation::findOrFail($id);
        $play_reservation->status = 'accepted';

        $playDetails = Play::find($play_reservation->play_id);
        $UserDetails = User::find($play_reservation->user_id);

        // $playDetails->amount->update(['amount' => $playDetails->amount-1 ]);

        // if ($play_reservation->status = 'accepted' && $playDetails->amount>=1 ) {
        //     $playDetails->amount = $playDetails->amount -1 ;
        // }
        $play_reservation->save();

        // dd($playDetails->amount);
        // $play = Play::findOrFail($request->play_id);
        // $playing->play_id;
        // $thePlay->amount = $thePlay->amount -1 ;

        // Additional logic based on your requirements
        return $this->success([
            "reservation" => $play_reservation,
            "play" => $playDetails,
            "user" => $UserDetails,
        ], 'Play Reservation has been accepted');
    }

    public function declineReservation(Request $request, $id)
    {
        $play_reservation = PlayReservation::findOrFail($id);
        $play_reservation->status = 'declined';
        $play_reservation->save();

        $playDetails = Play::find($play_reservation->play_id);
        $UserDetails = User::find($play_reservation->user_id);

        // Additional logic based on your requirements
        return $this->success([
            "reservation" => $play_reservation,
            "play" => $playDetails,
            "user" => $UserDetails,
        ], 'Play Reservation has been declined ');
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return PlayReservationsResource::collection(
            PlayReservation::where('user_id', Auth::user()->id)->get()
        ); // get playReservations thats users are authenticated
    }


    public function store(StorePlayReservationRequest $request)
    {
        $request->validated($request->all());

            $playReservation = PlayReservation::create([
                'user_id'   => Auth::user()->id,
                'play_id'   => $request->play_id,
                'status'    => "waiting",
            ]);

            // $play = Play::findOrFail($request->play_id);

                return $this->success(
                    new PlayReservationsResource($playReservation),
                    'Play Reservation has been created , please wait until the resquest will be accepted '
                );

    }


    public function show(PlayReservation $playReservation)
    {
        if (Auth::user()->id !== $playReservation->user_id) {
            return $this->error('', 'You are not Authorized to make this request', 403);
            // you should use the trait   (use HttpResponses ;) above
        }
        return new PlayReservationsResource($playReservation);
    }

    public function update(UpdatePlayReservationRequest $request, PlayReservation $playReservation)
    {
        // in postman make the method : Post (not patch not put)
        // and make in request body : _method = PUT

        $playReservation = PlayReservation::find($playReservation->id);
        if (Auth::user()->id !== $playReservation->user_id) {
            return $this->error('', 'You are not Authorized to make this request', 403);
            // you should use the trait   (use HttpResponses ;) above

        }

        $playReservation->update($request->all());
        $playReservation->save();

        return new PlayReservationsResource($playReservation);
    }


    public function destroy(PlayReservation $playReservation)
    {
        // way 1 :
        // $playReservation->delete();
        // return $this->success('PlayReservation was Deleted Successfuly ',null,204);

        // way 2 : (it is best to do it in Show & Update functions [Implement Private function below] )

        return $this->isNotAuthorized($playReservation) ? $this->isNotAuthorized($playReservation) : $playReservation->delete();
        // return true (1) if the delete successfuly occoured
    }

    private function isNotAuthorized($playReservation)
    {
        if (Auth::user()->id !== $playReservation->user_id) {
            return $this->error('', 'You are not Authorized to make this request', 403);
        }
    }
}
