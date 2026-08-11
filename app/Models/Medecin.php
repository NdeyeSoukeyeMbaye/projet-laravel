<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Medecin extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'specialite_id',
        'disponibilite',
    ];

    // Le médecin appartient à un utilisateur
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Le médecin appartient à une spécialité
    public function specialite()
    {
        return $this->belongsTo(Specialite::class);
    }

    // Le médecin possède plusieurs rendez-vous
    public function rendezVous()
    {
        return $this->hasMany(RendezVous::class);
    }
}