<?php

namespace App\Http\Controllers;

use App\Events\ChatMessage;
use App\Models\Message;
use App\Models\Profession;
use App\Models\User;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class MessageController extends Controller
{
    public function index()
    {
        $messages = Message::with('user', 'profession')->get();
        return Response()->view('cms.Message.chat', ['messages'=>$messages]);
    }
    public function sendMessage(Request $request){
        //auth->user()->messages()->create($request->all())
        $message = new Message();
        $message->content = $request->input('content');
        $message->user()->associate($request->user());
        $message->profession()->associate($request->profession());
        $message->save();
        broadcast(new ChatMessage($message))->toOthers();
    }
    public function getConnectedUsers(){
        $users = User::all()->where('is_connected', true);
        return response()->json(['users' => $users]);
    }
    public function getProfessions(){
        $professions = Profession::all()->where('is_connected', true);
        return response()->json(['professions' => $professions]);
    }
    // public function handleDisconnection(){
    //     $user = auth()->user();
    //     $user->is_connected = false;
    //     $user->save();
    //     broadcast(new UserDisconnected($user))->toOthers();
    // }
}
