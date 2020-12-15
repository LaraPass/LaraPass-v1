<?php

namespace App;

use App\User;
use App\Account;
use Illuminate\Database\Eloquent\Model;
use AustinHeap\Database\Encryption\Traits\HasEncryptedAttributes;

class AccountNote extends Model
{
    use HasEncryptedAttributes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['content'];

    /**
     * The attributes that are hidden from array.
     *
     * @var array
     */
    protected $hidden = ['user_id'];

    /**
     * The attributes that should be encrypted.
     *
     * @var array
     */
    protected $encrypted = [
        'content',
    ];

    /*
     * An Account Note is owned by a user
     */
    public function user() {
    	return $this->belongsTo(User::class, 'user_id');
    }

    /*
     * An Account Note belongs to an Account
     */
    public function accounts() {
    	return $this->belongsTo(Account::class, 'account_id');
    }
}
