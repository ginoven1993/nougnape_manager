<?php

namespace App\Http\Controllers\Systemes;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Personals\Personal_board;
use App\Models\Systems\Sys_log;
use App\Models\Systems\Sys_module;
use App\Models\Systems\Sys_permission;
use Illuminate\Support\Facades\Validator;

class Sys_permissionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $syspermission= Sys_permission::all();
       return $syspermission;

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $permission=Personal_board::orderBy('created_at','desc')->get();
        $sysmod=Sys_module::all();
        $create=Personal_board::orderBy('created_at','desc')->get();
        return [$permission,$sysmod,$create];
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
            'permissionUser.required'=>'Verfier permission',
            'permissionModule.required'=>'Entrer permission Statut',
            'canCreate.required'=>'demande de creation',
            'canRead.required'=>'demande de lecture',
            'canUpdate.required'=>'demande de mise a jour',
            'canDelete.required'=>'demande de suppression',
            'created_by.required'=>'créé par',
        ];
          $validator = Validator::make($request->all(),$message,[
              'permissionUser'=>'required',
              'permissionModule'=>'required',
              'canCreate'=>'required',
              'canRead'=>'required',
              'canUpdate'=>'required',
              'canDelete'=>'required',
              'created_by'=>'required'
          ]);

          if($validator->failed()){
              return response()->json($validator->errors(),442);
          }
          $syspermission=new Sys_permission;
          $syspermission->permissionUser=$request['permissionUser'];
          $syspermission->permissionModule=$request['permissionModule'];
          $syspermission->canCreate=$request['canCreate'];
          $syspermission->canRead=$request['canRead'];
          $syspermission->canUpdate=$request['canUpdate'];
          $syspermission->canDelete=$request['canDelete'];
          $syspermission->created_by=$request['created_by'];
          $syspermission->save();
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
        $permission=Personal_board::orderBy('created_at','desc')->get();
        $sysmod=Sys_module::orderBy('created_at','desc')->get();
        $create=Personal_board::orderBy('created_at','desc')->get();
        return [$permission,$sysmod,$create];
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $syspermission=Sys_permission::findOrFail($id);
        $permission=Personal_board::findOrFail($id);
        $sysmod=Sys_module::findOrFail($id);
        $create=Personal_board::findOrFail($id);
        return [$syspermission, $permission,$sysmod,$create];
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
            'permissionUser.required'=>'Verfier permission',
            'permissionModule.required'=>'Entrer permission Statut',
            'canCreate.required'=>'demande de creation',
            'canRead.required'=>'demande de lecture',
            'canUpdate.required'=>'demande de mise a jour',
            'canDelete.required'=>'demande de suppression',
            'created_by.required'=>'créé par',
        ];
          $validator = Validator::make($request->all(),$message,[
              'permissionUser'=>'required',
              'permissionModule'=>'required',
              'canCreate'=>'required',
              'canRead'=>'required',
              'canUpdate'=>'required',
              'canDelete'=>'required',
              'created_by'=>'required'
          ]);

          if($validator->failed()){
              return response()->json($validator->errors(),442);
          }
          $syspermission = Sys_permission::findOrFail($request->idSysPermission);
          $syspermission->permissionUser=$request->permissionUser;
          $syspermission->permissionModule=$request->permissionModule;
          $syspermission->canCreate=$request->canCreate;
          $syspermission->canUpdate=$request->canUpdate;
          $syspermission->canDelete=$request->canDelete;
          $syspermission->created_by=$request->created_by;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Sys_permission::find($id)->delete();
    }
}
