<?php

namespace App\Livewire;

use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Cookie;
use Livewire\Component;

class LanguageToggle extends Component
{

    public $lang;

    public function render()
    {



        return view('livewire.language-toggle');
    }
    public function update()
    {

        Cookie::queue('lang', $this->lang, now()->addDay()->timestamp);

        session()->put('lang', $this->lang);

        App::setLocale($this->lang);

        $this->js('window.location.reload()');

    }
}
