<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\softDeletes;

class Survey_responses extends Model
{
    use HasFactory, softDeletes;

    protected $primaryKey = 'survey_response_id';

    protected $fillable = [
        'user_id',
        'survey_question_id',
    ];
}
