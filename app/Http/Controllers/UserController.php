<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{

    public function users()
    {
      return response()->json([
          'status'  => true,
          'data'    => User::with('bank')->get()
      ]);
    }


    public function createUser(Request $request)
    {
        $this->validate($request, [
           'name'   => 'required',
           'phone'  => 'required|numeric',
           'gender'    => 'required|in:male,female',
        ]);


        $user = new User;
        $user->fullname = $request->name;
        $user->gender = $request->gender;
        $user->phone = $request->phone;
        $user->address = $request->address;
        $user->landmark = $request->landmark;
        $user->balance = str_replace(",","",$request->balance);
        $user->state = $request->state;

        $user->save();

        return response()->json([
            'status'    => true,
            'data'  => $user
        ]);
    }

    public function getSingleUser($id) {
        $user = User::with('bank')->find($id);
        if(!$user) return response()->json([
            'status'    => false,
            'message'   => 'User could not be found'
        ], 404);

        return response()->json([
            'status'    => true,
            'data'  => $user
        ]);
    }

}
