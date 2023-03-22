 <div 
    class="flex gap-[10px] flex-row flex-nowrap overflow-x-auto scrollbar-none"
    >
    @foreach($categories as $blogCategory)
        <x-blog-category :blog-category="$blogCategory" />
    @endforeach
</div>