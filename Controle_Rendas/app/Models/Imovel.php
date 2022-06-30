<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Imovel extends Model
{
    protected $table = 'imoveis';
    use HasFactory;

    protected $fillable = ['nome', 'localizacao', 'descricao', 'user_id'];
}
