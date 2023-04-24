<?php
    namespace App\Http\Controllers;
    use App\Http\Controllers\Controller;
    use Illuminate\Http\Request;
    use Illuminate\Http\Response;
    use App\Models\ChatUser;
    use App\Models\Message;

    /*
        Message Controller

        getMessage(by sender)

        setMessage(send message)
    */

    class ChatUserController extends Controller
    {
        public function setChatUser(Request $request){
            $fields = $request->validate([
                'image' => 'image|nullable|max:1999',
                'firstName' => 'required|string',
                'lastName' => 'required|string',
                'email' => 'required|string',
                'username' => 'required|string',
                'password' => 'required|string',
            ]);
            $chatUser = ChatUser::create([
                'image'        => $fields['image'],
                'firstName'    => $fields['firstName'],
                'lastName'     => $fields['lastName'],
                'email' => $fields['email'],
                'username' => $fields['username'],
                'password' => $fields['password']
            ]);
    
            return response($chatUser, 201);
        }

        public function getChatUser($username,$email){
            $chatUser = ChatUser::where(function($query)use($username,$email){
                $query->where('username', 'LIKE', '%'.$username.'%')
                ->where('email', 'LIKE', '%'.$email.'%');
            })
            ->get();
            return response($chatUser, 201);
        }

        public function putChatUser($username,$email){

        }
    }
?>