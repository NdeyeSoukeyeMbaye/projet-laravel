<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Traitement extends Model
{
    use HasFactory;

    protected $table = 'traitements';

    protected $fillable = [
        'consultation_id',
        'description',
    ];

    // Un traitement appartient à une consultation
    public function consultation()
    {
        return $this->belongsTo(Consultation::class, 'consultation_id');
    }
}