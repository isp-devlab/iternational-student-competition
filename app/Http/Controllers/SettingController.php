<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Validator;

class SettingController extends Controller
{
    public function index(Request $request){
        $data = [
            'title' => 'Setting',
            'subTitle' => null,
            'page_id' => null,
            'setting' => Setting::find(1)
        ];
        return view('pages.setting',  $data);
    }

    public function update(Request $request)
    {
        // Validasi input
        $validator = Validator::make($request->all(), [
            'avatar' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'competition_name' => 'required|string|max:255',
            'description' => 'required|string|max:1000',
            'registration_start' => 'required|date',
            'registration_end' => 'required|date|after_or_equal:registration_start',
            'submission_start' => 'required|date',
            'submission_end' => 'required|date|after_or_equal:submission_start',
            'qualification_start' => 'required|date',
            'qualification_end' => 'required|date|after_or_equal:qualification_start',
            'qualification_announcement' => 'required|date',
            'final_start' => 'required|date',
            'final_end' => 'required|date|after_or_equal:final_start',
            'final_announcement' => 'required|date',
            'submission_type' => 'required|in:text,file',
            'submission_note' => 'nullable|string|max:1000',
        ]);

        // Jika validasi gagal
        if ($validator->fails()) {
            // dd($validator);
            return redirect()->route('setting')
                                ->with('error', 'Validation Error')
                                ->withInput()
                                ->withErrors($validator);
        }

        // Temukan setting berdasarkan ID
        $setting = Setting::findOrFail(1);

        // Update data setting
        $setting->competition_name = $request->input('competition_name');
        $setting->description = $request->input('description');
        $setting->registration_start = $request->input('registration_start');
        $setting->registration_end = $request->input('registration_end');
        $setting->submission_start = $request->input('submission_start');
        $setting->submission_end = $request->input('submission_end');
        $setting->qualification_start = $request->input('qualification_start');
        $setting->qualification_end = $request->input('qualification_end');
        $setting->qualification_announcement = $request->input('qualification_announcement');
        $setting->final_start = $request->input('final_start');
        $setting->final_end = $request->input('final_end');
        $setting->final_announcement = $request->input('final_announcement');
        $setting->submission_type = $request->input('submission_type');
        $setting->submission_note = $request->input('submission_note');

        // Jika ada upload avatar, proses penyimpanannya
        if ($request->hasFile('avatar')) {
            // Upload dan simpan logo baru
            $avatarPath = $request->file('avatar')->store('logos', 'public');
            $setting->logo = $avatarPath;
        }

        // Simpan perubahan
        $setting->save();

        // Redirect dengan pesan sukses
        return redirect()->route('setting')->with('success', 'Settings have been updated successfully');
    }
}
