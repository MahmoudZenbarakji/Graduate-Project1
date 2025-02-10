<?php

namespace App\Models;

use Carbon\Carbon;
use DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Applicant extends Model implements HasMedia
{
    use SoftDeletes, InteractsWithMedia, HasFactory;

    public $table = 'applicants';

    protected $appends = [
        'image',
    ];

    public const GENDER_SELECT = [
        'male'   => 'Male',
        'female' => 'Female',
    ];

    protected $dates = [
        'birth_date',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public const EDUCATION_LEVEL_SELECT = [
        'associate'   => 'Associate',
        'bachelor\'s' => 'Bachelor\'s',
        'master\'s'   => 'Master\'s',
        'doctoral'    => 'Doctoral',
    ];

    protected $fillable = [
        'user_id',
        'full_name',
        'education_level',
        'experience_year',
        'salary_id',
        'nationality_id',
        'gender',
        'other_phone_number',
        'birth_date',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    public function registerMediaConversions(Media $media = null): void
    {
        $this->addMediaConversion('thumb')->fit('crop', 50, 50);
        $this->addMediaConversion('preview')->fit('crop', 120, 120);
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function salary()
    {
        return $this->belongsTo(Salary::class, 'salary_id');
    }

    public function nationality()
    {
        return $this->belongsTo(Nationality::class, 'nationality_id');
    }

    public function getBirthDateAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setBirthDateAttribute($value)
    {
        $this->attributes['birth_date'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }

    public function getImageAttribute()
    {
        $file = $this->getMedia('image')->last();
        if ($file) {
            $file->url       = $file->getUrl();
            $file->thumbnail = $file->getUrl('thumb');
            $file->preview   = $file->getUrl('preview');
        }

        return $file;
    }

    public function skills()
    {
        return $this->belongsToMany(Skill::class);
    }

    public function job_types()
    {
        return $this->belongsToMany(JobType::class);
    }

    public function educations()
    {
        return $this->hasMany(Education::class);
    }
    public function workExperiences()
    {
        return $this->hasMany(WorkExpenrience::class);
    }

    
}
