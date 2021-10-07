<?php

namespace App\Http\Controllers\Chat;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Chat;
use App\Models\ChatRoom;
use App\Models\User;
use Auth;
use Session;
use Illuminate\Support\Facades\Crypt;

class ChatController extends Controller
{
    public function chat(Request $request)
    {
        if(Auth::check())
        {
            $getReceiverUsers = Chat::where('sender_id', Auth::user()->id)->get()->pluck('receiver_id')->toArray();

            $getSenderUsers = Chat::where('receiver_id', Auth::user()->id)->get()->pluck('sender_id')->toArray();


            $data['users'] = User::where('id', '!=', Auth::user()->id)
            ->whereNotIn('user_type', [1])
            ->whereIn('id', $getReceiverUsers)
            ->orWhereIn('id', $getSenderUsers)
            ->get();

            $userId = '';

            if(!empty($request->user_id))
            {
                $userId = Crypt::decrypt($request->user_id);
            }
            $userIds = array(Auth::user()->id, $userId);
            sort($userIds);

            $data['implodeId'] = implode('-', $userIds);
        
            $data['userId'] = $userId;
            $receiver_profile_pic = User::find($data['userId']);
            $data['receiver_profile_pic'] = isset($receiver_profile_pic->profile_pic) ? asset('/') . $receiver_profile_pic->profile_pic : '';

            $data['messages'] = Chat::with('senderName:id,first_name,profile_pic,last_name')->where(['sender_id' => Auth::user()->id,
                                    'receiver_id' => $data['userId']
                                ])
                                ->orWhere([
                                    'sender_id' => $data['userId'],
                                    'receiver_id' => Auth::user()->id
                                ])
                                ->get()
                                ->toArray();
                                // print_r($data['messages']);die();

            $readByUsers = array(Auth::user()->id, $userId);
            $readByImplode = implode(',', $readByUsers);        

            $currentDate = date('Y-m-d H:i:s');

            Chat::where(['sender_id' => Auth::user()->id,
                        'receiver_id' => $data['userId']
                    ])->update(['read_at' => $currentDate, 'read_by' => $readByImplode]);

            return view('chat.chat', $data);
        }

        return redirect()->to('/');
    }

    public function saveChat(Request $request)
    {
    	if(Auth::check())
    	{
    		$recieverId = $request->recieverId;
    		$senderId = $request->senderId;
    		$message = $request->message;
            $uniqueCode = $request->implodeId;
    		$currentTime = date('Y-m-d H:i:s');

    		$chat = new Chat;
    		$chat->receiver_id = $recieverId;
    		$chat->sender_id = $senderId;
    		$chat->message = $message;
            $chat->unique_code = $uniqueCode;
    		$chat->save();

            $checkLastMessage = ChatRoom::where(['unique_code' => $uniqueCode])->first();

            if(empty($checkLastMessage))
            {
                $chatRoom = new ChatRoom;
                $chatRoom->receiver_id = $recieverId;
                $chatRoom->sender_id = $senderId;
                $chatRoom->last_message = $message;
                $chatRoom->unique_code = $uniqueCode;
                $chatRoom->last_message_time = $currentTime;
                $chatRoom->last_message_type = $request->last_message_type;
                $chatRoom->save();
            }
            else
            {
                $updateLastMessage = ChatRoom::where(['unique_code' => $uniqueCode])->update(['last_message' => $message, 'last_message_time' => $currentTime, 'last_message_type' => $request->last_message_type]);
            }
    	}
    }

    public function unreadMessage(Request $request)
    {
        $countUnreadMessages = Chat::where(['sender_id' => $request->senderId, 'receiver_id' => $request->recieverId])->whereNULL('read_by')->count();

        $countUnreadMessages = $countUnreadMessages + 1;

        $data['last_message'] = ChatRoom::where('unique_code', $request->unique_code)->first();
        $data['last_message']->countUnreadMessages = $countUnreadMessages;

        return $data;
    }
}
