<?php

namespace App\Jobs;

use App\Models\Resolution;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Spatie\Browsershot\Browsershot;

class CapturePreviewThumbnails implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public string $url;
    public Resolution $resolution;
    public int $offset_top = 0;

    public function __construct(string $url, Resolution $resolution, $offset_top = 0)
    {
        $this->url = $url;
        $this->resolution = $resolution;
        $this->offset_top = $offset_top;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        dump("capture url");
        dump($this->url);
        dump($this->resolution)->toArray();

        // app_path(urlPreviewHash($this->url, $this->resolution). ".jpg")

        $imagePath = storage_path("/app/urlpreview/".urlPreviewHash($this->url, $this->resolution). ".jpg") ;
        Browsershot::url( $this->url ) 
            ->waitUntilNetworkIdle()
            ->dismissDialogs()
            ->setDelay(4000)
            ->windowSize($this->resolution->width, $this->resolution->height + $this->offset_top )
            ->clip( 0, $this->offset_top, $this->resolution->width,$this->resolution->height + $this->offset_top )
            ->setScreenshotType('jpeg', 100)
            ->save( $imagePath );


        echo $imagePath. PHP_EOL;
    }
}
