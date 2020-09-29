<?php

namespace App\Http\Controllers;

use DB;
use Illuminate\Http\Request;
use App\Food;
use App\User;
use App\Booking;
use App\History;
use Carbon\Carbon;
use Auth;

class BookingController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Food $food)
    {
        DB::beginTransaction();
        try {
            $food -> coupon -= $request->count;
            $food -> save();
            
            $booking = new Booking;
            //0を定数に変える
            $booking->is_sold = 0;
            $booking->food_id = $food->id;
            $booking->user_id = Auth::id();
            $booking->count = $request->count;
            $booking->save();
            DB::commit();
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->route('foods.show', $food)->with('error', 'クーポンを使用することができません。');
        }

        return redirect()->route('foods.show', $food)->with('message', 'クーポンを' . $booking->count . '枚使用しました。');
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
        DB::beginTransaction();
        try {
            $booking = Booking::find($id);
            if ($booking -> is_sold === 0){
                $booking -> is_sold = 1;
                $message = '購入済みに変更しました。';
            } else {
                $booking -> is_sold = 0;
                $message = '予約中に変更しました。';
            }
            $booking -> save();
            
            $history = History::where('user_id', $booking->user_id)->first();
            if($history !== null){
                $history -> delete();
            }

            $history = new History;

            $dt = Carbon::now();
            $totalCount = Booking::where('user_id', $booking->user_id)->where('is_sold', 1)->count();
            $thisMonthCount = Booking::where('user_id', $booking->user_id)->where('is_sold', 1)->whereMonth('created_at', $dt->month)->count();
            $bookings = Booking::where('user_id', $booking->user_id)->where('is_sold', 1)->get();
            $thisMonthBookings = Booking::where('user_id', $booking->user_id)->where('is_sold', 1)->whereMonth('created_at', $dt->month)->get();
            $savingPrice = 0;
            $thisMonthSavingPrice = 0;

            foreach ($bookings as $booking) {
                $savingPrice += $booking->food->price_difference;
            }
            foreach ($thisMonthBookings as $thisMonthBooking) {
                $thisMonthSavingPrice += $thisMonthBooking->food->price_difference;
            }
            
            $history -> this_month_saving_price =  $thisMonthSavingPrice;
            $history -> saving_price = $savingPrice;
            $history -> count = $totalCount;
            $history -> this_month_count = $thisMonthCount;
            $history -> user_id = $booking->user_id;
            
            $history -> save();
            DB::commit();
        } catch (\Exception $e) {
            DB::rollback();
        }
        return redirect()->route('foods.index')->with('message', $message);
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Food $food)
    {
        DB::beginTransaction();
        try {
            $booking = Booking::where('user_id', Auth::id())->where('food_id', $food->id)->first();
            $food -> coupon += $booking->count ;
            $food -> save(); 
            $booking -> delete();

            DB::commit();
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->route('foods.show', $food)->with('error', '取り消せませんでした。');
        } 

        return redirect()->route('foods.show', $food)->with('message', 'クーポンの利用を取り消しました。');
    }
}
