<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    //Get User List
    public function getUsers()
    {
      //Users
      $users = DB::table('users')->get();
      return view('auth.users', ['users' => $users]);
    }

    //User detail to edit
    public function editUser($id)
    {
      //Get user detail
      $user = DB::table('users')->where('id', $id)->first();
      $countries = DB::table('countries')->get();
      return view('auth.edit', ['user' => $user, 'countries' => $countries]);
    }

    //Delete user
    public function deleteUser($id)
    {
      //Get user detail
      $user = DB::table('users')->where('id', $id)->delete();
      return redirect()->route('users')->withSuccess('User deleted successfuly!');
    }

    public function updateUser(Request $request, $id)
    {
      //Update user detail
      $name = $request->input('name');
      $address1 = $request->input('address1');
      $address2 = $request->input('address2');
      $city = $request->input('city');
      $state = $request->input('state');
      $country = $request->input('country');
      $user = DB::table('users')->where('id', $id)->update(['name' => $name, 'address1' => $address1, 'address2' => $address2, 'city' => $city, 'state' => $state, 'country_id' => $country]);

      // $countries = DB::table('countries')->get();
      return redirect()->route('edit', ['uid' => $id])->withSuccess('User updated successfully');
    }
}
