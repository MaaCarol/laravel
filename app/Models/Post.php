<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Post extends Model
{
    use HasFactory;

    /**
     * Quais colunas podem ser preenchidas via create() ou update().
     */
    protected $fillable = [
        'conteudo',
        'user_id',
        'picture',
        'description',
    ];

    /**
     * Cada post pertence a um usuário.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
