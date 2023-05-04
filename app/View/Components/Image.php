<?php

namespace App\View\Components;

use App\Models\WebImage;
use App\Models\ModelImage;
use Illuminate\View\Component;
use App\Helpers\Language;

/**
 * This component manage the img and picture tags for webpImages
 */
class Image extends Component
{
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
     * The translated alt for the image in case we are receiving a $path param
     * @var array
     */
    public $altForPath;

    /**
     * The full key for the db stored image
     * @var string
     */
    protected $fullKey;

    /**
     * The path for the asset
     * @var string
     */
    protected $path; 
    
    /**
     * The modelImage object
     * @var ModelImage
     */
    protected $image;
    
    /**
     * It is mandatory to receive a modelImage object, or afullKey (WebImage) or a path (path for an asset or external url)
     * @var string $fullKey The full key for the db stored image (WebImage model)
     * @var string $path The path for the asset. Note: not the 'asset($path)' but only the '$path'
     * @var array  $altForPath The translated alt for the image in case we are receiving a $path param
     *
     * @return void
     */
    public function __construct(ModelImage $modelImage = null, $fullKey = null, $path = null, $altForPath = [])
    {        
        $this->image   = $modelImage;
        $this->fullKey = $fullKey;
        $this->path    = $path;
        $this->altForPath = $altForPath;
        
        if($this->checkParams()) {
            
            $this->setImage();

            if($this->image) {
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
     * This component needs either a modelImage or afullKey or a path
     * @return boolean
     */
    protected function checkParams() {        
        return ($this->fullKey || $this->path || $this->image);
    }

    /**
     * Sets the ModelImage instance for a fullKey or a path
     */
    protected function setImage() {
        if(!$this->image){
            if($this->fullKey) {
                $this->setImageForWebImage();
             } elseif ($this->path) {
                 $this->setImageForPath();
             }
        }        
    }

    /**
     * Sets the image for a fullKey param
     */
    protected function setImageForWebImage() {
        $webImage = WebImage::findByFullKey($this->fullKey);

        $this->image = ($webImage->count() == 1) ? $webImage->image : null;
    }

    /**
     * Sets the image for a path param
     */
    protected function setImageForPath() {
        $this->image = new ModelImage();        
        $this->image->instance_type = 'App\Models\WebImage';              
        $this->image->image_path = $this->path; //we need modelImage image_path attribute set in order to check for is_external_url
        $this->image->image_path = $this->image->is_external_url ?  $this->path : asset($this->path); 

        $this->setAltForImage();
    }

    /**
     * Sets the translated alt for an image when path param is present
     */
    protected function setAltForImage() {
        $defaultCode = Language::defaultCode();

        foreach(Language::availableLanguages() as $key => $language) {
            if(isset($this->altForPath[$key])) {
                $this->image->setTranslation('alt', $key, $this->altForPath[$key]);
            } elseif (isset($this->altForPath[$defaultCode])) {
                $this->image->setTranslation('alt', $key, $this->altForPath[$defaultCode]);
            } else {
                $this->image->setTranslation('alt', $key, '');
            }
        }
    }

    /**
     * Checks if the image have to be shown
     */
    protected function setShowImage() {
        $this->showImage = $this->image;
    }

    /**
     * Sets the alt to be shown in the view
     */
    protected function setAlt() {
        $this->alt = $this->image->alt;
    }

    /**
     * Sets the url to be shown in the view
     */
    protected function setUrl() {
        $this->url = $this->image->url;    

        if($this->browserSupportsWebp()) {
            if($this->image->has_webp) {
                $this->url = $this->image->webp_url; 
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
