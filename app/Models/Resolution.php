<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Resolution extends Model
{
    use \Sushi\Sushi;
    use HasFactory;

    // 1920x1080,1280x720,1080x1920,1280x2276
    protected $rows = [
        [
            'id' => 1,
            'dimensions'=> '1920x1080',
            'width'     => 1920,
            'height'    => 1080,
            'name'      => '1920 by 1080',
            'description' => '',
            'orientation' => 'landscape',
            'image'     => '/images/1080.png',
            'order' => 1,
        ],
        [
            'id' => 2,
            'dimensions'=> '1280x720',
            'width'     => 1920,
            'height'    => 720,
            'name'      => '1920 by 720',
            'description' => '',
            'orientation' => 'landscape',
            'image'     => '/images/720.png',
            'order' => 2,
        ],
        [
            'id' => 3,
            'dimensions'=> '1080x1920',
            'width'     => 1080,
            'height'    => 1920,
            'name'      => '1080 by 1920',
            'description' => '',
            'orientation' => 'portrait',
            'image'     => '/images/1080.png',
            'order' => 4,
        ],
        [
            'id' => 4,
            'dimensions'=> '1280x2276',
            'width'     => 1280,
            'height'    => 2276,
            'name'      => '1280 by 2276',
            'description' => '',
            'orientation' => 'portrait',
            'image'     => '/images/1080.png',
            'order' => 4,
        ],
    ];
}
