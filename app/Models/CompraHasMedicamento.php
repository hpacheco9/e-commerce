<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CompraHasMedicamento extends Model
{
    use HasFactory;

    protected $table = 'compra_has_medicamentos';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'compra_id',
        'medicamento_referencia',
        'quantidade',
    ];

    public $incrementing = false;
    public $timestamps = false;
    protected $keyType = 'string';
}
