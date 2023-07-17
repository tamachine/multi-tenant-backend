<div>
    <x-admin.form-section submit="saveFeatures" formClass="block">
        <x-slot name="title">
            Edit features
        </x-slot>

        <x-slot name="description">
            Edit the extra's name and description in other languages
        </x-slot>

        <x-slot name="form">
            @foreach($allFeatures as $feature)
            <div class="px-4 mt-4">
                <label class="inline-flex items-center">
                    <x-admin.checkbox wire:model.defer="insuranceFeatures" value="{{ $feature->hashid }}" class="w-10 h-10 mt-1" />
                    <span class="ml-4">{{ $feature->name }}</span>
                </label>
            </div>
            @endforeach

        </x-slot>

        <x-slot name="actions">
            <x-admin.button wire:loading.attr="disabled">
                Save features
            </x-admin.button>
        </x-slot>
    </x-admin.form-section>
</div>
