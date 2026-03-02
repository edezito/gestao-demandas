<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description'
    ];

    // Relacionamento 1:N
    public function tickets()
    {
        return $this->hasMany(Ticket::class);
    }
}