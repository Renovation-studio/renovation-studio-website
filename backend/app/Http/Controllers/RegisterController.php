<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;
use App\Models\PreferableService;
use Illuminate\Support\Facades\Hash;
use App\Mail\RegistrationVerificationMail;
use Mail;

use Illuminate\Auth\Events\Registered;

class RegisterController extends Controller
{
     public function checkEmail(Request $request)
        {
            $exists = User::where('email', $request->input('email'))->exists();
            return response()->json(['exists' => $exists]);
        }

   public function checkPhone(Request $request)
   {
       $phoneNumber = $request->input('phone');
       $exists = User::where('phoneNumber', $phoneNumber)->exists();
       return response()->json(['exists' => $exists]);
   }

   public function create(Request $request)
   {
        $data = $request->all();
        if ($request->hasFile('avatarUrl')) {
            $avatarFile = $request->file('avatarUrl');
            $avatarFileName = utf8_encode(uniqid() . '_' . $avatarFile->getClientOriginalName());
            $avatarFile->move(public_path('photos'), $avatarFileName);
            $photoPath = 'photos/' . $avatarFileName;
        } else {
            $photoPath = null;
        }
       $user = User::create([
           'email' => $data['email'],
           'password' => Hash::make($data['password']),
           'phoneNumber' => $data['phoneNumber'],
           'avatarUrl' =>  $photoPath,
           'surname' => $data['surname'],
           'name' => $data['name'],
           'interior_style_id' => $data['interior_style'] ?? null,
           'service_type_id' => $data['service'] ?? null,
       ]);

       $lastInsertedId = $user->id;
         /*if($service_array != null)
         {
              foreach(json_decode($data['services']) as $service)
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

        Mail::to($user->email)->send(new RegistrationVerificationMail($user));
        */
       return $user;
   }

   public function verify($id)
   {
    $user = User::where('id', '=', $id);
    if(!empty($user))
    {
        //$user->email_verified_at = date('Y-m-d H:i:s');
        $user->update(['email_verified_at' => date('Y-m-d H:i:s')]);
        return 1;
    }
    else{
        return 0;
    }
   }




}
