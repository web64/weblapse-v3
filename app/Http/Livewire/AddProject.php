<?php

namespace App\Http\Livewire;

use Livewire\Component;

class AddProject extends Component
{
    public $showModal, $url;
    public $step = 1;
    public $resolution;

    public function setResolution($resolution)
    {
        $this->resolution = $resolution;
        // 1920x1080,1280x720,1080x1920,1280x2276
    }


    public function saveUrl()
    {
        
    }

    public function render()
    {
        return view('livewire.add-project');
    }
}
