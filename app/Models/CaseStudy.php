<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;

class CaseStudy extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'case_studies';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'case_id',
        'user_id',
        'information',
        'assessment',
        'issues',
        'solution',
        'description',
        'images',
        'visibility',
    ];

    /**
     * Get the user that owns the CaseStudy
     *
     * @return \Illuminate\Database\Eloquent\Relations\hasOne
     */
    public function user()
    {
        return $this->hasOne(User::class);
    }
}
