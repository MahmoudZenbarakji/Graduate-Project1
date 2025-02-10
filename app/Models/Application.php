<?php

namespace App\Models;

use Carbon\Carbon;
use DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Application extends Model
{
    use SoftDeletes, HasFactory;

    public $table = 'applications';

    protected $dates = [
        'start_study',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'job_id',
        'status',
        'start_study',
        'applicant_id',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public const STATUS_SELECT = [
        'pending'   => 'Pending',
        'in_review' => 'In Review',
        'rejected'  => 'Rejected',
        'accpeted'  => 'Accepted',
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    public function job()
    {
        return $this->belongsTo(Job::class, 'job_id');
    }

    public function getStartStudyAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setStartStudyAttribute($value)
    {
        $this->attributes['start_study'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }

    public function applicant()
    {
        return $this->belongsTo(Applicant::class, 'applicant_id');
    }
}
