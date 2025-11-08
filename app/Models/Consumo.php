<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Consumo extends Model
{
    use HasFactory;

    protected $fillable = [
        'setor_id',
        'mes',
        'ano',
        'energia_kwh',
        'agua_litros',
        'materiais_kg',
        'producao'
    ];

    public function setor()
    {
        return $this->belongsTo(Setor::class);
    }

    // cálculo de eficiência produtiva
    public function getEficienciaAttribute()
    {
        return $this->energia_kwh > 0 
            ? round($this->producao / $this->energia_kwh, 2)
            : 0;
    }
}
