<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class CarrinhoHasMedicamento extends Model

{
    use HasFactory;
    protected $table = 'carrinho_has_medicamentos';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_email',
        'medicamento_referencia',
        'quantidade',
    ];

    public $incrementing = false;


    protected $keyType = 'string';


    public $timestamps = false;

    public static function updateOrCreateByCompositeKey($userEmail, $medicamentoReferencia, $quantidade)
    {
        $record = self::where('user_email', $userEmail)
            ->where('medicamento_referencia', $medicamentoReferencia)
            ->first();

        if ($record) {

            DB::table('carrinho_has_medicamentos')
                ->where('user_email', $userEmail)
                ->where('medicamento_referencia', $medicamentoReferencia)
                ->update(['quantidade' => $quantidade]);
        } else {
            self::create([
                'user_email' => $userEmail,
                'medicamento_referencia' => $medicamentoReferencia,
                'quantidade' => $quantidade,
            ]);
        }
    }
}
