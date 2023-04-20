<x-admin.form-section submit="savePost" formClass="block">
    <x-slot name="title">
        {{ $formTitle }}
    </x-slot>

    <x-slot name="description">
        {{ $formDescription }}
    </x-slot>

    <x-slot name="form">
        <div class="w-full sm:grid sm:gap-2 sm:grid-cols-2">
            <!-- Title -->
            <div class="px-4">
                <x-admin.label for="title" value="{{ __('Title') }}" />
                <x-admin.input id="title" type="text" class="mt-1 block w-full" maxlength="255" wire:model.defer="title" autocomplete="post_title" />
                <x-admin.input-error for="title" class="mt-2" />
            </div>


            <div class="px-4 mt-4 sm:mt-0 flex gap-3 divide-x">
                <!-- Published -->
                <section>
                    <x-admin.label for="published" value="{{ __('Published') }}" />

                    <label for="published" class="inline-flex items-center">
                        <x-admin.checkbox id="published" wire:model="published" class="w-10 h-10 mt-1" />
                    </label>
                </section>

                <!-- Hero -->
                <section class="pl-3">
                    <x-admin.label for="hero" value="{{ __('Hero') }}" />

                    <label for="hero" class="inline-flex items-center">
                        <x-admin.checkbox id="hero" wire:model="hero" class="w-10 h-10 mt-1" />
                    </label>
                </section>

                 <!-- Top -->
                 <section class="pl-3">
                    <x-admin.label for="top" value="{{ __('Top 10') }}" />

                    <label for="top" class="inline-flex items-center">
                        <x-admin.checkbox id="top" wire:model="top" class="w-10 h-10 mt-1" />
                    </label>
                </section>

                <!-- Preview -->
                <section class="ml-auto">
                    <x-admin.button onclick="window.open('{{ $post->preview_url }}','_blank');">Preview</x-admin.button>
                </section>
            </div>


        </div>

         <!-- Slug -->
         <div class="px-4 mt-4">
            <x-admin.label for="slug" value="{{ __('Slug/URL') }}" />
            <x-admin.input id="slug" type="text" class="mt-1 block w-full" maxlength="255" wire:model.defer="slug" autocomplete="post_slug" />
            <x-admin.input-error for="slug" class="mt-2" />
        </div>

        <div class="w-full mt-4 sm:grid sm:gap-2 sm:grid-cols-2">
            {{-- Category --}}
            <div class="px-4">
                <x-admin.label for="category" value="{{ __('Category') }}" />
                <select id="category" name="category" wire:model="category"
                    class="disable-arrow block w-full h-10 mt-1 pt-2 px-3 text-left border-gray-300 rounded-md"
                >
                    <option value="">{{ __('Select category') }}</option>
                    @foreach ($categories as $id => $name)
                        <option value="{{$id}}">{{ $name }}</option>
                    @endforeach
                </select>

                <x-admin.input-error for="category" class="mt-2" />
            </div>

            {{-- Author --}}
            <div class="px-4 mt-4 sm:mt-0">
                <x-admin.label for="author" value="{{ __('Author') }}" />
                <select id="author" name="author" wire:model="author"
                    class="disable-arrow block w-full h-10 mt-1 pt-2 px-3 text-left border-gray-300 rounded-md"
                >
                    <option value="">{{ __('Select author') }}</option>
                    @foreach ($authors as $id => $name)
                        <option value="{{$id}}">{{ $name }}</option>
                    @endforeach
                </select>

                <x-admin.input-error for="author" class="mt-2" />
            </div>
        </div>

        <!-- Tags -->
        <div class="px-4 mt-4">
            <x-admin.label for="tags" value="{{ __('Tags') }}" />
            <select id="tags" class="te-select" multiple data-te-select-init data-te-select-filter="true" data-te-select-placeholder="Selecciona los tags" wire:model.defer="tags">
                @foreach ($allTags as $id => $name)
                    <option value="{{ $id }}" {{ in_array($id, $post->tags->pluck('id')->toArray()) ? 'selected' : '' }}>{{ $name }}</option>
                @endforeach
            </select>
            <x-admin.input-error for="tags" class="mt-2" />
        </div>


        <!-- Summary -->
        <div class="px-4 mt-4">
            <x-admin.label for="summary" value="Summary" />
            <textarea id="summary" class="mt-1 focus:ring-purple-700 focus:purple-700 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md placeholder-gray-400"
                wire:model.defer="summary" rows="3" autocomplete="blog_summary">
            </textarea>
            <x-admin.input-error for="summary" class="mt-2" />
        </div>

        <!-- Content -->
        <div class="px-4 mt-4">
            <x-admin.label for="content" value="{{ __('Content') }}" class="mb-2" />
            <x-admin.tinymce-editor wire:model="content" placeholder="Write a nice post..." height="400px" />
        </div>

        <hr class="my-4">

        @include('livewire.blog.post.partial.images')

        <hr class="my-4">

        <!-- Featured image -->
        @if ($featured)
            <div class="m-4 sm:w-1/2">
                <img src="{{$featured->temporaryUrl()}}">
            </div>
        @else
            @if ($featured_url != '')
                <div class="m-4 sm:w-1/2">
                    <x-admin.label for="current_photo" value="{{ __('Current featured image') }}" />
                    <img src="{{$featured_url}}" class="mt-2">
                </div>
            @endif
        @endif

        <div class="m-4">
            <x-admin.label for="featured" value="{{ __('Upload new featured image') }}" />

            <input type="file" class="mt-2"
                name="featured" id="featured"
                wire:model="featured"
            >

            <x-admin.input-error for="featured" class="mt-2" />
        </div>

        <hr class="my-4">


        <!-- Featured image hover -->
        @if ($featured_hover)
            <div class="m-4 sm:w-1/2">
                <img src="{{$featured_hover->temporaryUrl()}}">
            </div>
        @else
            @if ($featured_hover_url != '')
                <div class="m-4 sm:w-1/2">
                    <x-admin.label for="current_photo_hover" value="{{ __('Current featured image hover') }}" />
                    <img src="{{$featured_hover_url}}" class="mt-2">
                </div>
            @endif
        @endif

        <div class="m-4">
            <x-admin.label for="featured_hover" value="{{ __('Upload new featured image hover') }}" />

            <input type="file" class="mt-2"
                   name="featured_hover" id="featured_hover"
                   wire:model="featured_hover"
            >

            <x-admin.input-error for="featured_hover" class="mt-2" />
        </div>

        <hr class="my-4">
    </x-slot>


    <x-slot name="actions">
        <x-admin.button wire:loading.attr="disabled">
            {{ $formButton }}
        </x-admin.button>
    </x-slot>
</x-admin.form-section>
