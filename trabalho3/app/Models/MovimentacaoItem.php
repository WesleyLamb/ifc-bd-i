<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MovimentacaoItem extends Model
{
    protected $table = 'movimentacoes_itens';
    public $timestamps = false;

    public function movimentacao()
    {
        return $this->hasOne(Movimentacao::class, 'id', 'movimentacao_id');
    }

    public function produto()
    {
        return $this->hasOne(Produto::class, 'id', 'produto_id');
    }
}
