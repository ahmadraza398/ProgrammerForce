<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;
// all crude index update store show delete Contact detail
class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() //All Contact
    {
        $Contact= Contact::all();
        return response()->json([$Contact,'status'=>true, 'message'=>"All Contact Successfully"]);
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
    public function store(Request $request) //Contact has store
    {
        $request->validate([
            'fullname'=>'required',
            'email'=>'required',
            'subject'=>'required',
            'message'=>'required',
        ]);
        $Contact= Contact::create($request->all());
        return response()->json([$Contact,'status'=>true, 'message'=>"Contact has store Successfully"]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) //Contact has show
    {
        $Contact=Contact::find($id);
        return response()->json([$Contact,'status'=>true, 'message'=>"Contact has show Successfully"]);
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
    public function update(Request $request, $id)//Contact Update
    {

        $Contact=Contact::findOrFail($id);
        $Contact->update($request->all());
        return response()->json([$Contact,'status'=>true, 'message'=>"Contact Update Successfully"]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) //Contact Deleted 
    {
        $Contact= Contact::find($id)->delete();
        return response()->json([$Contact,'status'=>true, 'message'=>"Contact Deleted Successfully"]);
    }
}
