<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use App\Models\PreferableService;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

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
    protected $redirectTo = RouteServiceProvider::HOME;

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
            'email' => 'unique:users,email'
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create()
    {
        return view('auth.register');
    }
    public function store(Request $request)
    {
        $data = $request->all();
        //$validator = validator($data);
        $request->validate([
            'email' => 'unique:users,email',
            'phone' => 'unique:users,phoneNumber',
        ]);
        $service_array = isset($data['preferable_services']) ? json_encode($data['preferable_services']) : null;
        $user = User::create([
             'email' => $data['email'],
              'password' => Hash::make($data['password']),
            'phoneNumber' => $data['phone'],
            'avatarUrl' => $data['photo'],
            'surname' => $data['surname'],
            'name' => $data['firstName'],
            'patronymic' => $data['patronymic'],
            'service_type_id' => isset($data['service']) ? $data['service'] : null,
            'wishes' => $data['wishes'],
            'preferable_services_id' => $service_array,
            'interior_style_id' => isset($data['interior_style']) ? $data['interior_style'] : null
         ]);
         $lastInsertedId = $user->id;
         if($service_array != null)
         {
              foreach($data['preferable_services'] as $service)
              {
                 PreferableService::create([
                     'user_id' => $lastInsertedId,
                    'service_id' => $service
                ]);
              }
        }
        else
        {
             PreferableService::create([
                'user_id' => $lastInsertedId,
                'service_id' => null
            ]);
        }
        return $user;
    }
}
