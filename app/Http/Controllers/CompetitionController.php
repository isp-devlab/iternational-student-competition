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

    public function member(){
        $data = [
            'title' => 'Competition',
            'subTitle' => 'Member',
            'page_id' => null,
            'member' => Member::where('team_id', Auth::user()->team->id)->get()
        ];
        return view('pages.competition.member',  $data);
    }

    public function memberStore(Request $request){
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'university' => 'required',
            'major' => 'required',
        ]);
        if ($validator->fails()) {
            return redirect()->route('competition.member')->with('error', 'Validation Error')->withInput()->withErrors($validator);
        }

        $user = New Member();
        $user->name = $request->input('name');
        $user->university = $request->input('university');
        $user->major = $request->input('major');
        $user->team_id = Auth::user()->team->id;
        $user->type = 'member';
        $user->save();
        return redirect()->route('competition.member')->with('success','Member has been created successfully'); 
    }

    public function memberUpdate(Request $request, $id){
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'university' => 'required',
            'major' => 'required',
        ]);
        if ($validator->fails()) {
            return redirect()->route('competition.member')->with('error', 'Validation Error')->withInput()->withErrors($validator);
        }

        $user = Member::findOrFail($id);
        $user->name = $request->input('name');
        $user->university = $request->input('university');
        $user->major = $request->input('major');
        $user->save();
        return redirect()->route('competition.member')->with('success','Member has been updated successfully'); 
    }

    public function memberDestroy($id){
        $user = Member::findOrFail($id);
        $user->delete();
        return redirect()->route('competition.member')->with('success','Member has been deleted successfully'); 
    }

    public function submission(){
        $data = [
            'title' => 'Competition',
            'subTitle' => 'Submission',
            'page_id' => null
        ];
        return view('pages.competition.submission',  $data);
    }

    public function qualification(){
        $data = [
            'title' => 'Competition',
            'subTitle' => 'Qualification',
            'page_id' => null
        ];
        return view('pages.competition.submission',  $data);
    }

    public function final(){
        $data = [
            'title' => 'Competition',
            'subTitle' => 'Final',
            'page_id' => null
        ];
        return view('pages.competition.final',  $data);
    }
}
