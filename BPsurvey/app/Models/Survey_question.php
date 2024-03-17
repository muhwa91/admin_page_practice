<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\softDeletes;

class Survey_question extends Model
{
    use HasFactory, softDeletes;

    protected $primaryKey = 'survey_question_id';
    
    protected $fillable = [
        'survey_question_title',
    ];
}
