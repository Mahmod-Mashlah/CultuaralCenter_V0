<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Activity;
use Illuminate\Http\Request;
use App\Traits\HttpResponse;
use App\Models\ActivityReservation;
use Illuminate\Support\Facades\Auth;
use App\Http\Resources\ActivityReservationsResource;
use App\Http\Requests\StoreActivityReservationRequest;
use App\Http\Requests\UpdateActivityReservationRequest;

class ActivityReservationController extends Controller
{
    use HttpResponse;

    public function allReservations()
    {
        return ActivityReservationsResource::collection(
            ActivityReservation::all()
        );
        // $reservations = ActivityReservation::all() ;
        // return $reservations ;
    }
    public function acceptReservation(Request $request, $id)
    {
        $activity_reservation = ActivityReservation::findOrFail($id);
        $activity_reservation->status = 'accepted';

        $activityDetails = Activity::find($activity_reservation->activity_id);
        $UserDetails = User::find($activity_reservation->user_id);

        // $activityDetails->amount->update(['amount' => $activityDetails->amount-1 ]);

        // if ($activity_reservation->status = 'accepted' && $activityDetails->amount>=1 ) {
        //     $activityDetails->amount = $activityDetails->amount -1 ;
        // }
        $activity_reservation->save();

        // dd($activityDetails->amount);
        // $activity = Activity::findOrFail($request->activity_id);
        // $activitying->activity_id;
        // $theActivity->amount = $theActivity->amount -1 ;

        // Additional logic based on your requirements
        return $this->success([
            "reservation" => $activity_reservation,
            "activity" => $activityDetails,
            "user" => $UserDetails,
        ], 'Activity Reservation has been accepted');
    }

    public function declineReservation(Request $request, $id)
    {
        $activity_reservation = ActivityReservation::findOrFail($id);
        $activity_reservation->status = 'declined';
        $activity_reservation->save();

        $activityDetails = Activity::find($activity_reservation->activity_id);
        $UserDetails = User::find($activity_reservation->user_id);

        // Additional logic based on your requirements
        return $this->success([
            "reservation" => $activity_reservation,
            "activity" => $activityDetails,
            "user" => $UserDetails,
        ], 'Activity Reservation has been declined ');
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return ActivityReservationsResource::collection(
            ActivityReservation::where('user_id', Auth::user()->id)->get()
        ); // get activityReservations thats users are authenticated
    }


    public function store(StoreActivityReservationRequest $request)
    {
        $request->validated($request->all());

            $activityReservation = ActivityReservation::create([
                'user_id'   => Auth::user()->id,
                'activity_id'   => $request->activity_id,
                'status'    => "waiting",
            ]);

            // $activity = Activity::findOrFail($request->activity_id);

                return $this->success(
                    new ActivityReservationsResource($activityReservation),
                    'Activity Reservation has been created , please wait until the resquest will be accepted '
                );

    }


    public function show(ActivityReservation $activityReservation)
    {
        if (Auth::user()->id !== $activityReservation->user_id) {
            return $this->error('', 'You are not Authorized to make this request', 403);
            // you should use the trait   (use HttpResponses ;) above
        }
        return new ActivityReservationsResource($activityReservation);
    }

    public function update(UpdateActivityReservationRequest $request, ActivityReservation $activityReservation)
    {
        // in postman make the method : Post (not patch not put)
        // and make in request body : _method = PUT

        $activityReservation = ActivityReservation::find($activityReservation->id);
        if (Auth::user()->id !== $activityReservation->user_id) {
            return $this->error('', 'You are not Authorized to make this request', 403);
            // you should use the trait   (use HttpResponses ;) above

        }

        $activityReservation->update($request->all());
        $activityReservation->save();

        return new ActivityReservationsResource($activityReservation);
    }


    public function destroy(ActivityReservation $activityReservation)
    {
        // way 1 :
        // $activityReservation->delete();
        // return $this->success('ActivityReservation was Deleted Successfuly ',null,204);

        // way 2 : (it is best to do it in Show & Update functions [Implement Private function below] )

        return $this->isNotAuthorized($activityReservation) ? $this->isNotAuthorized($activityReservation) : $activityReservation->delete();
        // return true (1) if the delete successfuly occoured
    }

    private function isNotAuthorized($activityReservation)
    {
        if (Auth::user()->id !== $activityReservation->user_id) {
            return $this->error('', 'You are not Authorized to make this request', 403);
        }
    }
}
