<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Fatura extends Model
{
    use HasFactory;
    use SoftDeletes;
    
    protected $fillable = [ 'id_inclino', 'id_imovel', 'pagamento_para', 'valor_mensal', 'quant_meses', 'observacao', 'inicio', 'fim', 'total', 'user_id'];

    public function imovel(){
        return $this->belongsTo('App\Models\Imovel', 'id_imovel', 'id');
    }

    public function inclino(){
        return $this->belongsTo('App\Models\Inclino', 'id_inclino', 'id');
    }

}
