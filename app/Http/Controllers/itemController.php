<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\item;
use App\itemdeteils;
use App\items;

use Illuminate\Support\Facades\DB;

class itemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index()
    {
//        $item= item::all();
//        $itemdeteils= DB::select("SELECT * FROM `itemdeteils` ");


        $item = DB::table('items')
            ->join('itemdeteils', 'items.id', '=', 'itemdeteils.item_id')
            ->select('items.*', 'itemdeteils.*')
            ->get();

        return view('item.index' , ['item'=>$item]);




    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('item.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
//         dd($request);
         $file=$request->file('img');
        $distnationpath='uploads';
        $file->move($distnationpath,$file->getClientOriginalName());

        $id = DB::table('items')->insertGetId([

            'favorite'=> 1,
            'img'=>$file->getClientOriginalName(),
//            'project_id'=>session('project')

        ]);
    
        $count = count($request->input('title'));

        //        echo $request->input('title')[1];die;
        for ($i = 0; $i < $count; $i++) {
            $itemdeteils = new itemdeteils();

            $itemdeteils->title = $request->input('title')[$i];
            $itemdeteils->item_id = $id;
    //            $itemdeteils->project_id = session('project');
            $itemdeteils->description = $request->input('description')[$i];
            $itemdeteils->price = $request->input('price');
            $itemdeteils->language = $i;

            $itemdeteils->save();
            return redirect()->route('item.index');

        }




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
