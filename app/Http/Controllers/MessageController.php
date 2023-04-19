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
        public function index()
        {
            $messages = Message::all();
            return view('messages.index', compact('messages'));
        }
    
        public function create()
        {
            return view('messages.create');
        }
    
        public function store(Request $request)
        {
            $validatedData = $request->validate([
                'body' => 'required|string',
                'image' => 'nullable|image',
                'receivers_id' => 'required|exists:chatUsers,id',
                'senders_id' => 'required|exists:chatUsers,id',
            ]);
    
            Message::create($validatedData);
    
            return redirect()->route('messages.index')->with('success', 'Message created successfully.');
        }
    
        public function edit(Message $message)
        {
            return view('messages.edit', compact('message'));
        }
    
        public function update(Request $request, Message $message)
        {
            $validatedData = $request->validate([
                'body' => 'required|string',
                'image' => 'nullable|image',
                'receivers_id' => 'required|exists:chatUsers,id',
                'senders_id' => 'required|exists:chatUsers,id',
            ]);
    
            $message->update($validatedData);
    
            return redirect()->route('messages.index')->with('success', 'Message updated successfully.');
        }
    
        public function destroy(Message $message)
        {
            $message->delete();
    
            return redirect()->route('messages.index')->with('success', 'Message deleted successfully.');
        }
    }
?>
