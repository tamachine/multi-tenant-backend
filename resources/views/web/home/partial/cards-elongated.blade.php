<div class="grid grid-cols-1 md:grid-cols-3 w-100 md:pt-6 md:gap-x-6 gap-y-4">
  
    @foreach($latestArticles as $blogPost)   
    <x-card-elongated 
        background-relative-path="{{ $blogPost->featured_image_path }}" 
        background-hover-relative-path="{{ $blogPost->featured_image_hover_path }}" 
        title="{!! $blogPost->title !!}" 
        text="{!! $blogPost->summary !!}" 
        time="{!! __('home.card-elongated-1-time') !!}" 
        href="{{ $blogPost->url }}"
    />  
    @endforeach
    
</div>