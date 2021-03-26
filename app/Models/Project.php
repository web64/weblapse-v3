<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    public const PROJECT_ACTIVE = 'A';
    public const PROJECT_PAUSED = 'P'; 
    public const PROJECT_QUEUED = 'Q';

    use SoftDeletes;
    use HasFactory;

    protected $guarded = [];
    protected $dates = ['last_shot_at'];


    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function videos()
    {
        return $this->hasMany(Video::class)->orderByDesc('created_at');
    }

    public function getVideoCountAttribute()
    {
        return $this->videos()->count();
    }

    public function path()
    {
        return route('projects.update', $this->id);
    }

    public function getThumbnailUrlAttribute()
    {
        return '/projects/' . $this->id . '/thumbnail/';
    }

    protected function getThumbnailPathAttribute()
    {
        return storage_path("app/projects/{$this->id}.jpg");
    }

    protected function setVideoDimensionAttribute($dimensions)
    {
        if (self::isValidDimension($dimensions))
            $this->video_dimension = $dimensions;
    }

    public static function isValidDimension($dim)
    {
        $valid_dimensions = ['1920x1080', '1280x720', '1080x1920', '1280x2276'];

        return (array_search($dim, $valid_dimensions) !== false) ? true : false;
    }

    public function getSizeXAttribute()
    {
        $tmp = explode('x', $this->video_dimensions);
        return $tmp[0];
    }

    public function getSizeYAttribute()
    {
        //        die( "video_dimension: " . $this->video_dimensions );

        $tmp = explode('x', $this->video_dimensions);
        return $tmp[1];
    }

    public function activate()
    {
        $this->update([
            'status'    => self::PROJECT_ACTIVE
        ]);
    }

    public function deactivate()
    {
        $this->update([
            'status'    => self::PROJECT_PAUSED
        ]);
    }

    public function isActive()
    {
        return $this->status === self::PROJECT_ACTIVE;
    }

    public function scopeActive($query)
    {
        return $query->whereStatus(self::PROJECT_ACTIVE);
    }

    public function updateInterval()
    {
        switch ($this->shot_interval) {
            case 'days':
                $seconds = (60 * 60 * 24) * $this->shot_interval_value;
                break;
            case 'hours':
                $seconds = (60 * 60) * $this->shot_interval_value;
                break;
            case 'minutes':
                $seconds = 60 * $this->shot_interval_value;
                break;
        }

        $this->update(['shot_interval_seconds' => $seconds]);
    }


    public function interval()
    {
        return "{$this->shot_interval}:{$this->shot_interval_value}";
    }
}
