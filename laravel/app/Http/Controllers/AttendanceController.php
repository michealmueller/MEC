<?php

namespace App\Http\Controllers;

use App\Attendance;
use Illuminate\Http\Request;

class AttendanceController extends Controller
{
    //

    protected function create(Request $request)
    {
        $attendance = new Attendance;
        $saved = $attendance->create([
           'user_id' => $request->user_id,
           'event_id' => $request->event_id,
           'status' => $request->status,
        ]);

        if($saved) {
            $response = collect(
                (object)[
                    'selector' => 'status',
                    'selector2' => 'attend',
                    'notificationType' => 'info',
                    'notificationMsg' => 'Attendance for this event has been saved',
                    'replaceText' => 'Updating',
                    'replaceText2' => '<li class="d-flex justify-content-start g-brd-around g-brd-gray-light-v4 g-pa-5 g-mb-5">
                                        <div class="g-pos-rel g-mr-5">
                                            <img class="g-width-50 g-height-50 rounded" src="/storage/app/org_logos/{{$attendee->organization->org_logo}}" alt="Image Description">
                                        </div>
        
                                        <div class="align-self-center g-px-10">
                                            <h5 class="h6 g-font-weight-600 g-color-white g-mb-3">
                                                <span class="g-mr-5">{{ $attendee->username}}</span>
                                            </h5>
                                        </div>
                                        <div class="align-self-center ml-auto">
                                            <span class="u-label u-label--sm g-rounded-20 g-px-10">'.$request->status.'</span></div>
                                      </li>',
                    'errorMsg' => ''
                ]);
            return $response;
        }
    }
}
