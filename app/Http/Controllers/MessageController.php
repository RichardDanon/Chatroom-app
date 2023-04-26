<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\Message;

class MessageController extends Controller
{
    public function setMessage(Request $request){
        $fields = $request->validate([
            'body' => 'required|string',
            'image' => 'image|nullable|max:1999',
            'receivers_id' => 'required|integer',
            'senders_id' => 'required|integer'
        ]);
    
        $message = Message::create([
            'body' => $fields['body'],
            'image' => $fields['image'],
            'receivers_id' => $fields['receivers_id'],
            'senders_id' => $fields['senders_id']
        ]);
        return response($message, 201);

    }
    //get all
    public function getMessage(){
        $arrayMessage = Message::all();
        return response($arrayMessage,201);
    }
    //get one
    public function getMessageById($searchId){
        $singleMessage = Message::where('id', 'LIKE', '%'.$searchId.'%')
        ->get();
        return response($singleMessage, 201);
    }
}
