<?php

namespace App;

use AustinHeap\Database\Encryption\Traits\HasEncryptedAttributes;
use Illuminate\Database\Eloquent\Model;

class QuickNote extends Model
{
    use HasEncryptedAttributes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 'content',
    ];

    /**
     * The attributes that should be encrypted.
     *
     * @var array
     */
    protected $encrypted = [
        'content',
    ];

    /*
     * A Quick Note is owned by a user
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
