<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Personals\Personal_role;
use App\Models\Personals\Personal_board;
use App\Models\Pressings\Pressing_board;
use Illuminate\Support\Facades\Validator;

class personalboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $personnalboard= Personal_board::all();
        return $personnalboard;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $personnalpressing=Pressing_board::orderBy('created_at','desc')->get();
        $persrole=Personal_role::orderBy('created_at','desc')->get();
        return [$personnalpressing, $persrole];
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
            'personalPressing.required'=>'Entrer le Pressing',
            'personalRole.required'=>'Entrer le role',
            'personalFirstname.required'=>'Entrer le prenom du personnel',
            'personalLastname.required'=>'Entrer le nom du personnel',
            'personalCodeName.required'=>'Entrer le code du personnel',
            'personalPhoneNumber.required'=>'Entrer le numero du personnel',
            'personalPassword.required'=>'Entrer le mot de passe du personnel',
            'personalEmail.required'=>'Entrer le mail du personnel',
            'personalLocation.required'=>'Entrer la localisation',
            'personalSalary.required'=>'Entrer le salaire du personnel',
            'personalJoindDate.required'=>'Entrer la date',
            'personalStatus.required'=>'Entrer le statut',
            'isAdmin.required'=>'Entrer si admin',
            'personalAuthor.required'=>'Entrer auteur',
            'authorType.required'=>'Entrer le type',
        ];
          $validator = Validator::make($request->all(),$message,[
              'personalPressing'=>'required',
              'personalRole'=>'required',
              'personalFirstname'=>'required',
              'personalLastname'=>'required',
              'personalCodeName'=>'required',
              'personalPhoneNumber'=>'required',
              'personalPassword'=>'required|max:6',
              'personalEmail'=>'nullable',
              'personalLocation'=>'required',
              'personalSalary'=>'nullable',
              'personalJoindDate'=>'nullable',
              'personalStatus'=>'required',
              'isAdmin'=>'required',
              'personalAuthor'=>'required',
              'authorType'=>'required'
          ]);

          if($validator->failed()){
              return response()->json($validator->errors(),442);
          }
          $personnalboard=new personal_board;
          $personnalboard->personalPressing=$request['personalPressing'];
          $personnalboard->personalRole=$request['personalRole'];
          $personnalboard->personalFirstname=$request['personalFirstname'];
          $personnalboard->personalLastname=$request['personalLastname'];
          $personnalboard->personalCodeName=$request['personalCodeName'];
          $personnalboard->personalPhoneNumber=$request['personalPhoneNumber'];
          $personnalboard->personalPassword=$request['personalPassword'];
          $personnalboard->personalEmail=$request['personalEmail'];
          $personnalboard->personalLocation=$request['personalLocation'];
          $personnalboard->personalSalary=$request['personalSalary'];
          $personnalboard->personalStatus=$request['personalStatus'];
          $personnalboard->isAdmin=$request['isAdmin'];
          $personnalboard->authorType=$request['authorType'];
          $personnalboard->save();
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
        $personnalpressing=Pressing_board::orderBy('created_at','desc')->get();
        $persrole=Personal_role::orderBy('created_at','desc')->get();
        return [$personnalpressing, $persrole];
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $personnalboard=Personal_board::findOrFail($id);
        $personnalpressing=Pressing_board::findOrFail($id);
        $persrole=Personal_role::findOrFail($id);
         return [$personnalboard, $personnalpressing, $persrole];
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Personal_board $personalboard)
    {
        $message=[
            'personalPressing.required'=>'Entrer le Pressing',
            'personalRole.required'=>'Entrer le role',
            'personalFirstname.required'=>'Entrer le prenom du personnel',
            'personalLastname.required'=>'Entrer le nom du personnel',
            'personalCodeName.required'=>'Entrer le code du personnel',
            'personalPhoneNumber.required'=>'Entrer le numero du personnel',
            'personalPassword.required'=>'Entrer le mot de passe du personnel',
            'personalEmail.required'=>'Entrer le mail du personnel',
            'personalLocation.required'=>'Entrer la localisation',
            'personalSalary.required'=>'Entrer le salaire du personnel',
            'personalJoindDate.required'=>'Entrer la date',
            'personalStatus.required'=>'Entrer le statut',
            'isAdmin.required'=>'Entrer si admin',
            'personalAuthor.required'=>'Entrer auteur',
            'authorType.required'=>'Entrer le type',
        ];
          $validator = Validator::make($request->all(),$message,[
              'personalPressing'=>'required',
              'personalRole'=>'required',
              'personalFirstname'=>'required',
              'personalLastname'=>'required',
              'personalCodeName'=>'required',
              'personalPhoneNumber'=>'required',
              'personalPassword'=>'required|max:6',
              'personalEmail'=>'nullable',
              'personalLocation'=>'required',
              'personalSalary'=>'nullable',
              'personalJoindDate'=>'nullable',
              'personalStatus'=>'required',
              'isAdmin'=>'required',
              'personalAuthor'=>'required',
              'authorType'=>'required'
          ]);

          if($validator->failed()){
              return response()->json($validator->errors(),442);
          }
          $personalboard = Personal_board::findOrFail($request->idPersonalBoard);
          $personalboard->personalPressing=$request->personalPressing;
          $personalboard->personalRole=$request->personalRole;
          $personalboard->personalFirstname=$request->personalFirstname;
          $personalboard->personalLastname=$request->personalLastname;
          $personalboard->personalCodeName=$request->personalCodeName;
          $personalboard->personalPhoneNumber=$request->personalPhoneNumber;
          $personalboard->personalPassword=$request->personalPassword;
          $personalboard->personalEmail=$request->personalEmail;
          $personalboard->personalLocation=$request->personalLocation;
          $personalboard->personalSalary=$request->personalSalary;
          $personalboard->personalJoindDate=$request->personalJoindDate;
          $personalboard->personalStatus=$request->personalStatus;
          $personalboard->isAdmin=$request->isAdmin;
          $personalboard->personalAuthor=$request->personalAuthor;
          $personalboard->authorType=$request->authorType;

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Personal_board::find($id)->delete();
    }
}
