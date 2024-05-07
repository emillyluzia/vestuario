<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Roupa extends Model
{
    use HasFactory;

    protected $fillable = [
        'tecido',
        'tamanho',
        'cor',
        'categoria',
        'fabricacao',
        'estacao',
        'descricao'

    ];
}
