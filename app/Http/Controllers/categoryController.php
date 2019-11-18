<?php

namespace App\Http\Controllers;

use App\categorydeteils;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\category;
use Alert;
class categoryController extends Controller
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
        $category = category::all();
        $categorydeteils=DB::select("SELECT * FROM `categorydeteils` WHERE `language`='0'");

        return view('category.index',['category'=>$category,'categorydeteils'=>$categorydeteils]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $id = DB::table('categories')->insertGetId([
            'parent' => 0,
        ]);

        $count = count($request->input('title'));


        for($i=0;$i<$count;$i++) {
            $categorydeteils = new categorydeteils();
            $categorydeteils->title = $request->input('title')[$i];
            $categorydeteils->descraption = $request->input('descraption')[$i];
            $categorydeteils->category_id= $id;
            $categorydeteils->language = $i;
            $categorydeteils->save();


//dd($categorydeteils);

        }

        return back()->with(['status' => 'Add success']);

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
