<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;
use Illuminate\Support\Facades\Hash;

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
           'phoneNumber' => $data['phone'],
           'avatarUrl' =>  $photoPath,
           'surname' => $data['surname'],
           'name' => $data['firstName'],
           'patronymic' => $data['patronymic'],
           'wishes' => $data['wishes'],
            'preferable_services_id' => $data['services'] ?? null,
           'interior_style_id' => $data['interior_style'] ?? null,
           'service_type_id' => $data['service'] ?? null,
       ]);

       return $user;
   }




}
