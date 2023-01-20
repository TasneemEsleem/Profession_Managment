<?php

namespace App\Http\Controllers\auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;
use Symfony\Component\HttpFoundation\Response;

class AuthController extends Controller
{
    public function showLogin(Request $request)
    {
        $request->merge(['guard' => $request->guard]);
        // dd($request->all());
        $validator = Validator($request->all(), [
            'guard' => 'required|string|in:admin,user,profession'
        ]);
        session()->put('guard', $request->input('guard'));
        if (!$validator->fails()) {
            return response()->view('cms.auth.login', ['guard' => $request->guard]);
        } else {
            abort(404);
        }
    }
   
    public function login(Request $request)
    {
        // dd(session('guard'));
        $validator = Validator($request->all(), [
            'email' => 'required|email',
            'password' => 'required|string|min:3',
            'remember' => 'required|boolean',
        ]);
        $guard = session('guard');
        if (!$validator->fails()) {
            if (Auth::guard($guard)->attempt($request->only(['email', 'password']), $request->get('remember'))) {
                return response()->json(['message' => 'login is successfully'], Response::HTTP_OK);
            } else {
                return response()->json(['message' => 'Credentials error,check and try again'], Response::HTTP_BAD_REQUEST);
            }
        } else {
            return response()->json(['message' => $validator->getMessageBag()->first()], Response::HTTP_BAD_REQUEST);
        }
    }
    public function logout(Request $request)
    {
        $guard = session('guard');
        Auth::guard($guard)->logout();
        $request->session()->invalidate();
        return redirect()->route('cms.login', $guard);
    }

    public function updatePassword(Request $request)
    {
        // dd($request->all());
        $guard = session('guard');
        $validator = Validator($request->all(), [
            'current_password' => 'required|string|current_password:'.$guard,
            'new_password' => 'required|string|confirmed',
        ]);
        if (!$validator->fails()) {
            $user = $request->user();
            $user->forceFill(
                ['password' => Hash::make($request->input('new_password'))]
            );
            $isSaved = $user->save();
            return response()->json(
                ['message' => $isSaved ? 'Password Change successfully' : 'Failed To Change password!'],
                $isSaved ? Response::HTTP_OK : Response::HTTP_BAD_REQUEST
            );
        } else {
            return response()->json(
                ["message" => $validator->getMessageBag()->first()],
                Response::HTTP_BAD_REQUEST
            );
        }
    }

}
