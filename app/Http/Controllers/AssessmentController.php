<?php

namespace App\Http\Controllers;

use App\Models\Assessment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AssessmentController extends Controller
{
    public function qualification(Request $request){
        $search = $request->input('q');
        $data = Assessment::where(function ($query) use ($search) {
            $query->where('content', 'LIKE', '%' . $search . '%');
        })
        ->where('type','qualification')
        ->paginate(10);        
        $data->appends(['q' => $search]);
        $data = [
            'title' => 'Assessment',
            'subTitle' => 'Qualification',
            'page_id' => null,
            'qualification' => $data
        ];
        return view('pages.assessment.qualification',  $data);
    }

    public function qualificationStore(Request $request){
        $validator = Validator::make($request->all(), [
            'content' => 'required',
        ]);
        if ($validator->fails()) {
            return redirect()->route('assessment.qualification')->with('error', 'Validation Error')->withInput()->withErrors($validator);
        }

        $user = New Assessment();
        $user->content = $request->input('content');
        $user->type = 'qualification';
        $user->save();
        return redirect()->route('assessment.qualification')->with('success','Assessment has been created successfully');
    }

    public function final(Request $request){
        $search = $request->input('q');
        $data = Assessment::where(function ($query) use ($search) {
            $query->where('content', 'LIKE', '%' . $search . '%');
        })
        ->where('type','final')
        ->paginate(10);        
        $data->appends(['q' => $search]);
        $data = [
            'title' => 'Assessment',
            'subTitle' => 'Final',
            'page_id' => null,
            'final' => $data
        ];
        return view('pages.assessment.final',  $data);
    }

    public function finalStore(Request $request){
        $validator = Validator::make($request->all(), [
            'content' => 'required',
        ]);
        if ($validator->fails()) {
            return redirect()->route('assessment.final')->with('error', 'Validation Error')->withInput()->withErrors($validator);
        }

        $user = New Assessment();
        $user->content = $request->input('content');
        $user->type = 'final';
        $user->save();
        return redirect()->route('assessment.final')->with('success','Assessment has been created successfully');
    }

    public function update(Request $request, $id){
        $validator = Validator::make($request->all(), [
            'content' => 'required',
        ]);
        if ($validator->fails()) {
            return redirect()->back()->with('error', 'Validation Error')->withInput()->withErrors($validator);
        }

        $user = Assessment::findOrFail($id);
        $user->content = $request->input('content');
        $user->save();
        return redirect()->back()->with('success','Assessment has been updated successfully');
    }

    public function destroy($id){
        $user = Assessment::findOrFail($id);
        $user->delete();
        return redirect()->back()->with('success','Assessment has been deleted successfully');
    }
}
