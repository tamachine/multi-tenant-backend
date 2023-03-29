<div class="flex flex-col p-4 sm:p-10">
    <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
        <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
            <x-admin.search />

            @if ($posts->count())
                <div class="mt-4 shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-100">
                            <tr>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-bold text-gray-500 tracking-wider">
                                    Title
                                </th>

                                <th scope="col" class="px-6 py-3 text-left text-xs font-bold text-gray-500 tracking-wider">
                                    Category
                                </th>

                                <th scope="col" class="px-6 py-3 text-left text-xs font-bold text-gray-500 tracking-wider">
                                    <x-admin.order-table
                                        name="Hero"
                                        order_column="{{$order_column}}"
                                        order_way="{{$order_way}}"
                                        column="hero"
                                    />
                                </th>

                                <th scope="col" class="px-6 py-3 text-left text-xs font-bold text-gray-500 tracking-wider">
                                    <x-admin.order-table
                                        name="Top 10"
                                        order_column="{{$order_column}}"
                                        order_way="{{$order_way}}"
                                        column="top"
                                    />
                                </th>

                                <th scope="col" class="px-6 py-3 text-left text-xs font-bold text-gray-500 tracking-wider">
                                    <x-admin.order-table
                                        name="Published"
                                        order_column="{{$order_column}}"
                                        order_way="{{$order_way}}"
                                        column="published_at"
                                    />
                                </th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($posts as $index => $post)
                                <tr class="{{$index % 2 == 0 ? 'bg-white' : 'bg-gray-50'}}">
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                        <a href="{{route('intranet.blog.post.edit', $post->hashid)}}" class="text-purple-700 hover:underline">
                                            {{ $post->title }}
                                        </a>
                                    </td>

                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                        {{ $post->category->name }}
                                    </td>

                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                        {{ $post->hero ? 'Yes' : '-' }}
                                    </td>

                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                        {{ $post->top ? 'Yes' : '-' }}
                                    </td>

                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                        {{ $post->published ? $post->published_at->format('d-m-Y H:i:s') : '-' }}
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <div class="mb-8">
                    {{ $posts->links('livewire.partials.pagination') }}
                </div>
            @else
                <div class="bg-white shadow mt-8 px-4 py-5 sm:rounded-lg sm:p-6">
                    <h5>No posts found</h5>
                </div>
            @endif
        </div>
    </div>
</div>
