{{-- top row time and categories --}} 
<div class="flex justify-between">
    <div>
        <x-reading-time-icon time="{{ __('blog.time') }}" />
    </div>
    <div>
        @foreach($blogPost->tags as $tag)            
            <x-blog-tag :blog-tag="$tag" />
        @endforeach
    </div>
</div>