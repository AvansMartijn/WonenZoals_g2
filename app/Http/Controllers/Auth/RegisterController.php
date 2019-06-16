<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\User;
use App\authorizationLookup;
use Illuminate\Auth\Events\Registered;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
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
    protected $redirectTo = '/dashboard/gebruikers';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');

        //fixed register login
        $this->middleware(
            function ($request, $next) {
                $role = Auth::user()->role_id;

                if ($role !== 1) {
                    return redirect('/dashboard');
                }

                return $next($request);
            }
        );
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make(
            $data,
            [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:6', 'confirmed'],
            'role' => ['required'],
            ]
        );
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        return User::create(
            [
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'role_id' => $data['role'],
            ]
        );
    }

    /**
     * Handle a registration request for the application.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function register(Request $request)
    {
        $this->validator($request->all())->validate();

        event(new Registered($user = $this->create($request->all())));



        //beheerder
        if($user->role_id == 1)
        {
            $auth = AuthorizationLookup::where('id', 1)->first();
            $user->authorizations()->save($auth);

            $auth = AuthorizationLookup::where('id', 2)->first();
            $user->authorizations()->save($auth);

            $auth = AuthorizationLookup::where('id', 3)->first();
            $user->authorizations()->save($auth);

            $auth = AuthorizationLookup::where('id', 4)->first();
            $user->authorizations()->save($auth);

            $auth = AuthorizationLookup::where('id', 5)->first();
            $user->authorizations()->save($auth);

            $auth = AuthorizationLookup::where('id', 6)->first();
            $user->authorizations()->save($auth);
        }
        //vrijwilliger
        if($user->role_id == 2)
        {
            $auth = AuthorizationLookup::where('id', 1)->first();
            $user->authorizations()->save($auth);

            $auth = AuthorizationLookup::where('id', 2)->first();
            $user->authorizations()->save($auth);

            $auth = AuthorizationLookup::where('id', 3)->first();
            $user->authorizations()->save($auth);

            $auth = AuthorizationLookup::where('id', 4)->first();
            $user->authorizations()->save($auth);

            $auth = AuthorizationLookup::where('id', 5)->first();
            $user->authorizations()->save($auth);
            
        }
        //ouder
        if($user->role_id == 3)
        {
            $auth = AuthorizationLookup::where('id', 2)->first();
            $user->authorizations()->save($auth);

            $auth = AuthorizationLookup::where('id', 4)->first();
            $user->authorizations()->save($auth);


        }
        //bewoner
        if($user->role_id == 4)
        {
            $auth = AuthorizationLookup::where('id', 1)->first();
            $user->authorizations()->save($auth);

        }
        //coach
        if($user->role_id == 5)
        {
            $auth = AuthorizationLookup::where('id', 1)->first();
            $user->authorizations()->save($auth);

            $auth = AuthorizationLookup::where('id', 2)->first();
            $user->authorizations()->save($auth);

            $auth = AuthorizationLookup::where('id', 3)->first();
            $user->authorizations()->save($auth);

            $auth = AuthorizationLookup::where('id', 4)->first();
            $user->authorizations()->save($auth);

            $auth = AuthorizationLookup::where('id', 5)->first();
            $user->authorizations()->save($auth);

        }
        

        



        return $this->registered($request, $user)
        ?: redirect($this->redirectPath())->with('success', 'Gebruiker is aangemaakt');
    }

}
