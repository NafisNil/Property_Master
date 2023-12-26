<?php

namespace App\View\Components\Modal;

use Illuminate\View\Component;

class Content extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */

    public $title;
    public $hideFooter;

    public $size;

    public function __construct($title, $size = 'md', $hideFooter=false)
    {
        $this->title = $title;
        $this->hideFooter = $hideFooter;
        $this->size = $size;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.modal.content');
    }
}
