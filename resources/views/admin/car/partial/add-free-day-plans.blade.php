<x-admin.form-section submit="dummy">
    <x-slot name="title">
        {{ $formTitle }}
    </x-slot>

    <x-slot name="description">
        {{ $formDescription }}
    </x-slot>

    <x-slot name="form">
        <!-- Plans' dropdown -->
        <div class="px-4 mt-4 md:mt-0">
            <select id="plan" name="plan" wire:model="plan"
                class="disable-arrow block w-full h-10 pt-2 px-3 text-left border-gray-300 rounded-md font-medium"
            >
                <option value="">Select Plan</option>
                @foreach ($availablePlans as $availablePlan)
                    <option value="{{$availablePlan["id"]}}">{{ $availablePlan["name"] }}</option>
                @endforeach
            </select>
        </div>

        <!-- Add single plan -->
        <div class="px-4 mt-4 md:mt-0">
            <button class="inline-flex items-center px-4 py-2 h-10 bg-blue-700 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-white hover:border-blue-700 hover:text-blue-700 active:bg-white active:border-blue-700 active:text-blue-700 disabled:opacity-25 transition ease-in-out duration-150"
                type="button"
                wire:click="addPlan"
                {{$plan == '' ? 'disabled' : ''}}
            >
                Add plan
            </button>
        </div>

        <!-- Add all plans -->
        <div class="px-4 mt-4 md:mt-0">
            <button class="inline-flex items-center px-4 py-2 h-10 bg-blue-700 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-white hover:border-blue-700 hover:text-blue-700 active:bg-white active:border-blue-700 active:text-blue-700 disabled:opacity-25 transition ease-in-out duration-150"
                type="button"
                wire:click="addPlans"
            >
                Add all plans
            </button>
        </div>
    </x-slot>
</x-admin.form-section>
