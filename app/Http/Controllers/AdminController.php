<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
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

    public function show_appointment()
    {
        $data = Appointment::all();

        return view('admin.show_appointment', compact('data'));

    }

    public function approved($id)
    {
        $data = Appointment::find($id);

        $data->status = 'Approved';

        $data->save();

        return redirect()->back();

    }

    public function cancelled($id)
    {
        $data = Appointment::find($id);

        $data->status = 'Cancelled';

        $data->save();

        return redirect()->back();

    }

    public function show_doctor()
    {
        $data = Doctor::all();

        return view('admin.show_doctor', compact('data'));
    }

    public function delete_doctor($id)
    {
        $data = Doctor::find($id);

        $data->delete();

        return redirect()->back();

    }
}
