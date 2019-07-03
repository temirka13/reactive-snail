<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Drivers;

class DriversController extends Controller
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
        return Drivers::where('user_id', Auth::id())->get();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
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
            'first_name' => 'required',
            'second_name' => 'required',
        ]);

        $driver = new Drivers([
            'first_name' => $request->get('first_name'),
            'second_name' => $request->get('second_name'),
            'transport' => $request->get('transport'),
            'user_id' => Auth::id(),
        ]);

        $driver->save();
        return response()->json(['status' => 'success', 'msg' => 'driver created successfully']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
        return Drivers::find($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return Drivers::find($id);
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
            'first_name' => 'required',
            'second_name' => 'required'
        ]);

        $driver = Drivers::find($id);
        if($driver->count()){
            $driver->update($request->all());
            return response()->json(['status' => 'success', 'msg' => 'driver edit successfully']);
        } else {
            return response()->json(['status' => 'success', 'msg' => 'error in updating driver']);
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
        $driver = Drivers::find($id);
        if($driver->count()){
            $driver->delete();
            return response()->json(['status' => 'success', 'msg' => 'driver delete successfully']);
        } else {
            return response()->json(['status' => 'success', 'msg' => 'error in deleting driver']);
        }
    }
}
