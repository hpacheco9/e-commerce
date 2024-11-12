<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Medicamento extends Model
{
    use HasFactory;
    protected $table = 'medicamentos';
    protected $primaryKey = 'referencia';
    public $incrementing = false;
    protected $keyType = 'integer';
}
