<?php

namespace App\Http\Controllers;

use App\Reply;
use Illuminate\Http\Request;

class ConversationBestReplyController extends Controller
{
    public function store(Reply $reply)
    {
        //$this->authorize('update-conversation', $reply->conversation);
        $this->authorize('update', $reply->conversation);

        $reply->conversation->set_best_reply($reply);

        return back();
    }
}
