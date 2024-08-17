<?php

namespace App\Http\Controllers;

use App\Models\Team;
use Illuminate\Http\Request;

class TeamController extends Controller
{
    public function index(Request $request){
        $search = $request->input('q');
        $data = Team::where(function ($query) use ($search) {
            $query->where('name', 'LIKE', '%' . $search . '%');
        })
        ->paginate(10);        
        $data->appends(['q' => $search]);
        $data = [
            'title' => 'Team',
            'subTitle' => null,
            'page_id' => null,
            'team' => $data
        ];
        return view('pages.team',  $data);
    }
}
