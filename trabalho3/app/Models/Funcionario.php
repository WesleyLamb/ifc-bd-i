<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Funcionario extends Model
{
    protected $table = 'funcionarios';
    public $timestamps = false;

    public function cargo()
    {
        return $this->hasOne(Cargo::class, 'id', 'cargo_id');
    }
}
