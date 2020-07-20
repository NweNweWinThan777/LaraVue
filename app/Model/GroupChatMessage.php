<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class GroupChatTitle extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'group_chat_message';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'message',
        'user_id',
        'group_chat_title_id',
    ];
}
