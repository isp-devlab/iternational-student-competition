<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    use HasFactory;
    public $timestamps = true;
    protected $table = 'settings';
    protected $primaryKey = 'id';

    protected $fillable = [
        'competition_name',
        'description',
        'logo',
        'registration_start',
        'registration_end',
        'submission_start',
        'submission_end',
        'qualification_start',
        'qualification_end',
        'qualification_announcement',
        'final_start',
        'final_end',
        'final_announcement',
        'submission_type',
        'submission_description'
    ];

}
