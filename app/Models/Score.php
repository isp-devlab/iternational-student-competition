<?php

namespace App\Models;

use App\Models\Team;
use App\Models\User;
use App\Models\Assessment;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Score extends Model
{
    use HasFactory;
    public $timestamps = true;
    protected $table = 'scores';
    protected $primaryKey = 'id';

    protected $fillable = [
        'assessment_id',
        'team_id',
        'user_id',
        'value',
        'comment'
    ];

    public function team(): BelongsTo
    {
        return $this->belongsTo(Team::class, 'team_id');
    }

    public function assessment(): BelongsTo
    {
        return $this->belongsTo(Assessment::class, 'assessment_id');
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
