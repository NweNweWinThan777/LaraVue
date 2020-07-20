<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class GroupChatTitleToUsersRelation extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'group_chat_title_to_users_relation';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'group_chat_title_id',
    ];
}
