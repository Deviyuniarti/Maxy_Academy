<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SurveyResult extends Model
{
    // Tentukan nama tabel jika berbeda dari konvensi Laravel
    protected $table = 'survey_results';

    // Tentukan kolom yang bisa diisi (mass-assignable)
    protected $fillable = ['result'];
}
