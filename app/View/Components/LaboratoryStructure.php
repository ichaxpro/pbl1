<?php

namespace App\View\Components;

use App\Models\Member;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class LaboratoryStructure extends Component
{
    public $head;
    public $researchers;

    public function __construct()
    {
        $this->head = Member::whereHas('position', function ($query) {
            $query->where('name', 'Head Lab');
        })->first();

        $this->researchers = Member::whereHas('position', function ($query) {
            $query->where('name', 'Researcher');
        })->get();
    }

    public function render(): View|Closure|string
    {
        return view('profile.laboratory_structure');
    }
}