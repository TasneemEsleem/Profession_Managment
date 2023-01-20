<?php

namespace App\Http\Controllers\auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    public function profileUpdate(Request $request)
    {
        $validator = Validator($request->all(), [
            'name' => 'required|string|min:3',
            'image' => 'image|mimes:png,jpg,jpeg',
            'email' => 'required|email',
        ]);
        if (!$validator->fails()) {
            $user = auth()->user();
            $user->name = $request->input('name');
            $user->email = $request->input('email');
            if ($request->hasFile('image')) {
                // Storage::delete($user->image);
                $imagetitle =  time() . '_'. str_replace(' ','',$user->name).'.'. $request->file('image')->extension();
                if( auth('admin')->check()){
                    $request->file('image')->storePubliclyAs('admins', $imagetitle,['disk'=>'public']);
                    $user->image = 'admins/'.$imagetitle;
                }else{
                    $request->file('image')->storePubliclyAs('users', $imagetitle,['disk'=>'public']);
                    $user->image = 'users/'.$imagetitle;
                }
            }
            $isSaved = $user->save();
            return response()->json(
                ['message' => $isSaved ? __('cms.Updated_success') : __('cms.Updated_failed')],
                $isSaved ? Response::HTTP_OK : Response::HTTP_BAD_REQUEST
            );
        }else {
            return response()->json(['message' => $validator->getMessageBag()->first()], Response::HTTP_BAD_REQUEST);
        }
    }
}
