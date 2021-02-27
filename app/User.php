<?php

namespace App;

use AustinHeap\Database\Encryption\Traits\HasEncryptedAttributes;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Yadahan\AuthenticationLog\AuthenticationLogable;

class User extends Authenticatable implements MustVerifyEmail
{
    use Notifiable;
    use AuthenticationLogable;
    use HasEncryptedAttributes;

    const ADMIN_TYPE = 'admin';
    const DEFAULT_TYPE = 'default';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username', 'name', 'email', 'password', 'avatar', 'dob', 'mobile', 'security_questions', 'rng_level', 'support_pin', 'remark',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token', 'email', 'username',
    ];

    /**
     * The attributes that should be encrypted.
     *
     * @var array
     */
    protected $encrypted = [
        'google2fa_secret',
        'backup_codes',
        'mobile',
        'support_pin',
    ];

    /*
     * Checking if the user is Admin
     */
    public function isAdmin()
    {
        return $this->type === self::ADMIN_TYPE;
    }

    /**
     * A user can have only one set of security questions.
     */
    public function questions()
    {
        return $this->hasOne(SecurityQuestions::class);
    }

    /*
     * A user can have many accounts
     */
    public function accounts()
    {
        return $this->hasMany(Account::class);
    }

    /*
     * A user can create and own many folders
     */
    public function folders()
    {
        return $this->hasMany(Folder::class);
    }

    /*
     * A User can have many quick notes.
     */
    public function quick_note()
    {
        return $this->hasMany(QuickNote::class);
    }

    /*
     * Returns total accounts owned by the user.
     */
    public function totalAccounts()
    {
        return $this->accounts()->count();
    }

    /*
     * Returns total folders owned by the user.
     */
    public function totalFolders()
    {
        return $this->folders()->count();
    }

    /*
     * Returns total notes (quick + account) owned by the user.
     */
    public function totalNotes()
    {
        $qn = $this->quick_note()->count();
        $an = $this->account_note()->count();
        $tn = $qn + $an;

        return $tn;
    }

    /*
     * A User can have many account notes.
     */
    public function account_note()
    {
        return $this->hasMany(AccountNote::class);
    }

    /*
     * A user can have many mark deletion logs
     */
    public function mark_for_deletion_logs()
    {
        return $this->hasMany(MarkForDeletionLog::class);
    }
}
