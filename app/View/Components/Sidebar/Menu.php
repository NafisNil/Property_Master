<?php

namespace App\View\Components\Sidebar;

use Illuminate\Support\Facades\File;
use Illuminate\View\Component;

class Menu extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */


    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {

        $items = json_decode(File::get(base_path() . '/sidebar.json'), true);


        return view('components.sidebar.menu', compact('items'));
    }
}
