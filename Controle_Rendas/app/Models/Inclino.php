<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Inclino extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = ['nome','numero_bi', 'email','genero', 'contacto', 'user_id'];

    public function fatura(){
       return $this->hasMany('App\Models\Fatura','id_inclino');
    }
}
