<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Cart;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      if (Auth::guest())
      {
        return back()->with('error', 'Please log in to make a purchase. You can use the Special Guest account with the information provided at the Home Page');
      } else {
        return view('cart.index');
      }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
// Check if the user has logged in.
        if (!Auth::user())
        {
          return back()->with('error', 'Please login in order to make purchases.');
        }
// For the purposes of this demo we just want a set quantity of one per title. So we check if the item has been already added to the cart
        $duplicates = Cart::search(function ($cartItem, $rowId) use ($request)
            {
                return $cartItem->id === $request->id;
            });
            if ($duplicates->isNotEmpty()) {
              return redirect('cart')->with('error', 'This item is already in your cart.');
            }

        Cart::add($request->id, $request->title, 1, $request->price)->associate('App\Book');

        return back()->with('success', 'The title has been added to your cart!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      Cart::remove($id);
      return redirect('/cart')->with('success', 'The title has been removed from your cart.');
    }

}
