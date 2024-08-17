<?php

namespace App\Http\Controllers;

use App\Models\Announcement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class AnnouncementController extends Controller
{
    public function index(Request $request){
        $search = $request->input('q');
        $data = Announcement::where(function ($query) use ($search) {
            $query->where('title', 'LIKE', '%' . $search . '%');
        })
        ->paginate(10);        
        $data->appends(['q' => $search]);
        $data = [
            'title' => 'Announcement',
            'subTitle' => null,
            'page_id' => null,
            'announcement' => $data
        ];
        return view('pages.announcement',  $data);
    }

    public function store(Request $request){
        $validator = Validator::make($request->all(), [
            'title' => 'required',
            'content' => 'required',
        ]);
        if ($validator->fails()) {
            return redirect()->route('announcement')->with('error', 'Validation Error')->withInput()->withErrors($validator);
        }

        $announcement = New Announcement();
        $announcement->title = $request->input('title');
        $announcement->content = $request->input('content');
        $announcement->user_id = Auth::user()->id;
        $announcement->save();
        return redirect()->route('announcement')->with('success','Announcement has been created successfully');
    }

    public function update(Request $request, $id){
        $validator = Validator::make($request->all(), [
            'title' => 'required',
            'content' => 'required',
        ]);
        if ($validator->fails()) {
            return redirect()->route('announcement')->with('error', 'Validation Error')->withInput()->withErrors($validator);
        }

        $announcement = Announcement::findOrFail($id);
        $announcement->title = $request->input('title');
        $announcement->content = $request->input('content');
        $announcement->user_id = Auth::user()->id;
        $announcement->save();
        return redirect()->route('announcement')->with('success','Announcement has been updated successfully');
    }

    public function destroy($id){
        $announcement = Announcement::findOrFail($id);
        $announcement->delete();
        return redirect()->route('announcement')->with('success','Announcement has been deleted successfully');
    }
}
