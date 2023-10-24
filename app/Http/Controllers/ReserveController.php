<?php

namespace App\Http\Controllers;

use App\Mail\Reservation;
use App\Models\Reserve;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ReserveController extends Controller
{
    public function index()
    {
        $page_title = "All Reservations";
        $reservations = Reserve::all();

        return view('reserve.index', compact('page_title', 'reservations'));
    }

    public function confirmation($type, Reserve $reserve)
    {
        if ($type === 'accept') {
            $data = [
                'title' => 'hotfood.com',
                'message' => 'Hi, '. $reserve->name .' Your reservation has confirmed!'
            ];

            $reserve->status = 1;
            $reserve->update();

            Mail::to($reserve->email)->send(new Reservation($data));
            return back()->with('toast_success', "Reservation confirmed!");
        }

        $data = [
            'title' => 'hotfood.com',
            'message' => 'Hi, '. $reserve->name .' Your reservation has cancelled!'
        ];
        $reserve->status = 2;
        $reserve->update();
        Mail::to($reserve->email)->send(new Reservation($data));
        return back()->with('toast_success', "Reservation cancelled!");
    }

    public function delete(Reserve $reserve)
    {
        $reserve->delete();

        return back()->with('toast_success', "Item Deleted Successfully!");
    }
}
