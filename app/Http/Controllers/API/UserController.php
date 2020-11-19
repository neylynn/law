<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
{
    public function index() {
		  $users = User::all();
      return $users;
	}

	public function store(Request $request) {
		$this->validate($request, [
           	'name' => 'required',
           	'email' => 'required',
           	'password' => 'required',
       	]);

       	User::create($request->all());
       	return response()->json('The users successfully added');
	}

    public function edit($id) {
        $user = User::find($id);
        return response()->json($user);
    }

    public function update($id, Request $request) {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required'
        ]);
        $user = User::find($id)->update($request->all());
        return response()->json('The users successfully updated');
    }   

    // delete book
    public function delete($id) {
        $user = User::find($id);
        $user->delete();
        return response()->json('The user successfully deleted');
    }
}
