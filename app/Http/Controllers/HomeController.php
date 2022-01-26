<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\User;
use App\Models\Doctor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function redirect()
    {
        if(Auth::id())
        {
            if(Auth::user()->usertype == '0')
            {
                $doctor = Doctor::all();

                return view('user.home', compact('doctor'));
            }
            else
            {
                return view('admin.home');
            }
        }
            else
        {
           return redirect()->back();
        }
    }

    public function index()
    {
        if(Auth::id())
        {
            return redirect('home');
        } else
        {
            $doctor = Doctor::all();

            return view('user.home', compact('doctor'));
        }
    }

    public function appointment(Request $request)
    {
        $data = new Appointment;

        $data->name = $request->name;
        $data->email = $request->email;
        $data->phone = $request->phone;
        $data->date = $request->date;
        $data->doctor = $request->doctor;
        $data->message = $request->message;
        $data->status = "In progress";

            if(Auth::id())
            {
                $data->user_id = Auth::user()->id;
            }

        $data->save();

        return redirect()->back()->with('message', 'Appointment request successfully. We will contact with you soon');
    }

    public function myappointment()
    {
        if(Auth::id())
        {
            $userid = Auth::user()->id;

            $appointment = Appointment::where('user_id',$userid)->get();
            return view('user.my_appointment',compact('appointment'));
        }
        else
        {
            return redirect()->back();
        }
    }

    public function cancel_appointment($id)
    {
        $data=Appointment::find($id);
        $data->delete();

        return redirect()->back();
    }
}
