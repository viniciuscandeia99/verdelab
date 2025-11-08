<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Setor extends Model
{
    use HasFactory;

    protected $table = 'setores';

    protected $fillable = ['nome', 'descricao', 'responsavel'];

    public function consumos()
    {
        return $this->hasMany(Consumo::class);
    }

    public function acoes()
    {
        return $this->hasMany(Acao::class);
    }
}
