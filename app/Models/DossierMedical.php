<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class DossierMedical extends Model
{
    use HasFactory;

    protected $table = 'dossiers_medicaux';

    protected $fillable = [
        'patient_id',
        'date_consultation',
        'diagnostic',
    ];

    protected $casts = [
        'date_consultation' => 'date',
    ];

    // Un dossier médical appartient à un patient
    public function patient()
    {
        return $this->belongsTo(Patient::class, 'patient_id');
    }
}