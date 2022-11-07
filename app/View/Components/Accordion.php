<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Accordion extends Component
{

    /**
     * The question
     *
     * @var string
     */
    public $question;

     /**
     * The answer
     *
     * @var string
     */
    public $answer;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($question, $answer)
    {
        $this->question = $question;
        $this->answer = $answer;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.accordion');
    }
}
