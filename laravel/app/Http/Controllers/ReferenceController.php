<?php

namespace App\Http\Controllers;

use App\Organization;
use App\User;
use Carbon\Carbon;
use http\Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class ReferenceController extends Controller
{
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'username' => 'required|max:255|unique:users,username',
            'email' => 'required|email|max:255|unique:users,email',
            'password' => 'required|min:6|confirmed',
        ]);
    }
    //verify reference code and register user under organization.
    public function verifyRefCode($refHash)
    {

            $organization = Organization::where('refHash', $refHash)->first();

        if($organization === null){
            abort(404);
        }
        //dd($organization);
        return view('org_ref_register')->with('organization', $organization);

    }

    public function registerToOrg(Request $request)
    {
        //dd($request);
        $this->validate($request, [
            'username' => 'required|max:255|unique:users,username',
            'email' => 'required|email|max:255|unique:users,email',
            'password' => 'required|min:6|confirmed',
        ]);

        //create the user
        $user = User::create([
            'username' => $request->username,
            'email' => $request->email,
            'password' => password_hash($request->password, PASSWORD_BCRYPT),
            'organization_id' => $request->org_id,
        ]);

        //add user to the organization
        DB::table('members')->insert([
            'user_id' => $user->id,
            'organization_id' => $request->org_id,
            'created_at' => Carbon::now()
        ]);
        $credentials = $request->only('email', 'password');
        if(Auth::attempt($credentials)){
            return redirect()->intended('/profile');
        }
        return redirect('/');
    }
}
