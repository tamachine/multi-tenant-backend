<div {{ $attributes->merge(['class' => 'bg-white shadow px-4 py-5 sm:rounded-lg sm:p-6']) }}>
    <div class="lg:flex">
        <x-admin.section-title>
            <x-slot name="title">{{ $title }}</x-slot>
            <x-slot name="description">{{ $description }}</x-slot>
        </x-admin.section-title>

        <div class="lg:w-3/4 mt-8 lg:mt-0">
            {{ $section }}
        </div>
    </div>
</div>
