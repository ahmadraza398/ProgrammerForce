<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
// all crude index update store show delete ORDER
class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() //All Order
    {
        $Order= Order::all();
        return response()->json([$Order,'status'=>true, 'message'=>"All Order Successfully"]);
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
    public function store(Request $request) //Order has store
    {
        $request->validate([
          'pid'=>'required',
          'uid'=>'required',
        ]);
        $Order= Order::create($request->all());
        return response()->json([$Order,'status'=>true, 'message'=>"Order has store Successfully"]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)//Order has show
    {
        $Order=Order::find($id);
        return response()->json([$Order,'status'=>true, 'message'=>"Order has show Successfully"]);
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
    public function update(Request $request, $id) //Order Update
    {
        $request->validate([
            'pid'=>'required',
            'uid'=>'required',
        ]);

        $Order=Order::find($id);
        $Order->update($request->all());
        return response()->json([$Order,'status'=>true, 'message'=>"Order Update Successfully"]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) //Order Deleted
    {
        $Order= Order::find($id)->delete();
        return response()->json([$Order,'status'=>true, 'message'=>"Order Deleted Successfully"]);
    }
}
