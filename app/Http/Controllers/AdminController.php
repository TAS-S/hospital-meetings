<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function addview()
    {
        return view('admin.add_doctor');
    }

    public function upload(Request $request)
    {
        $doctor = new Doctor;
        if ($request->hasFile('file'))
            {   $image = $request->file;
                $imageName = time() . '.' . $image->getClientOriginalExtension();
                $request->file->move(public_path('doctor_image'),$imageName);
                $doctor->image = $imageName;
            };

        $doctor->name = $request->input('name');
        $doctor->email = $request->input('email');
        $doctor->phone = $request->input('phone');
        $doctor->room = $request->input('room');
        $doctor->speciality = $request->input('speciality');

        $doctor->save();

        return redirect()->back()->with('message', 'Doctor added successfully');

    }
}
