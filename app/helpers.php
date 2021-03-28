<?php

use App\Models\Resolution;

function urlPreviewHash(string $url, Resolution $resolution)
{
    return now()->format('Y-m-d') . '_'. 
        parse_url($url, PHP_URL_HOST). '_'. 
        strlen($url). '_' . 
        md5($url. '234"#$456sds,fhf:') . '_'. 
        $resolution->dimensions;
}