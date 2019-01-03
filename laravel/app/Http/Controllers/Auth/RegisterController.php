<?php

namespace App\Http\Controllers\Auth;

use App\Events\newUser;
use App\User;
use App\OrgCalendar;
use App\Organization;
use Carbon\Carbon;
use App\Events\OrganizationRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

use App\Http\Controllers\OrganizationController as OrganizationController;

class RegisterController extends Controller
{
    private $data;
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');

    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'avatar' => 'required|image|mimes:jpeg,jpg,png,gif|max:1024',
            'username' => 'required|max:255|unique:users,username',
            'email' => 'required|email|max:255|unique:users,email',
            'org_rsi_site' => 'required|url|unique:organizations,org_rsi_site',
            'q' => 'required|max:255', //org_name
            'password' => 'required|min:6|confirmed',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
        $exists = Organization::where('org_name', $data['q'])->get();
//dd($exists[0]->id);
        if(!$data['avatar']) {
            $avatarName = 'avatar' . time() . '.' . $data['org_logo']->getClientOriginalExtension();
        }else {
            $avatarName = 'avatar' . time() . '.' . $data['avatar']->getClientOriginalExtension();
        }

        //create the user
        $user = User::create([
            'avatar' => $avatarName,
            'username' => $data['username'],
            'email' => $data['email'],
            'password' => password_hash($data['password'], PASSWORD_BCRYPT),
            'hash' => Hash::make($data['email']),
        ]);

        $data['avatar']->storeAs('org_logos', $avatarName);

        //create the Organization
        if(count($exists) == 0){
            $organization = Organization::create([
             'org_logo' => $avatarName,
                'org_name'=> $data['q'],
                'org_rsi_site' => $data['org_rsi_site'],
                'org_discord' => $data['org_discord'],
         ]);
            $data['avatar']->storeas('org_logos', $avatarName);
            $user->lead = 1;
        }else{
            $orgMembers = User::whereOrganizationId($exists[0]->id)->where('lead', 1)->get();

            foreach($orgMembers as $member) {
                //fire request event
                event(new OrganizationRequest($member, $exists[0]));

            }
            session()->put('info', 'Your request to join this organization has been sent, Watch your email for more info.');
            $request = DB::table('requests')->insert([
                    'user_id' => $user->id,
                    'organization_id' => $exists[0]->id,
                    'created_at' => Carbon::now(),
                ]);

            return $user;
        }

        if(isset($organization->id)){
            $user->organization_id = $organization->id;
        }else{
            $user->organization_id = $exists[0]->id;
        }
        $user->update();

        //create the ref code for use in the email.
        $organization = new OrganizationController;
        $organization->generateHash($user->organization_id);

        if(count($exists) == 0) {
            //Create the calendar
            $calendar = OrgCalendar::create([
                'cal_url' => '/' . Organization::findorfail($user->organization_id)->org_name . '/calendar',
                'organization_id' => $user->organization_id,
                'public' => 0,
            ]);
        }
//dd($user, Organization::findorfail($user->organization_id));
        $user = User::findOrFail($user->id);
        event(new newUser($user, $user->organization));
        return $user;
    }
}
