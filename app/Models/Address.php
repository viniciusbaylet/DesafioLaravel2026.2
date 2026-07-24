<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'cep',
        'street',
        'number',
        'neighborhood',
        'city',
        'state',
        'complement',
    ];

    /**
     * Relacionamento inverso: O endereço pertence a um usuário
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}