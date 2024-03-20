<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\softDeletes;

class Survey_responses extends Model
{
    use HasFactory, softDeletes;

    protected $table = 'survey_responses';
    protected $primaryKey = 'survey_response_id';
    public $timestamps = true;

    protected $fillable = [
        'user_id',
        'survey_question_id',
        'survey_response_content',
    ];
}
