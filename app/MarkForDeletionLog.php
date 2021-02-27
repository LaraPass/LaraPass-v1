<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MarkForDeletionLog extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 'username', 'action', 'ip_address', 'user_agent',
    ];

    protected $table = 'mark_for_deletion_logs';

    /*
     * A mark for deletion log belongs to a user
     */
    public function user()
    {
        return $this->belongsTo(User::class)->orderBy('created_at', 'DESC');
    }
}
