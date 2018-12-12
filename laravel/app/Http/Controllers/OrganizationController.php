<?php

namespace App\Http\Controllers;

use App\Events\AuthorizeRequest;
use App\Organization;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrganizationController extends Controller
{
    const CRYPT_STD_DES = 1;
    public function requests($id, $organization_id, $user_id)
    {
        if($id == 1){
            $user = User::whereId($user_id)->get();
            $user = $user[0];

            $user->organization_id = $organization_id;
            $updated = $user->update();

            if($updated){
                $eventFired = event(new AuthorizeRequest($user));
                if($eventFired) {
                    session()->put('success', 'User has been approved and added to the Org.');
                    //add user to members DB
                    DB::table('members')->insert([
                        'user_id' => $user->id,
                        'organization_id' => $user->organization_id,
                        'created_at' => Carbon::now(),
                    ]);
                    DB::table('requests')
                        ->where('user_id', $user_id)
                        ->where('organization_id', $organization_id)
                        ->delete();
                    return back();
                }
            }
            session()->put('error', 'There was an error approving the user, <b>notification was not sent.</b>');
            return back();
        }else{
            DB::table('requests')
                ->where('user_id', $user_id)
                ->where('organization_id', $organization_id)
                ->delete();
        }
        return back();
    }

    public function generateHash($organization_id)
    {

        $organization = DB::table('organizations')->where('id', $organization_id)->value('org_name');
            //generate the hash for invitations
            $time = Carbon::now()->format('s').Carbon::now()->format('H');
            $hash = crypt($organization, $time);
            //store the hash in the DB for future reference( this gets overwritten every time its generated.)
            DB::table('organizations')->where('id', $organization_id)->update([
                'refHash' => $hash
            ]);

            return $hash;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Organization  $organization
     * @return \Illuminate\Http\Response
     */
    public function show(Organization $organization)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Organization  $organization
     * @return \Illuminate\Http\Response
     */
    public function edit(Organization $organization)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Organization  $organization
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Organization $organization)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Organization  $organization
     * @return \Illuminate\Http\Response
     */
    public function destroy(Organization $organization)
    {
        //
    }
}
