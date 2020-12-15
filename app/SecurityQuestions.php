<?php

namespace App;

use App\User;
use Delatbabel\Elocrypt\Elocrypt;
use Illuminate\Database\Eloquent\Model;
use AustinHeap\Database\Encryption\Traits\HasEncryptedAttributes;

class SecurityQuestions extends Model
{
    use HasEncryptedAttributes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
    	'question1', 'answer1', 'question2', 'answer2',
    ];

    /**
     * The attributes that should be encrypted .
     *
     * @var array
     */
	protected $encrypted = [
		'answer1',
		'answer2',
	];

	/**
	 * A Security Question set belongs to a particular user.
	 */
	public function user() {
		return $this->belongsTo(User::class, 'user_id');
	}
}
