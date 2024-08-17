<?php

namespace App\Http\Controllers;

use App\Models\Team;
use App\Models\User;
use App\Models\Member;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class CompetitionController extends Controller
{
    public function registration(){
        $data = [
            'title' => 'Competition',
            'subTitle' => 'Registration',
            'page_id' => null
        ];
        return view('pages.competition.registration',  $data);
    }

    public function registrationSubmit(Request $request){
        $validator = Validator::make($request->all(), [
            'avatar' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'team' => 'required|string',
            'name' => 'required|string',
            'phone' => 'required|string',
            'university' => 'required|string',
            'major' => 'required|string',
        ]);

        if ($validator->fails()) {
            return redirect()->route('competition.registration')
                                ->with('error', 'Validation Error')
                                ->withInput()
                                ->withErrors($validator);
        }

        $team = New Team();
        $team->name = $request->input('team');
        $team->user_id = Auth::user()->id;
        if ($request->hasFile('avatar')) {
            // Upload dan simpan logo baru
            $avatarPath = $request->file('avatar')->store('teams', 'public');
            $team->logo = $avatarPath;
        }
        $team->save();

        $member = new Member();
        $member->team_id = $team->id;
        $member->name =$request->input('name');
        $member->university =$request->input('university');
        $member->major =$request->input('major');
        $member->type = 'leader';
        $member->save();

        $user = User::findOrFail(Auth::user()->id);
        $user->phone_number = $request->input('phone');
        $user->save();

        return redirect()->route('dashboard')->with('success', 'Your team has been registered successfully');
    }
}
