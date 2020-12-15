<?php

namespace App;

use App\User;
use App\Account;
use Illuminate\Database\Eloquent\Model;

class Folder extends Model
{

	/**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
    	'name', 'icon',
    ];

	/*
	 * A folder belongs to a particular user
	 */
	public function user() {
		return $this->belongsTo(User::class, 'user_id');
	}

	/*
	 * A folder can have many accounts in it
	 */
    public function accounts() {
    	return $this->belongsToMany(Account::class);
    }
}
