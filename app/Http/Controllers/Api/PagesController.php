<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Api\BaseController;
use Illuminate\Http\JsonResponse;
use App\Models\Page;
use App\Traits\Controllers\Api\HasSeoConfigurations;
use RoutesForPages;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;

class PagesController extends BaseController
{
    use HasSeoConfigurations;

    public function __construct() {
        RoutesForPages::registerRoutes();
    }
    /**     
     * @lrd:start
     * ## Returns all pages
     * @QAparam class_name string nullable "class name of the instance. You can get classes from /pageclasses"
     * @lrd:end     
     */
    public function index(Request $request):JsonResponse {

        $query = Page::query();         

        if($request->has('class_name')) {            
            $class_name = $request->input('class_name');

            $classes = $this->getClasses();

            $classes_array = Arr::pluck($classes, 'model', 'class_name');

            if(in_array($class_name, array_keys($classes_array))) {
                if($class_name == 'empty') {
                    $query = Page::where('instance_type', null);
                } else {
                    $query = Page::where('instance_type', $classes_array[$class_name]);
                }
                
            } else {
                $query = Page::where('instance_type', $class_name);
            }           
        }   

        return $this->successResponse($this->mapApiResponse($query->get()));                
    }

    /**
     * @lrd:start
     * ## Returns one faq
     * ## name: name of the route
     * @lrd:end    
     */
    public function show(Page $page):JsonResponse {                
        return $this->successResponse($page->toApiResponse());                
    }  

    /**
     * @lrd:start
     * ## Returns the seo configurations for a page     
     * ## page_name: route_name of the page
     * @QAparam locale string nullable 
     * @lrd:end    
     */
    public function seoConfigurations(Page $page):JsonResponse {
        return $this->seoConfigurationsResponse($page, $page);                
    }

    /**
     * @lrd:start
     * ## Returns the different classes of the pages          
     * @lrd:end    
     */
    public function classes():JsonResponse {
        return $this->successResponse($this->getClasses());
    }

    protected function getClasses(): array {
        $instances = Page::distinct()->pluck('instance_type');

        $return = [];

        foreach($instances as $instance_type) {
            $explode = explode("\\", $instance_type);

            $class = $instance_type ? strtolower($explode[count($explode) -1]) : 'empty';

            $return[] = ['class_name' => $class, 'model' => $instance_type];
        }

        return $return;
    }
}
