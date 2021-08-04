<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Personals\Personal_role;
use Illuminate\Support\Facades\Validator;

class personalroleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $personnalrole= Personal_role::all();
        return $personnalrole;
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
            'roleName.required'=>'Entrer le nom du role',
            'roleStatus.required'=>'Entrer le statut du role',
            'created_by.required'=>'Créer par ',
        ];
          $validator = Validator::make($request->all(),$message,[
              'roleName'=>'required',
              'roleStatus'=>'required',
              'created_by'=>'nullable',
          ]);

          if($validator->failed()){
              return response()->json($validator->errors(),442);
          }
          $personnalrole=new Personal_role;
          $personnalrole->roleName=$request['roleName'];
          $personnalrole->roleStatus=$request['roleStatus'];
          $personnalrole->created_by=$request['created_by'];
          $personnalrole->save();
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
        $personnalrole=Personal_role::findOrFail($id);
        return [$personnalrole];
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
            'roleName.required'=>'Entrer le nom du role',
            'roleStatus.required'=>'Entrer le statut du role',
            'created_by.required'=>'Créer par ',
        ];
          $validator = Validator::make($request->all(),$message,[
              'roleName'=>'required',
              'roleStatus'=>'required',
              'created_by'=>'nullable',
          ]);

          if($validator->failed()){
              return response()->json($validator->errors(),442);
          }
          $personnalrole =Personal_role::findOrFail($request->idPersonalRole);
          $personnalrole->roleName=$request->roleName;
          $personnalrole->roleStatus=$request->roleStatus;
          $personnalrole->created_by=$request->created_by;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Personal_role::find($id)->delete();
    }
}
