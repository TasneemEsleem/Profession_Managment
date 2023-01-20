<?php

namespace App\Http\Controllers\auth;

use App\Http\Controllers\Controller;
use App\Models\Profession;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;
use Symfony\Component\HttpFoundation\Response;

class RegisterController extends Controller
{
    public function choose(){
        return response()->view('cms.auth.choose_guard');
    }
    public function showRegister(){
        return response()->view('cms.auth.register');
    }
     public function register(Request $request)
    {
        $validator = Validator($request->all(), [
            'name' => 'required|string|min:3',
            'email' => 'required|email|unique:professions,email',
            'password' => 'required|min:3',
            'mobile' => 'required|numeric|digits:10',
           
        ]);
        if (!$validator->fails()) {
            $profession = new Profession();
            $profession->name = $request->input('name');
            $profession->email = $request->input('email');
            $profession->mobile = $request->input('mobile');
            $profession->longitude = $request->input('longitude');
            $profession->latitude = $request->input('latitude');
            $profession->password = Hash::make($request->input('password'));
            $isSaved = $profession->save();
            if($isSaved){
                $role= Role::where('name','profession')->first();
                 $profession->assignRole($role);
             }
            return response()->json(
             ['message' => $isSaved ? 'Saved successfully' : 'Save failed!'],
              $isSaved ? Response::HTTP_CREATED : Response::HTTP_BAD_REQUEST);
        } else {
            return response()->json(
                ['message' => $validator->getMessageBag()->first()],
                Response::HTTP_BAD_REQUEST,);
        }
    } 

    public function showRegisterUser(){
        return response()->view('cms.auth.register_user');
    }
     public function registerUser(Request $request)
    {
        $validator = Validator($request->all(), [
            'name' => 'required|string|min:3',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:3',
        ]);
        if (!$validator->fails()) {
            $user = new User();
            $user->name = $request->input('name');
            $user->email = $request->input('email');
            $user->password = Hash::make($request->input('password'));
            $isSaved = $user->save();
            if($isSaved){
                $role= Role::where('name','user')->first();
                $user->assignRole($role);
                // $user->syncRoles(Role::findById($request->input('role_id'), 'user'));

             }
            return response()->json(
             ['message' => $isSaved ? 'Saved successfully' : 'Save failed!'],
              $isSaved ? Response::HTTP_CREATED : Response::HTTP_BAD_REQUEST);
        } else {
            return response()->json(
                ['message' => $validator->getMessageBag()->first()],
                Response::HTTP_BAD_REQUEST,);
        }
    } 


    }

