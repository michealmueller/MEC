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
        //dd($request->status, $request->user_id, $request->event_id);
        $attendance = new Attendance;
//check if user has already submitted attendance information
        $exists = $attendance->where('user_id', $request->user_id)->where('event_id', $request->event_id)->get()->first();
//if they have update there status.
        if(!is_null($exists)){
            $updateAttendance = $attendance->where('user_id', $request->user_id)->where('event_id', $request->event_id)->value('id');

            $saved = $attendance->where('id', $updateAttendance)->update([
                'status' => $request->status
            ]);
            //$updateAttendance->status = $request->status;
            //$saved = $attendance->update();
        }else {
//if not create them in the DB
            $saved = $attendance->create([
                'user_id' => $request->user_id,
                'event_id' => $request->event_id,
                'status' => $request->status,
            ]);
        }
//update recent activity
        if($saved) {
            $recent = new RecentActivity;
            $recent->create([
                'user_id' => Auth::user()->id,
                'message' => 'Attendance marked as '.$request->status.' for '. Event::findOrFail($request->event_id)->title
                ]);

//set status for html output
            $athedUserstatus = self::setStatus($request->status);

//get user logo / organization logo
            if(Auth::user()->organization) {
                $img = '<img class="g-width-50 g-height-50 rounded" src = "/storage/app/org_logos/'.Auth::user()->organization->org_logo.'" alt = "'.Auth::user()->organization->org_name.' Logo" >';
            }else {
                $img = '<img class="g-width-50 g-height-50 rounded" src = "/storage/app/avatars/'.Auth::user()->avatar.'" alt = "'.Auth::user()->username .'Avatar Image" >';
            }

//get all attending and remove user if already exists so there is no duplicate, and so that it does not remove
// all others attending but just adds to list or updates.

            $replaceTextAll = '';
            $allAttending = $attendance->where('event_id', $request->event_id)->get();
            //remove existing entry so there is no duplicate
            foreach($allAttending as $k=>$attending){
                if($attending->user_id === Auth::user()->id){
                    unset($allAttending[$k]);
                }
            }
            foreach ($allAttending as $user){
                //get user collection
                $attendee = User::findOrFail($user->user_id);
                $attenUsersStatus = self::setStatus($attendance->where('user_id', $user->user_id)->value('status'));

                //check for organization and user logo instead of avatar
                if($attendee->organization){
                    $avatar = $img = '<img class="g-width-50 g-height-50 rounded" src = "/storage/app/org_logos/'.$attendee->org_logo.'" alt = "'.$attendee->org_name.' Logo" >';
                }else{
                    $avatar = '<img class="g-width-50 g-height-50 rounded" src = "/storage/app/avatars/'.$attendee->avatar.'" alt = "'.$attendee->username .'Avatar Image" >';
                }
               $replaceTextAll .= '<li class="d-flex justify-content-start g-bg-gray-dark-v1 g-brd-around g-brd-gray-light-v4 g-pa-5 g-mb-5">
                                        <div class="g-pos-rel g-mr-5">
                                            '.$avatar.'
                                        </div>
        
                                        <div class="align-self-center g-px-10">
                                            <h5 class="h6 g-font-weight-600 g-color-white g-mb-3">
                                                <span class="g-mr-5">'.$attendee->username.'</span>
                                            </h5>
                                        </div>
                                        <div class="align-self-center ml-auto">'.$attenUsersStatus.'</li>';
           }

//send back the responce for java to update in real time.
            $response = collect(
                (object)[
                    'selector' => 'divStatus',
                    'selector2' => 'attend',
                    'notificationType' => 'info',
                    'notificationMsg' => 'Attendance for this event has been saved',
                    'replaceText' => 'Updating',
                    'replaceText2' => $replaceTextAll .'<li class="d-flex justify-content-start g-bg-gray-dark-v1 g-brd-around g-brd-gray-light-v4 g-pa-5 g-mb-5">
                                        <div class="g-pos-rel g-mr-5">
                                            '.$img.'
                                        </div>
        
                                        <div class="align-self-center g-px-10">
                                            <h5 class="h6 g-font-weight-600 g-color-white g-mb-3">
                                                <span class="g-mr-5">'.Auth::user()->username.'</span>
                                            </h5>
                                        </div>
                                        <div class="align-self-center ml-auto">'.$athedUserstatus.'</li>',
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

    protected function setStatus($status){
        switch($status){
            case 'No';
                $statusHTML = '<span class="u-label u-label--sm badge-danger g-rounded-20 g-px-10">Not Attending</span>';
                break;
            case 'Maybe';
                $statusHTML = '<span class="u-label u-label--sm badge-info g-rounded-20 g-px-10">Tentative</span>';
                break;
            case 'Yes';
                $statusHTML = '<span class="u-label u-label--sm badge-success g-rounded-20 g-px-10">Attending</span>';
                break;
        }
        return $statusHTML;
    }

    public function read(Event $event){
        $attendance = new Attendance;
        //dd();
        $result = $event; //$attendance->where('event_id', $event_id)->get()->all();

        $response = '';
        foreach($result as $attendee){
            $status = self::setStatus($attendee->status);
            $response .= '<li class="d-flex justify-content-start g-brd-around g-brd-gray-light-v4 g-pa-5 g-mb-5">
                                        <div class="g-pos-rel g-mr-5">
                                            <img class="g-width-50 g-height-50 rounded" src="/storage/app/org_logos/'.User::findOrFail($attendee->user_id)->organization->org_logo.'" alt="Image Description">
                                        </div>
        
                                        <div class="align-self-center g-px-10">
                                            <h5 class="h6 g-font-weight-600 g-color-white g-mb-3">
                                                <span class="g-mr-5">'.User::findOrFail($attendee->user_id)->username.'</span>
                                            </h5>
                                        </div>
                                        <div class="align-self-center ml-auto">'.$status.'</li>';
        }


        return $response;
    }
}
