<?php

namespace App\View\Components\sidebar;

use Illuminate\View\Component;
use Illuminate\Support\Facades\Route;

class SidebarItem extends Component
{
    public $label;
    public $href;
    public $isActive;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($label,$href='#',$routeName='')
    {
        $this->label=$label;
        $this->href=$href;
        $routeName=$routeName==''?strtolower($label):$routeName;
        $this->isActive=strpos(Route::currentRouteName(),$routeName)!==false;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return <<<'blade'

        <li>
            <a href="{{$href}}" class="relative flex flex-row items-center h-11 focus:outline-none hover:bg-blue-800 dark:hover:bg-gray-600 text-white-600 hover:text-white-800 border-l-4 border-transparent hover:border-blue-500 dark:hover:border-gray-800 pr-6">
            @if($isActive) <span class="absolute inset-y-0 left-0 w-1 bg-purple-600 rounded-tr-lg rounded-br-lg" aria-hidden="true"></span> @endif
            <span class="inline-flex justify-center items-center ml-4">
                {{$icon}}
            </span>
            <span class="ml-2 text-sm tracking-wide truncate">{{$label}}</span>
            </a>
        </li>
blade;
    }
}
