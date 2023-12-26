<?php

namespace App\View\Components\Form;

use Illuminate\View\Component;

class Checkbox extends Component
{
    public $id;
    public $name;
    public $value;
    public $isChecked;
    public $label;
    public $currentValue;

    public function __construct($name, $id = null, $value = '1', $currentValue = '', $isChecked = false, $label = '')
    {
        $this->id = $id;
        $this->name = $name;
        $this->value = $value;

        if (!(gettype($isChecked) == 'boolean')) {

            if (in_array($isChecked, ['1', 'True', 'true'])) {
                $this->isChecked = true;
            }

        } else {
            $this->isChecked = $isChecked;
        }

        $this->label = $label;
        $this->currentValue = $currentValue;
    }

    /*public function isChecked()
    {
        return $this->value == $this->currentValue;
    }*/

    public function render()
    {
        return view('components.form.checkbox');
    }
}
