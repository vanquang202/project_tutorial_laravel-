<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Index extends Component
{
    public $rolColume = [
        'id','created_at','updated_at'
    ];
    public $medias = [
        'image'
    ];
    public function render()
    {
        return view('components.index');
    }
}