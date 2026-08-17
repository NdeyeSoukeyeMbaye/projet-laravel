<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\DossierMedical;

class Patient extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'telephone',
        'adresse',
        'date_naissance',
        'sexe',
    ];

    // Un patient appartient à un utilisateur
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Un patient possède plusieurs rendez-vous
    public function rendezVous()
    {
        return $this->hasMany(RendezVous::class);
    }

    // Un patient possède plusieurs dossiers médicaux
    public function dossiersMedicaux()
    {
        return $this->hasMany(DossierMedical::class);
    }

    // Un patient possède plusieurs paiements
    public function paiements()
    {
        return $this->hasMany(Paiement::class);
    }

    // Un patient possède plusieurs assurances
    public function assurances()
    {
        return $this->hasMany(Assurance::class);
    }
}