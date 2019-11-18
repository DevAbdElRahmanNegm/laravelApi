<?php

namespace App\Http\Controllers\api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\item;
use App\itemdeteils;
use App\items;
use App\Http\Resources\itemResource;
use Illuminate\Support\Facades\DB;



class itemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $itemdeteils=itemdeteils::all();
        return new itemResource($itemdeteils);
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




        $id = DB::table('items')->insertGetId([

            'favorite'=> 1,
                'img'=> 'coffeine_loading'
        ]);



        //        echo $request->input('title')[1];die;

            $itemdeteils = new itemdeteils();

            $itemdeteils->title = $request->title;
            $itemdeteils->item_id = $id;
            $itemdeteils->description = $request->description;
            $itemdeteils->price = $request->price;
            $itemdeteils->language = $request->language;

            $itemdeteils->save();


        return new itemResource($itemdeteils);
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
        //
    }
}
