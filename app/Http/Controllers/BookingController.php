<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Food;
use App\User;
use App\Booking;
use Auth;

class BookingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
    public function store(Food $food)
    {
        $booking = new Booking;

        $booking->is_sold = 0;
        $booking->food_id = $food->id;
        $booking->user_id = Auth::id();
        $booking->save();

        return redirect()->route('foods.show', $food);
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
        $booking = Booking::find($id);
        if ($booking -> is_sold === 0){
            $booking -> is_sold = 1;
        } else {
            $booking -> is_sold = 0;
        }
        $booking -> save();

        return redirect()->route('foods.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Food $food)
    {

        $booking = Booking::where('user_id', Auth::id())->where('food_id', $food->id)->first();

        $booking -> delete();

        return redirect()->route('foods.show', $food);
    }
}
