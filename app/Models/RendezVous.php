<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class RendezVous extends Model
{
    use HasFactory;

    protected $table = 'rendez_vous';

    protected $fillable = [
        'patient_id',
        'medecin_id',
        'date',
        'heure',
        'motif',
        'statut',
    ];

    // Un rendez-vous appartient à un patient
    public function patient()
    {
        return $this->belongsTo(Patient::class);
    }

    // Un rendez-vous appartient à un médecin
    public function medecin()
    {
        return $this->belongsTo(Medecin::class);
    }

    // Un rendez-vous peut avoir plusieurs consultations
    public function consultations()
    {
        return $this->hasMany(Consultation::class, 'rendez_vous_id');
    }
}