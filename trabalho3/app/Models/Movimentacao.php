<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Movimentacao extends Model
{
    protected $table = 'movimentacoes';
    public $timestamps = false;

    public function pessoa()
    {
        return $this->hasOne(Pessoa::class, 'id', 'cliente_fornecedor_id');
    }

    public function funcionario()
    {
        return $this->hasOne(Funcionario::class, 'id', 'funcionario_id');
    }

    public function itens()
    {
        return $this->hasMany(MovimentacaoItem::class, 'movimentacao_id', 'id');
    }

}
