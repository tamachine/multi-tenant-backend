<?php

namespace App\Http\Livewire\Web;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Feature;

class ShowFeatures extends Component
{
    use WithPagination;

    const PER_PAGE = 3;

    public $featuresPerPage;

    protected $featuresFirstColumn = [];
    protected $featuresSecondColumn = [];
    protected $buttonVisibility;

    public $paginate = false;

    public function mount($paginate = false){
        $this->featuresPerPage = self::PER_PAGE;

        $this->paginate = $paginate;

        $this->setFeatures();        
    }

    /**     
     * @return response()
     */
    public function loadMore()
    {
        $this->featuresPerPage = $this->featuresPerPage + self::PER_PAGE;
    }

    public function render()
    {        
        $this->setFeatures();        

        return view('livewire.web.show-features', [
            'featuresFirstColumn'  => $this->featuresFirstColumn,
            'featuresSecondColumn' => $this->featuresSecondColumn,
            'showButton' => $this->buttonVisibility
        ]);
    }

    protected function setFeatures(){
        if($this->paginate) {
            $this->featuresFirstColumn = Feature::paginate($this->featuresPerPage);

            $this->buttonVisibility = Feature::count() > $this->featuresFirstColumn->count();
        } else {
            $featuresPerColumn = round(Feature::all()->count() / 2);

            $this->featuresFirstColumn  = Feature::all()->take($featuresPerColumn);    
            $this->featuresSecondColumn = Feature::all()->skip($featuresPerColumn);    

            $this->buttonVisibility = false;
        }
    }
}
