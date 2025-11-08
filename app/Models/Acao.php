<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Acao extends Model
{
    use HasFactory;

    protected $table = 'acoes';

    protected $fillable = [
        'setor_id',
        'titulo',
        'descricao',
        'data_execucao',
        'impacto_estimado'
    ];

    public function setor()
    {
        return $this->belongsTo(Setor::class);
    }
}
