<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Carrinho extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_email',
    ];

    protected $primaryKey = 'user_email';
    public $incrementing = false;
    protected $keyType = 'string';
}
