<?php

namespace App\Http\Controllers\Systemes;

use Illuminate\Http\Request;

use App\Models\Systems\Sys_log;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;


class Sys_logController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       
        $syslog= Sys_log::all();
        return $syslog;
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
            'logUser.required'=>'Entrer identifiant utilisateur',
            'logStatus.required'=>'Entrer le statut utilisateur',
            'logContent.required'=>'Entrer le contenu utilsateur',
        ];
          $validator = Validator::make($request->all(),$message,[
              'logUser'=>'nullable',
              'logStatus'=>'required',
              'logContent'=>'required'
          ]);

          if($validator->failed()){
              return response()->json($validator->errors(),442);
          }
          $syslog=new Sys_log;
          $syslog->moduleName=$request['logUser'];
          $syslog->moduleCode=$request['logStatus'];
          $syslog->moduleStatus=$request['logContent'];
          $syslog->save();
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
        $syslog=Sys_log::findOrFail($id);
         return $syslog;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request )
    {
       $message=[
            'logUser.required'=>'Entrer identifiant utilisateur',
            'logStatus.required'=>'Entrer le statut utilisateur',
            'logContent.required'=>'Entrer le contenu utilsateur',
        ];
          $validator = Validator::make($request->all(),$message,[
              'logUser'=>'nullable',
              'logStatus'=>'required',
              'logContent'=>'required'
          ]);

          if($validator->failed()){
              return response()->json($validator->errors(),442);
          }
          $syslog = Sys_log::findOrFail($request->idSysLog);
          $syslog -> logUser=$request->logUser;
          $syslog -> logStatus=$request->logStatus;
          $syslog -> logContent=$request->logContent;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Sys_log::find($id)->delete();
    }
}
