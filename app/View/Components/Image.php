<?php

namespace App\View\Components;

use App\Models\WebImage;
use App\Models\ModelImage;
use Illuminate\View\Component;
use App\Services\Image\PathImageComponent;
use App\Services\Image\ModelImageComponent;

/**
 * This component manage the <img> tag in order to show an image or its corresponding webp image based in browser capability
 */
class Image extends Component
{
    /**
     * PUBLIC ATTRIBUTES FOR VIEW
     */

    /**
     * The alt to be shown in view
     * @var array
     */
    public $alt;

    /**
     * The url image to be shown in view
     * @var string
     */
    public $url;

    /**
     * To know if the image have to be shown in view
     * @var boolean
     */
    public $showImage;

     /**
     * PROTECTED ATTRIBUTES FOR VIEW
     */    

    /**
     * The translated alt for the image in case we are receiving a $path param
     * @var array
     */
    protected $altForPath;

    /**
     * The full key for the db stored image (WebImage model)
     * @var string
     */
    protected $fullKey;

    /**
     * The path for the asset
     * It can be an intern asset or an external url
     * @var string
     */
    protected $path; 
    
    /**
     * The modelImage object 
     * @var ModelImage
     */
    protected $image;

    /**
     * In order to use this component, we must use an imageComponent class that implements ImageComponentInterface
     */
    protected $imageComponent;
    
    /**
     * It is mandatory to receive a modelImage object or a fullKey (from WebImage) or a path (path for an asset or external url)
     * @var ModelImage $modelImage model image object (ModelImage model)
     * @var string $fullKey The full key for the db stored image (WebImage model)
     * @var string $path The path for the asset. Note: not the 'asset($path)' but only the '$path'. You can also pass an external url
     * @var array  $altForPath The translated alt for the image in case we are receiving a $path param
     *
     * @return void
     */
    public function __construct($modelImage = null, $fullKey = null, $path = null, $altForPath = [])
    {        
        $this->image   = $modelImage;
        $this->fullKey = $fullKey;
        $this->path    = $path;
        $this->altForPath = $altForPath;
        
        if($this->checkParams()) {
            
            $this->setImageComponent();

            if($this->imageComponent) {
                $this->setAlt();
                $this->setUrl();
                $this->setShowImage();            
            }
            
        }        
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.image');
    }

    /**
     * Sets the imageComponent depending on the passed param
     */
    protected function setImageComponent() {
        
        if($this->path != null) {
            $this->imageComponent = new PathImageComponent($this->path, $this->altForPath);    
        }

        if($this->fullKey != null) {
            $webImage = WebImage::findByFullKey($this->fullKey);

            if ($webImage->count() == 1) {
                $this->imageComponent = new ModelImageComponent($webImage->image);
            }        
        } 

        if($this->image !== null) {            
            $this->imageComponent = new ModelImageComponent($this->image);                
        }
    }

    /**
     * This component needs either a modelImage or a fullKey or a path
     * @return boolean
     */
    protected function checkParams() {        
        return ($this->fullKey || $this->path || $this->image);
    }    

    /**
     * Checks if the image have to be shown
     */
    protected function setShowImage() {
        $this->showImage = $this->url != null;
    }

    /**
     * Sets the alt to be shown in the view
     */
    protected function setAlt() {
        $this->alt = $this->imageComponent->getAlt();
    }

    /**
     * Sets the url to be shown in the view
     */
    protected function setUrl() {      
        $this->url = $this->imageComponent->getImageUrl();  

        if($this->browserSupportsWebp()) {
            if($this->imageComponent->hasWebp()) {
                $this->url = $this->imageComponent->getWebpImageUrl();
            }
        }
    }

    /**
     * Checks if the browser supports webp images
     * @return boolean
     */
    protected function browserSupportsWebp() {
        return (isset($_SERVER['HTTP_ACCEPT']) && strpos($_SERVER['HTTP_ACCEPT'], 'image/webp') !== false);
    }
}
