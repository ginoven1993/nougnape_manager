<?php

namespace App\Http\Controllers\Systemes;

use App\Http\Controllers\Controller;
use App\Models\Systems\Sys_module;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class Sys_moduleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sysmodule=Sys_module::all();
        return $sysmodule;
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
        $message=[
            'moduleName.required'=>'Entrer le nom du module',
            'moduleCode.required'=>'Entrer le code du module',
            'moduleStatus.required'=>'Entrer le Statut du module',
            'created_at.required'=>'créer par',
        ];
          $validator = Validator::make($request->all(),$message,[
              'moduleName'=>'required',
              'moduleCode'=>'required',
              'moduleStatus'=>'required',
              'created_at'=>'required',
          ]);

          if($validator->failed()){
              return response()->json($validator->errors(),442);
          }
          $sysmodule=new Sys_module;
          $sysmodule->moduleName=$request['moduleName'];
          $sysmodule->moduleCode=$request['moduleCode'];
          $sysmodule->moduleStatus=$request['moduleStatus'];
          $sysmodule->moduleStatus=$request['created_at'];
          $sysmodule->save();
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
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
         $sysmodule=Sys_module::findOrFail($id);
         return $sysmodule;
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
        $message=[
            'moduleName.required'=>'Entrer le nom du module',
            'moduleCode.required'=>'Entrer le code du module',
            'moduleStatus.required'=>'Entrer le Statut du module',
            'created_at.required'=>'créer par',
        ];
          $validator = Validator::make($request->all(),$message,[
              'moduleName'=>'required',
              'moduleCode'=>'required',
              'moduleStatus'=>'required',
              'created_at'=>'required',
          ]);

          if($validator->failed()){
              return response()->json($validator->errors(),442);
          }
          $sysmodule=Sys_module::finfOrFail($request->idSysModule);
         $sysmodule->moduleName=$request->moduleName;
         $sysmodule->moduleCode=$request->moduleCode;
         $sysmodule->moduleStatus=$request->moduleStatus;
         $sysmodule->created_at=$request->created_at;

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Sys_module::find($id)->delete();
    }
}
