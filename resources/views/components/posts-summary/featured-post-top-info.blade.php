{{-- top row time and categories --}} 
<div class="flex justify-between">
    <div>        
        <x-reading-time-icon :text="$blogPost->content" />
    </div>
    <div>
        @foreach($blogPost->tags as $tag)            
            <x-blog-tag :blog-tag="$tag" />
        @endforeach
    </div>
</div>