<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use JD\Cloudder\Facades\Cloudder;
use App\User;
use App\Area;
use App\Food;
use App\Booking;
use App\History;
use Auth;

class UserController extends Controller
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
    public function store(Request $request)
    {
        //
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
        $user = User::find($id);

        if(Auth::id() !== $user->id){
            return abort(404);
        }

        $areas = Area::all();
        // areasに何が入っているといいか。→DBに入っているエリア全て。
        return view('users.edit', compact('user','areas'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserRequest $request, $id)
    {
        //userを更新している。
        // dd($request);
        $user = User::find($id);

        if(Auth::id() !== $user->id){
            return abort(404);
        }

        $user -> name = $request -> name;
        $user -> email = $request -> email;

        $user -> save();
        //user更新終了

        return redirect()->route('users.edit',$user->id)->with('message', 'ユーザー情報を更新しました');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function history($id)
    {
        $user = User::find($id);
        $companyFoods = Food::with('bookings.user')->where('user_id', Auth::id())->latest()->get();
            if(Auth::user()->authority_id === \App\User::AUTHORITY_COMPANY){
                return view('users.history-company', compact('user', 'companyFoods'));
            } else{
                return view('users.history', compact('user'));
            }
    }

    public function historyReservation($id)
    {
        $user = User::find($id);
        $reservationHistories = Booking::with('user','food')->where('user_id', Auth::id())->where('is_sold', 0)->latest()->get();
        return view('users.historyReservation', compact('user', 'reservationHistories'));
    }

    public function historyPurchase($id)
    {
        $user = User::find($id);
        $purchaseHistories = Booking::with('user','food')->where('user_id', Auth::id())->where('is_sold', 1)->latest()->get();
        return view('users.historyPurchase', compact('user', 'purchaseHistories'));
    }
}
