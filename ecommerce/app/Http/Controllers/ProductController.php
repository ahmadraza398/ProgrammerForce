<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class ProductController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    // ALL PRODUCT DATA FETCH
    public function index()
    {
        $product= Product::all();
        return response()->json([$product,'status'=>true, 'message'=>"All Product Successfully"]);
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
    //STORE ALL THE PROJECT
    public function store(Request $request)
    {
        $request->validate([
            'ptitle'=>'required',
            'pdescription'=>'required',
            'pimage'=>'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'pprice'=>'required',
            'cid'=>'required',
        ]);
        $input = $request->all();

        if ($image = $request->file('image')) {
            $destinationPath = 'images/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['image'] = "$profileImage";
        }
        $product= Product::create($request->all());
        return response()->json([$product,'status'=>true, 'message'=>"Product has store Successfully"]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    //SHOW ALL THE PRODUCT
    public function show($id)
    {
        $product=Product::find($id);
        return response()->json([$product,'status'=>true, 'message'=>"Product has show Successfully"]);
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
    //UPDATE PRODUCT
    public function update(Request $request, $id) // Product Update
    {
        $request->validate([
            'ptitle'=>'required',
            'pdescription'=>'required',
            'pimage'=>'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'pprice'=>'required',
            'cid'=>'required',
        ]);
        $input = $request->all();

        if ($image = $request->file('image')) {
            $destinationPath = 'images/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['image'] = "$profileImage";
        }

        $product=Product::find($id);
        $product->update($request->all());
        return response()->json([$product,'status'=>true, 'message'=>"Product Update Successfully"]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // DELETE ALL PRODUCT
    public function destroy($id) //Product Deleted
    {
        $product= Product::find($id)->delete();
        return response()->json([$product,'status'=>true, 'message'=>"Product Deleted Successfully"]);
    }
}

