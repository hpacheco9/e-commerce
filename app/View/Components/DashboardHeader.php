<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class DashboardHeader extends Component
{
    public $adminName;

    public function __construct($adminName)
    {
        $this->adminName = $adminName;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.dashboard-header');
    }
}
