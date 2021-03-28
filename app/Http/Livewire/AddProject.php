<?php

namespace App\Http\Livewire;

use App\Jobs\CapturePreviewThumbnails;
use App\Models\Interval;
use App\Models\Resolution;
use Illuminate\Support\Facades\Cache;
use Illuminate\Validation\Rule;
use Livewire\Component;

class AddProject extends Component
{
    public bool $showModal = false;
    public ?string $url = null;
    public int $step = 1;
    public ?string $selectedResolution = null;
    public $resolutions;
    public $intervals;
    public string $selectedInterval = 'minutes:1';

    public function mount()
    {
        $this->resolutions = Resolution::orderBy('order')->get();
        $this->intervals = Interval::get();
        // dd($this->resolutions );
        // dd($this->intervals);
    }

    public function setResolution($selectedResolution)
    {
        $this->selectedResolution = $selectedResolution;
        // 1920x1080,1280x720,1080x1920,1280x2276
    }

    public function updatedUrl()
    {
        
        // queue preview shots
        $this->resolutions ->each(function($resolution) {
            // $cacheKey = now()->format('Y-m-d') . '_'. parse_url($this->url, PHP_URL_HOST). '_'. strlen($this->url). '_' . md5($this->url) . '_'. $resolution->dimensions;
            // dd($cacheKey);
            Cache::remember(urlPreviewHash($this->url, $resolution), now()->addDays(2), function () use ($resolution) {
                // return DB::table('users')->get();

                CapturePreviewThumbnails::dispatch($this->url, $resolution);
            });
        });
    }

    public function step1()
    {
        $validatedData = $this->validate([
            'url' => 'required|url',
            'selectedResolution' => ['required', Rule::in( $this->resolutions->pluck('dimensions') ),],
        ]);

        $this->step = 2;
    }

    public function render()
    {
        return view('livewire.add-project');
    }
}
