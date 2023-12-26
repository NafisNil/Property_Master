<?php

namespace App\View\Components\Form;

use Illuminate\View\Component;

class Input extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */

    public $id;

    public $name;

    public $label;

    public $class;

    public $labelClass;

    public $value;

    public $placeholder;

    public $required;

    public function __construct($name, $label='', $value = '', $id = null, $class = '', $labelClass = '', $placeholder='', $required=null)
    {
        $this->id = $id;
        $this->name = $name;
        $this->label = $label;
        $this->class = $class;
        $this->labelClass = $labelClass;
        $this->value = $value;
        $this->placeholder = $placeholder;
        $this->required = $required;
    }


    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.form.input');
    }
}
