<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $allorder = \App\Order::all()->count();
        $verifiedorder = \App\Order::where('status', 'Verified')->count();
        $notverifiedorder = \App\Order::where('status', 'Not Verified')->count();

        $data = array(
            'allorder' => $allorder,
            'verifiedorder' => $verifiedorder,
            'notverifiedorder' => $notverifiedorder,
        );

        return view('home', $data);
    }
}
