<?php

namespace App\View\Components\form;

use Illuminate\View\Component;

class input extends Component
{
    public $label;
    public $name;
    public $type;
    public $placeholder;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($label, $name, $type='text', $placeholder='')
    {
        $this->label=$label;
        $this->name=$name;
        $this->type=$type;
        $this->placeholder=$placeholder;
        }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return <<<'blade'
        <label class="block text-sm py-2">
            <span class="text-gray-700 dark:text-gray-400">
                {{$label}}
            </span>
            <input name="{{$name}}" type="{{$type}}" class="block w-full mt-1 text-xs border-red-600 dark:text-gray-300 dark:bg-gray-700 focus:outline-none form-input" placeholder="{{$placeholder}}">
            <small id="error-{{$name}}" class="text-xs text-red-600 dark:text-red-400"></small>
        </label>
blade;
    }
}
