<?php

namespace App\Http\Controllers\Auth;

use App\User;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Event;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use App\Http\Controllers\RssController as Rss;

class RegisterController extends Controller
{
    private $rss;
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
            'email' => 'required|email|max:255|unique:users,email',
            'org_name' => 'required|max:255',
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

        if(!$data['avatar']) {
            $avatarName = 'avatar' . time() . '.' . $data['org_logo']->getClientOriginalExtension();
        }else {
            $avatarName = 'avatar' . time() . '.' . $data['avatar']->getClientOriginalExtension();
        }


        $user = User::create([
            'avatar' => $avatarName,
            'email' => $data['email'],
            'org_name'=>$data['org_name'],
            'password' => password_hash($data['password'], PASSWORD_BCRYPT),
            'hash' => Hash::make($data['email']),
        ]);
        $data['avatar']->storeAs('avatars', $avatarName);

        Event::fire('NewRegistration', $user);
        return $user;

    }
}
