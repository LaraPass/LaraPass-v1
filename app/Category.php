<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'active',
    ];

    /*
     * Removing timestamps from the modal.
     */
    public $timestamps = false;

    /* A category can have many accounts under it */
    public function accounts()
    {
        return $this->hasMany(Account::class);
    }
}
