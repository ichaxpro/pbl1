<?php

namespace App\View\Components;

use App\Models\Member;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class LaboratoryStructure extends Component
{
public $heads;
public $researchers;

public function __construct($heads = null, $researchers = null)
{
    $this->heads = $heads ?? Member::where('status', 'active')
        ->whereHas('position', fn($q) => $q->where('name', 'Head Lab'))
        ->get();

    $this->researchers = $researchers ?? Member::where('status', 'active')
        ->whereHas('position', fn($q) => $q->where('name', 'Researcher'))
        ->get();
}


    public function render(): View|Closure|string
    {
        return view('profile.laboratory_structure');
    }
}
