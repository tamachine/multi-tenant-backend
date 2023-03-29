{{-- top row time and categories --}} 
<div class="flex justify-between">
    <div>
        <x-reading-time-icon time="{{ __('blog.time') }}" />
    </div>
    <div>
        <x-blog-category :blog-category="$blogPost->category" />
    </div>
</div>