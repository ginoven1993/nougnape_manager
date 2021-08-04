<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Personals\Personal_board;
use App\Models\Personals\Personal_presence;
use Illuminate\Support\Facades\Validator;

class personalpresenceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $personnalpresence = Personal_presence::all();
        return $personnalpresence;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $personal=Personal_board::orderBy('created_at','desc')->get();
        return [$personal];
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
            'personal.required'=>'Entrer personnel',
            'punchDate.required'=>'Entrer date of punch',
            'isPunchingIn.required'=>'Verification ',
        ];
          $validator = Validator::make($request->all(),$message,[
              'personal'=>'required',
              'punchDate'=>'required',
              'isPunchingIn'=>'required',
          ]);

          if($validator->failed()){
              return response()->json($validator->errors(),442);
          }
          $personal=new Personal_presence;
          $personal->personal=$request['personal'];
          $personal->punchDate=$request['punchDate'];
          $personal->isPunchingIn=$request['isPunchingIn'];
          $personal->save();
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
        $personal=Personal_board::orderBy('created_at','desc')->get();
        return [$personal];
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $personnalpresence=Personal_presence::findOrFail($id);
        $personal=Personal_board::findOrFail($id);
        return [$personnalpresence, $personal];
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
            'personal.required'=>'Entrer personnel',
            'punchDate.required'=>'Entrer date of punch',
            'isPunchingIn.required'=>'Verification ',
        ];
          $validator = Validator::make($request->all(),$message,[
              'personal'=>'required',
              'punchDate'=>'required',
              'isPunchingIn'=>'required',
          ]);

          if($validator->failed()){
              return response()->json($validator->errors(),442);
          }
          $personnalpresence=Personal_presence::findOrFail($request->idSysLog);
          $personnalpresence->personal=$request->personal;
          $personnalpresence->punchDate=$request->punchDate;
          $personnalpresence->isPunchingIn=$request->isPunchingIn;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Personal_presence::find($id)->delete();
    }
}
