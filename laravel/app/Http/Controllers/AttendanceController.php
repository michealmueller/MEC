<?php

namespace App\Http\Controllers;

use App\Attendance;
use App\Event;
use App\RecentActivity;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AttendanceController extends Controller
{
    //

    public function create(Request $request)
    {
        $attendance = new Attendance;

        $exists = $attendance->where('user_id', $request->user_id)->where('event_id', $request->event_id)->get()->first();

        if(!is_null($exists)){
            $updateAttendance = $attendance->where('user_id', $request->user_id)->where('event_id', $request->event_id)->value('id');

            $saved = $attendance->where('id', $updateAttendance)->update([
                'status' => $request->status
            ]);
            //$updateAttendance->status = $request->status;
            //$saved = $attendance->update();
        }else {
            $saved = $attendance->create([
                'user_id' => $request->user_id,
                'event_id' => $request->event_id,
                'status' => $request->status,
            ]);
        }
        if($saved) {
            $recent = new RecentActivity;
            $recent->create([
                'user_id' => Auth::user()->id,
                'message' => 'Attendance marked as '.$request->status.' for '. Event::findOrFail($request->event_id)->title
                ]);
            switch($request->status){
                case 'No';
                    $statusHTML = '<span class="u-label u-label--sm badge-danger g-rounded-20 g-px-10">Not Attending</span></div>';
                break;
                case 'Maybe';
                    $statusHTML = '<span class="u-label u-label--sm badge-info g-rounded-20 g-px-10">Tentative</span></div>';
                break;
                case 'Yes';
                    $statusHTML = '<span class="u-label u-label--sm badge-success g-rounded-20 g-px-10">Attending</span></div>';
                break;
            }

            if(Auth::user()->organization) {
                $img = '<img class="g-width-50 g-height-50 rounded" src = "/storage/app/org_logos/'.Auth::user()->organization->org_logo.'" alt = "'.Auth::user()->organization->org_name.' Logo" >';
            }else {
                $img = '<img class="g-width-50 g-height-50 rounded" src = "/storage/app/avatars/'.Auth::user()->avatar.'" alt = "'.Auth::user()->username .'Avatar Image" >';
            }

            $response = collect(
                (object)[
                    'selector' => 'status',
                    'selector2' => 'attend',
                    'notificationType' => 'info',
                    'notificationMsg' => 'Attendance for this event has been saved',
                    'replaceText' => 'Updating',
                    'replaceText2' => '<li class="d-flex justify-content-start g-bg-gray-dark-v1 g-brd-around g-brd-gray-light-v4 g-pa-5 g-mb-5">
                                        <div class="g-pos-rel g-mr-5">
                                            '.$img.'
                                        </div>
        
                                        <div class="align-self-center g-px-10">
                                            <h5 class="h6 g-font-weight-600 g-color-white g-mb-3">
                                                <span class="g-mr-5">'.Auth::user()->username.'</span>
                                            </h5>
                                        </div>
                                        <div class="align-self-center ml-auto">'.$statusHTML.'</li>',
                ]);
            return $response;
        }else{
            $response = collect(
                (object)[
                    'errorMsg' => 'There was an issue with updating the attendance'
                ]
            );

            return $response;
        }
    }

    public function read(Event $event){
        $attendance = new Attendance;
        //dd();
        $result = $event; //$attendance->where('event_id', $event_id)->get()->all();

        $response = '';
        foreach($result as $attendee){
            switch($attendee->status){
                case 'No';
                    $statusHTML = '<span class="u-label u-label--sm badge-danger g-rounded-20 g-px-10">Not Attending</span></div>';
                    break;
                case 'Maybe';
                    $statusHTML = '<span class="u-label u-label--sm badge-info g-rounded-20 g-px-10">Tentative</span></div>';
                    break;
                case 'Yes';
                    $statusHTML = '<span class="u-label u-label--sm badge-success g-rounded-20 g-px-10">Attending</span></div>';
                    break;
            }
            $response .= '<li class="d-flex justify-content-start g-brd-around g-brd-gray-light-v4 g-pa-5 g-mb-5">
                                        <div class="g-pos-rel g-mr-5">
                                            <img class="g-width-50 g-height-50 rounded" src="/storage/app/org_logos/'.User::findOrFail($attendee->user_id)->organization->org_logo.'" alt="Image Description">
                                        </div>
        
                                        <div class="align-self-center g-px-10">
                                            <h5 class="h6 g-font-weight-600 g-color-white g-mb-3">
                                                <span class="g-mr-5">'.User::findOrFail($attendee->user_id)->username.'</span>
                                            </h5>
                                        </div>
                                        <div class="align-self-center ml-auto">'.$statusHTML.'</li>';
        }


        return $response;
    }
}
