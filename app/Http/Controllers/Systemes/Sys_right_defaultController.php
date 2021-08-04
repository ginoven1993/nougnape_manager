<?php

namespace App\Http\Controllers\Systemes;

use App\Http\Controllers\Controller;
use App\Models\Systems\Sys_module;
use App\Models\Systems\Sys_right_default;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class Sys_right_defaultController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sysright=Sys_right_default::all();
        return $sysright;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $sysmo=Sys_module::all();
        return $sysmo;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $message= [
            'sysModule.required'=>'quel est le module',
            'create.required'=>'creation des droits',
            'read.required'=>'Lire les droits',
            'update.required'=>'mise a jour des droits',
            'delete.required'=>'suppression des droits',
        ];
        $validator = Validator::make($request->all(),$message,[
            'sysModule'=>'required',
            'create'=>'required',
            'read'=>'required',
            'update'=>'required',
            'delete'=>'required',
        ]);

        if($validator->failed()){
            return response()->json($validator->errors(),442);
        }
        $sysright=new Sys_right_default;
        $sysright->sysModule=$request['sysModule'];
        $sysright->create=$request['create'];
        $sysright->read=$request['read'];
        $sysright->update=$request['update'];
        $sysright->delete=$request['delete'];
        $sysright->save();
        return response()->json(['message'=>'Succès'],202);

  }

    

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $sysright=Sys_right_default::orederBy('created_at','desc')->get();
        return $sysright;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $sysright=Sys_right_default::findOrFall($id);
        return $sysright;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $message= [
            'sysModule.required'=>'quel est le module',
            'create.required'=>'creation des droits',
            'read.required'=>'Lire les droits',
            'update.required'=>'mise a jour des droits',
            'delete.required'=>'suppression des droits',
        ];
        $validator = Validator::make($request->all(),$message,[
            'sysModule'=>'required',
            'create'=>'required',
            'read'=>'required',
            'update'=>'required',
            'delete'=>'required',
        ]);

        if($validator->failed()){
            return response()->json($validator->errors(),442);
        }
        $sysright = Sys_right_default::findOrFail($request->idRightDefault);
        $sysright->sysModule=$request->sysModule;
        $sysright->create=$request->create;
        $sysright->read=$request->read;
        $sysright->update=$request->update;
        $sysright->delete=$request->delete;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Sys_right_default::find($id)->delete();
    }
}
