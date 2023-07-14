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
     * The classes for the question div
     *
     * @var string
     */
    public $smallText = false;

     /**
     * The font classes for the question div
     *
     * @var string
     */
    public $questionFontSizeClass = null;

    /**
     * The font classes for the answer div
     *
     * @var string
     */
    public $answerFontSizeClass = null;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($question, $answer, $questionFontSizeClass = null, $answerFontSizeClass = null)
    {
        $this->question = $question;
        $this->answer = $answer;
        $this->questionFontSizeClass = $questionFontSizeClass;  
        $this->answerFontSizeClass = $answerFontSizeClass;       
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
