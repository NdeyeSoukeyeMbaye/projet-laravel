<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Consultation extends Model
{
    protected $table = 'consultations';

    protected $fillable = [
        'rendez_vous_id',
        'dossier_medical_id',
        'date_consultation',
        'observations',
    ];

    // Une consultation appartient à un rendez-vous
    public function rendezVous()
    {
        return $this->belongsTo(RendezVous::class, 'rendez_vous_id');
    }
}