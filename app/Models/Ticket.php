<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    use HasFactory;

    protected $fillable = [
        'project_id',
        'title',
        'description',
        'status'
    ];

    // Relacionamento N:1
    public function project()
    {
        return $this->belongsTo(Project::class);
    }
}