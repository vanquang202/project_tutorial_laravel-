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

    public $dataMuntipleStatus = [
        'type',
        'status'
    ];

    public $dataMuntipleStatusValue = [
        'type' => [
            0 => "Giảm giá theo phần trăm",
            1 => "Giảm giá theo tiền ",
        ],
        'status' => [
            0 => "Không kích hoạt",
            1 => "Kích hoạt ",
        ]
    ];

    public $relationshipModel = [
        'user' => 'name',
        'lecturer' => 'name',
        'course' => 'name'
    ];

    public function render()
    {
        return view('components.index');
    }
}