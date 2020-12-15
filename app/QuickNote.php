<?php

namespace App;

use Auth;
use App\User;
use Illuminate\Database\Eloquent\Model;
use AustinHeap\Database\Encryption\Traits\HasEncryptedAttributes;

class QuickNote extends Model
{
    use HasEncryptedAttributes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
    	'user_id','content',  
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
    public function user() {
    	return $this->belongsTo(User::class);
    }
}
