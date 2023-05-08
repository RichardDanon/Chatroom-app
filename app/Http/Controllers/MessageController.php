<?php
    namespace App\Http\Controllers;
    use App\Http\Controllers\Controller;
    use Illuminate\Http\Request;
    use Illuminate\Http\Response;
    use App\Models\ChatUser;
    use App\Models\Message;
    use App\Models\Chatusermessage;
    use Carbon\Carbon;
    
    

    /*
        Message Controller

        getMessage(by sender)

        setMessage(send message)
    */

    class MessageController extends Controller
    {
        public function getMessagesById($id)
        {
            $message = Message::where('id', $id)
                ->get();
            return response($message, 200);
        }
    
    
        public function postMessage(Request $request)
        {
            $fields = $request->validate([
                'body' => 'required|string',
                'image' => 'image|nullable|max:1999',
                'sender_id' => 'required|int',
                'receiver_id' => 'required|int'
            ]);
            $message = Message::create([
                'body' => $fields['body'],
                'image' => empty($fields['image']) ? null : $fields['image']
                // 'sender_id' => $fields['sender_id'],
                // 'receiver_id' => $fields['receiver_id']
            ]);
    
            $user_message = Chatusermessage::create([
                'message_id' => $message['id'],
                'sender_id' => $fields['sender_id'],
                'receiver_id' => $fields['receiver_id']
            ]);
            return response($user_message, 201);
        }
    
        public function getRecentMessages($user_one_id, $user_two_id)
        {
            $messages = Chatusermessage::
                where(function ($query) use ($user_one_id, $user_two_id) {
    
                    $query->where('created_at', '>', Carbon::now()->subMinutes(5)->toDateTimeString())
                        ->where('sender_id', $user_one_id)
                        ->where('receiver_id', $user_two_id);
                })
                ->orWhere(function ($query) use ($user_one_id, $user_two_id) {
                    $query->where('created_at', '>', Carbon::now()->subMinutes(5)->toDateTimeString())
                        ->where('sender_id', $user_two_id)
                        ->where('receiver_id', $user_one_id);
                })
                ->orderBy('created_at', 'body')
                ->get();

            $messagesContentJSONArray = [];
            foreach ($messages as $message) {
    
                $messagesContent = Message::
                    where('id', '=', $message['message_id'])
                    ->orderBy('created_at','body')
                    ->first();
    
                $messagesContentJSON['sender_id'] = $message['sender_id'];
                $messagesContentJSON['receiver_id'] = $message['receiver_id'];
    
                $messagesContentJSON['message'] = $messagesContent;
    
                array_push($messagesContentJSONArray, $messagesContentJSON);
            }
    
            return response($messagesContentJSONArray, 200);
        }
    
    
   //get all
   public function getMessage(){
    $arrayMessage = Message::all();
    return response($arrayMessage,201);
}
    
    
    }
?>
