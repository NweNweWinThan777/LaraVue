<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\GroupChatTitle;
use App\Model\GroupChatTitleToUsersRelation;
use Illuminate\Support\Facades\Auth;

class ChatController extends Controller
{
    /**
     * Show the chat view
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $chatGroups = GroupChatTitle::select('group_chat_title.id', 'group_chat_title.name', 'user_id')
            ->leftJoin('group_chat_title_to_users_relation',  function ($join) {
                $join->on('group_chat_title_to_users_relation.group_chat_title_id', '=', 'group_chat_title.id')
                    ->where('group_chat_title_to_users_relation.user_id', Auth::user()->id);
            })
            ->get();
        return view('chat', compact('chatGroups'));
    }

    /**
     * Show the chat group
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function joinChatGroup($groupId)
    {
        $groupTitle = GroupChatTitle::where('id', $groupId)->pluck('name')->first();

        $duplicates = GroupChatTitleToUsersRelation::where('user_id', Auth::user()->id)
            ->where('group_chat_title_id', $groupId)
            ->first();

        if (!$duplicates) {
            $data = new GroupChatTitleToUsersRelation();
            $data->user_id = Auth::user()->id;
            $data->group_chat_title_id = $groupId;
            $data->save();
        }

        return view('joinGroup', ['groupTitle' => $groupTitle]);
    }
}
