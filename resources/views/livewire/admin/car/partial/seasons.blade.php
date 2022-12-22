<x-admin.form-section submit="saveTranslations" formClass="block">
    <x-slot name="title">
        {{ $formTitle }}
    </x-slot>

    <x-slot name="description">
        {{ $formDescription }}
    </x-slot>

    <x-slot name="form">
        @if (count($currentSeasons))
            @foreach($currentSeasons as $key => $season)
                Soon

                <hr class="my-8 px-4">
            @endforeach
        @else
            <div class="bg-white shadow mt-8 md:mt-0 px-4 py-5 sm:rounded-lg sm:p-6">
                <h5>This car has no season price plans yet.</h5>
            </div>
        @endif
    </x-slot>
</x-admin.form-section>
