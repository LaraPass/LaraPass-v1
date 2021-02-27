<?php

namespace App;

use AustinHeap\Database\Encryption\Traits\HasEncryptedAttributes;
use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
    use HasEncryptedAttributes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title', 'category_id', 'link', 'login_id', 'login_password', 'additional_info',
    ];

    /**
     * The attributes that should be encrypted.
     *
     * @var array
     */
    protected $encrypted = [
        'login_id', 'login_password', 'additional_info',
    ];

    /**
     * Lazy loading owner info along with accounts modal.
     */
    protected $with = ['owner', 'folder'];

    /**
     * An account is owned by a user.
     *
     * @var array
     */
    public function owner()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    /**
     * An account also belongs to a particular category.
     *
     * @var array
     */
    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    /**
     * Partial Keyword Search Function on Title & Category.
     *
     * @var array
     */
    public function scopeSearchByKeyword($query, $keyword)
    {
        if ($keyword != '') {
            $query->where(function ($query) use ($keyword) {
                $query->where('title', 'LIKE', "%$keyword%");
            });
        }

        return $query;
    }

    /*
     * Account belongs to folder
     */
    public function folder()
    {
        return $this->belongsToMany(Folder::class);
    }

    /*
     * An account has many notes
     */
    public function account_notes()
    {
        return $this->hasMany(AccountNote::class);
    }

    public function addNote($account_note)
    {
        $this->account_notes()->create($account_note);
    }
}
