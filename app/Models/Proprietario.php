<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Proprietario extends Model
{
    use HasFactory;
    protected $table = 'proprietario';
    protected $fillable = ['id', 'nome', 'ano_nascimento', 'profissao', 'telefone'];
}
