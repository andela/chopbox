<?php
/**
 * Created by PhpStorm.
 * User: Verem
 * Date: 02/12/15
 * Time: 9:20 AM
 */

namespace ChopBox\ChopBox\Repository;

use ChopBox\Message;
use ChopBox\Http\Requests;
use ChopBox\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MessagesRepository {



    private $message;

    public function __construct(Message $message)
    {
        $this->message = $message;
    }


    public function sendMessage(Request $request)
    {
        $senderId = Auth::user()->id;
        $this->message->sender_id = $senderId;
        $this->message->receiver_id = $request->get('receiverId');
        $this->message->message_body = $request->get('message');

        $this->message->save();

        return $this->message;

    }

    public function findUserMessage()
    {
        $id = auth()->user()->id;

        return Message::where('receiver_id', $id)
            ->where('status', 0)->get();

    }

    public function getSenderImage($id)
    {
        $user =  User::find($id);

        return $user->image_uri;
    }
}