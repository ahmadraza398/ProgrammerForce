<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
// all crude index update store show delete CATAGORY
class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    //All Category
    public function index()
    {
        $category= Category::all();
        return response()->json([$category,'status'=>true, 'message'=>"All CategorySuccessfully"]);
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

    public function store(Request $request) //Category has store
    {
        $request->validate([
            'cname'=>'required',
            'description'=>'required',
        ]);
        $request['slug']=Str::slug($request['cname'],'-');
        $category= Category::create($request->all());
        return response()->json([$category,'status'=>true, 'message'=>"Category has store Successfully"]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) //Category has show
    {
        $category=Category::find($id);
        return response()->json([$category,'status'=>true, 'message'=>"Category has show Successfully"]);
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
    public function update(Request $request, $id)//Category Update
    {

        $category=Category::findOrFail($id);
        $category['slug']=Str::slug($request['cname'],'-');
        $category->update($request->all());
        return response()->json([$category,'status'=>true, 'message'=>"Category Update Successfully"]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) //Category Deleted
    {
        $category= Category::find($id)->delete();
        return response()->json([$category,'status'=>true, 'message'=>"Category Deleted Successfully"]);
    }
}
