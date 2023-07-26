<div class="flex flex-col gap-20">
    @foreach($categoriesWithPosts as $category)
        <x-posts-summary :blog-posts="$category->posts()->get()" :title="$category->name" :view-all-href="route('blog.search.category', $category->slug)"/>
    @endforeach

    {{ $categoriesWithPosts->links('livewire.web.pagination') }}
</div>