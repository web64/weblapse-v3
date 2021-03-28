<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Interval extends Model
{
    use \Sushi\Sushi;
    use HasFactory;

    protected $rows = [
        [
            'id' => 1,
            'name' => 'Every minute',
            'slug' => 'minutes:1',
            'interval_type' => 'minutes',
            'interval_value' => 1,
        ],
        [
            'id' => 2,
            'name' => '5 minutes',
            'slug' => 'minutes:5',
            'interval_type' => 'minutes',
            'interval_value' => 5,
        ],
        [
            'id' => 3,
            'name' => '10 minutes',
            'slug' => 'minutes:10',
            'interval_type' => 'minutes',
            'interval_value' => 10,
        ],
        [
            'id' => 4,
            'name' => '15 minutes',
            'slug' => 'minutes:15',
            'interval_type' => 'minutes',
            'interval_value' => 15,
        ],
        [
            'id' => 5,
            'name' => '30 minutes',
            'slug' => 'minutes:30',
            'interval_type' => 'minutes',
            'interval_value' => 30,
        ],
        [
            'id' => 6,
            'name' => '1 hours',
            'slug' => 'hours:1',
            'interval_type' => 'hours',
            'interval_value' => 1,
        ],
        [
            'id' => 7,
            'name' => '2 hours',
            'slug' => 'hours:2',
            'interval_type' => 'hours',
            'interval_value' => 2,
        ],
        [
            'id' => 8,
            'name' => '3 hours',
            'slug' => 'hours:3',
            'interval_type' => 'hours',
            'interval_value' => 3,
        ],
        [
            'id' => 9,
            'name' => '6 hours',
            'slug' => 'hours:6',
            'interval_type' => 'hours',
            'interval_value' => 6,
        ],
        [
            'id' => 10,
            'name' => '12 hours',
            'slug' => 'hours:12',
            'interval_type' => 'hours',
            'interval_value' => 12,
        ],
        [
            'id' => 11,
            'name' => '24 hours',
            'slug' => 'hours:24',
            'interval_type' => 'hours',
            'interval_value' => 24,
        ],
    ];

/*
      'minutes:1' => 'Every minute',
      'minutes:5' => '5 minutes',
      'minutes:10' => '10 minutes',
      'minutes:15' => '15 minutes',
      'minutes:30' => '30 minutes',
      'hours:1' => '1 hour',
      'hours:2' => '2 hours',
      'hours:3' => '3 hours',
      'hours:6' => '6 hours',
      'hours:12' => '12 hours',
      'hours:24' => '24 hours',
*/
}
