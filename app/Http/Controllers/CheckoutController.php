<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Cart;
use PDF;


class CheckoutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('checkout.index');
    }


    public function store(Request $request)
    {
        return view('checkout.confirmation')->with('request', $request);
    }

// This is our custom function for creating a pdf copy of our order, using DOMPDF. Not yet implemented.
    public function pdf()
    {
        // $data = [
        //   'title' => '',
        // ];
        // $pdf = PDF::loadview('checkout.print', $data);
        // return $pdf->download('order_info.pdf');
    }

}
