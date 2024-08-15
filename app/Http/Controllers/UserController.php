<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function index(Request $request){
        $search = $request->input('q');
        $data = User::where(function ($query) use ($search) {
            $query->where('name', 'LIKE', '%' . $search . '%');
        })
        ->paginate(10);        
        $data->appends(['q' => $search]);
        $data = [
            'title' => 'User',
            'subTitle' => null,
            'page_id' => null,
            'user' => $data
        ];
        return view('pages.user',  $data);
    }

    public function store(Request $request){
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'role' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required',
        ]);
        if ($validator->fails()) {
            return redirect()->route('user')->with('error', 'Validation Error')->withInput()->withErrors($validator);
        }

        $user = New User();
        $user->name = $request->input('name');
        $user->role = $request->input('role');
        $user->email = $request->input('email');
        $user->password = Hash::make($request->input('password'));
        $user->save();
        return redirect()->route('user')->with('success','User has been created successfully');
    }

    public function update($id, Request $request){
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'role' => 'required',
            'email' => 'required|email|unique:users,email,'.$id,
        ]);
        if ($validator->fails()) {
            dd($validator->errors());
            return redirect()->route('user')->with('error', 'Validation Error')->withInput()->withErrors($validator);
        }

        $user = User::findOrFail($id);
        $user->name = $request->input('name');
        $user->role = $request->input('role');
        $user->email = $request->input('email');
        if($request->input('password')){
            $user->password = Hash::make($request->input('password'));
        }
        $user->save();
        return redirect()->route('user')->with('success','User has been updated successfully');
    }

    public function destroy($id){
        $user = User::findOrFail($id);
        $user->delete();
        return redirect()->route('user')->with('success','User has been deleted successfully');
    }
}
