<?php

namespace App\Http\Livewire\Common;

use Livewire\Component;
use App\Models\ModelImage;
use App\Helpers\Language;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;
use Illuminate\Validation\Rule;

/**
 * This component shows an image card (image, delete button, copy button, etc..) for a ModelImage instance 
 */
class ImageCard extends Component
{       
    /** The image path
     * @var string
     */
    public $imagePath = '';

    /** The image url
     * @var string
     */
    public $imageUrl = '';

    /** The image relative path url
     * @var string
     */
    public $imageRelativePath = '';

    /** The listener to call when deleting
     * @var string
     */
    public $deleteListener = null;

    /** The key to delete when we are in the image gallery component
     * @var string
     */
    public $deleteListenerParam = null;

     /** The name of the image
     * @var string
     */
    public $imageName = '';

    /**
     * @var array
     */
    public $alt;   
        
    /**
     * The ModelImage instance
     */
    public ModelImage $modelImage;    

    /** If true, it will hide the manage alts button
     * @var boolean
     */
    public $hiddeAlts = false;

    public function mount() {                      
        $this->setAttributes();
    }

    /**
     * When deleting, we have to call the corresponding livewire component (featured image, featerd image hover or image gallery)
     */
    public function deleteImage() {   
        $this->deleteValidation();

        $this->emit($this->deleteListener, $this->deleteListenerParam);                
    }

    /**
     * Change the name of the image
     */
    public function changeName() {
        $this->validate($this->imageNamerules());
        
        $this->modelImage->instance->changeUploadedFileName($this->modelImage->image_path, $this->imageName);

        $this->modelImage->refresh();

        $this->setAttributes();

        $this->dispatchBrowserEvent('open-success', ['message' => 'File name changed correctly']); 
    }

    public function saveAlt() {
        $this->updateAlts();

        $this->dispatchBrowserEvent('open-success', ['message' => 'Alt updated correctly']); 
        
        $this->dispatchBrowserEvent('close-modal');   
    }

    protected function deleteValidation() {        
        if (method_exists($this->modelImage?->instance, 'imagePathIsUsedInContent')) { //it is only used for blogPost
            if($this->modelImage->instance?->imagePathIsUsedInContent($this->modelImage->image_path)) {            
                $errors = ['delete' => 'Image cannot be deleted because it is used in the content of the post. Remember that the image could be pasted in any of the content languages.'];            
                
                throw ValidationException::withMessages($errors);                
            }
        }        
    }

    protected function imageNamerules() {
        return [
            'imageName' => [
                'required',
                'regex:/^[a-zA-Z0-9_ \-\.\(\)]+$/',
                function ($attribute, $value, $fail) {
                    $fullImageName = str_replace($this->modelImage->image_name, $this->imageName, $this->modelImage->image_path);
             
                    // Check for uniqueness in the model_images table's image_path column
                    $validator = Validator::make(['image_path' => $fullImageName], [
                        'image_path' => Rule::unique('model_images', 'image_path')->ignore($this->modelImage->id),
                    ]);

                    if ($validator->fails()) {
                        $fail('The image name is already taken.');
                    }
                },
            ],
        ];
    }

    protected function updateAlts() {
        $this->fillAllAlt();        
        
        $this->modelImage->update([
            'alt' => $this->alt,            
        ]);
    }

    public function render()
    {
        return view('livewire.common.image-card');
    }  
    
    protected function setAttributes() {
        $this->imageUrl  = $this->modelImage->url;        
        $this->imageRelativePath  = $this->modelImage->relative_path;   
        $this->imageName = $this->modelImage->image_name;        
        $this->alt = $this->modelImage->getTranslations('alt');  
    }

    protected function fillAllAlt() {
        foreach(Language::availableCodes() as $code) {
            if(!isset($this->alt[$code]) || empty($this->alt[$code])){
                $this->alt[$code] = $this->alt[Language::defaultCode()];
            }
        }
    }
}
