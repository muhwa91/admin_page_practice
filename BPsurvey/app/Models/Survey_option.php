<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\softDeletes;

class Survey_option extends Model
{
    use HasFactory, softDeletes;

    protected $primaryKey = 'survey_option_id';

    protected $fillable = [
        'survey_question_id',
        'survey_option_value',
        'survey_option_content'
    ];
}
