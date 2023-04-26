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
                'password' => 'required|string'

            ]);
            if(isset($fields['image'])) {
            $chatUser = ChatUser::create([
                'image'        => $fields['image'],
                'firstName'    => $fields['firstName'],
                'lastName'     => $fields['lastName'],
                'email' => $fields['email'],
                'username' => $fields['username'],
                'password' => $fields['password']
            ]);
        } else{
            $chatUser = ChatUser::create([
                'image'        => $fields['image'],
                'firstName'    => $fields['firstName'],
                'lastName'     => $fields['lastName'],
                'email' => $fields['email'],
                'username' => $fields['username'],
                'password' => $fields['password']
            ]); }
    
            return response($chatUser, 201);
          
        }

        public function getChatUser($username){
            // $chatUsers = ChatUser::where('username', '=', '%'.$username.'%')
            // ->get();
            $chatUsers = ChatUser::where('username', $username) //need specific user
            ->get();

            if(!$chatUsers[0]){
                return response()->json(['message' => 'ChatUser not found'], 404);
            }

            return response($chatUsers, 201); 
        }

        public function putChatUser($username, Request $request){
            $fields = $request->validate([
                'image' => 'image|nullable|max:1999',
                'firstName' => 'required|string',
                'lastName' => 'required|string',
                'email' => 'required|string',
                'username' => 'required|string',
                'password' => 'required|string',
                
            ]);

            $chatUsers = ChatUser::where('username', '=', '%'.$username.'%')
                    ->get();

            if(!$chatUsers[0]){
                return response()->json(['message' => 'ChatUser not found'], 404);
            }

            foreach($chatUsers as $chatuser){
                $chatuser->image=$request->image;
                $chatuser->firstName=$request->firstName;
                $chatuser->lastName=$request->lastName;
                $chatuser->email=$request->email;  
                $chatuser->username=$request->username;
                $chatuser->password=$request->password; 
            }

            $chatUsers[0]->save();

            return response($chatUsers[0],201);
        }

    
        public function deleteChatUser($username){
            $chatUsers = ChatUser::where('username', $username)->get();

                if(!$chatUsers[0]){
                    return response()->json(['message' => 'ChatUser not found'], 404);
                }

                $chatUsers[0]->delete();

                return response()->json([], 204);
        }
    }
?>