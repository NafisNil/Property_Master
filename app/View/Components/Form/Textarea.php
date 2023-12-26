<?php

namespace App\View\Components\Form;

use Illuminate\View\Component;

class Textarea extends Component
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

    public $rows;

    public $required;

    public function __construct($name, $label, $value = '', $id = '', $class = '', $labelClass = '', $rows=3, $required=null)
    {
        $this->id = $id;
        $this->name = $name;
        $this->label = $label;
        $this->class = $class;
        $this->labelClass = $labelClass;
        $this->value = $value;
        $this->rows = $rows;
        $this->required = $required;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.form.textarea');
    }
}
