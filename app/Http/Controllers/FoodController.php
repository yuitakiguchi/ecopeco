<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use JD\Cloudder\Facades\Cloudder;
use App\Http\Requests\FoodRequest;
use App\Food;
use App\Area;
use Auth;

class FoodController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $keyword = $request->input('keyword');
        $query = Area::query();
        //もしキーワードが入力されている場合
        if(!empty($keyword)){   
            $query ->where('name', 'like', "%{$keyword}%");
        }
        
        $area = $query->first();
        $foods = Food::latest()->get();
        $companyFoods = Food::with('bookings.user')->where('user_id', Auth::id())->latest()->get();
        return view('foods.index', compact('foods','companyFoods', 'area', 'keyword'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('foods.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(FoodRequest $request)
    {
        if ($request->price < $request->discount_price) {
            return back()->with('message','割引価格以上の値段を定価にご入力ください');
        }

        $food = new Food;

        $food->name = $request->name;
        $food->trading_time = $request->trading_time;
        $food->price = $request->price;
        $food->discount_price = $request->discount_price;
        $food->coupon = $request->coupon;
        $food->price_difference = $request->price - $request->discount_price;
        $food->user_id = Auth::id();

        

        if ($image = $request->file('image')) {
            $image_path = $image->getRealPath();
            Cloudder::upload($image_path, null);
            $publicId = Cloudder::getPublicId();
            $logoUrl = Cloudder::secureShow($publicId, [
                'width'     => 200,
                'height'    => 200
            ]);
            $food->image_name = $logoUrl;
            $food->public_id  = $publicId;
        }

        $food->save();
        
        return redirect()->route('foods.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $food = Food::with('bookings.user', 'user.areas')->find($id);
        $id = Auth::id();
        $booking = $food->bookings->where('user_id', Auth::id())->first();
        

        if (empty($booking)) {
            $isReserved = false;
        } else {
            $isReserved = true;
        }

        $companyFoods = Food::where('user_id', Auth::id())->latest()->get();
        return view('foods.show', compact('food','companyFoods','isReserved'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $food = Food::find($id);
        return view('foods.edit', compact('food'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(FoodRequest $request, $id)
    {
        
        $food = Food::find($id);

        
        $food -> name = $request -> name;
        $food -> trading_time = $request -> trading_time;
        $food -> price = $request -> price;
        $food -> discount_price = $request -> discount_price;
        $food -> coupon = $request -> coupon;
        
        $food -> save();
        
        
        
        return view('foods.show', compact('food'));

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $food = Food::find($id);
        $food -> delete();
        return redirect()->route('foods.index');
    }
}
