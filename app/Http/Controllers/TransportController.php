<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Transport;

class TransportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function home(){
        return view('vueApp');
    }

    public function index()
    {
        return Transport::orderBy('id')->get();
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
        $this->validate($request, [
            'model' => 'required',
            'status' => 'required'
        ]);

        $create = Transport::create($request->all());
        return response()->json(['status' => 'success', 'msg' => 'transport created successfully']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Transport::find($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return Transport::find($id);
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
        $this->validate($request, [
            'model' => 'required',
            'status' => 'required'
        ]);

        $transport = Transport::find($id);
        if($transport->count()){
            $transport->update($request->all());
            return response()->json(['status' => 'success', 'msg' => 'transport edit successfully']);
        } else {
            return response()->json(['status' => 'success', 'msg' => 'error in updating transport']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $transport = Transport::find($id);
        if($transport->count()){
            $transport->delete();
            return response()->json(['status' => 'success', 'msg' => 'transport delete successfully']);
        } else {
            return response()->json(['status' => 'success', 'msg' => 'error in deleting transport']);
        }
    }
}
