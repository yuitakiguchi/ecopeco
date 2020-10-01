<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CompanyRequest;
use App\Company;
use App\User;
use App\Area;
use Auth;

class CompanyController extends Controller
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
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CompanyRequest $request, $id)
    {
        //userを更新している。
        $user = User::find($id);
        $user -> name = $request -> name;
        $user -> email = $request -> email;
        $user -> address = $request -> address;
        $user -> hp_url = $request -> hp_url;
        $user -> introduction = $request -> introduction;
        $user -> phone_number = $request -> phone_number;


        if ($image = $request->file('image-name')) {
            $image_path = $image->getRealPath();
            Cloudder::upload($image_path, null);
            $publicId = Cloudder::getPublicId();
            $logoUrl = Cloudder::secureShow($publicId, [
                'width'     => 200,
                'height'    => 200
            ]);
            $user->image_name = $logoUrl;
            $user->public_id  = $publicId;
        }


        $user -> save();
        //user更新終了
        $user -> load('areas');

        $areas = $user->areas()->get();
        
        foreach($areas as $area){
            $area->users()->detach(Auth::id());
            
        }
        
        foreach($request->areas as $areaName){
            $area = Area::where('name', $areaName)->first();
            // すでにあるエリアかどうか。

            if($areaName === null){
                continue;
            }
            
            if($area){
                $area->users()->attach(Auth::id());
                continue;
            }
            // あったらスキップ。

            // Areaを作ってる
            $area = new Area;
            $area -> name = $areaName;
            $area -> save();
            // Area作成。

            //Area と userを紐付ける。→ attach() 多対多 中間テーブルに保存できる。
            $area->users()->attach(Auth::id());
            // $user->areas()->attach($area->id);
            // users() method → どこに定義されているか。 
    }
    return redirect()->route('users.edit',$user->id)->with('message', 'ユーザー情報を更新しました。');
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
}
