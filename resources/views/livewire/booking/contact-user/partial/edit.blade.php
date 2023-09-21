<x-admin.form-section submit="saveContact" formClass="block">
    <x-slot name="title">
        {{ $formTitle }}
    </x-slot>

    <x-slot name="description">
        {{ $formDescription }}
    </x-slot>

    <x-slot name="form">

        <!-- Date -->
        <div class="px-4 ">
            <x-admin.label for="created_at" value="{{ __('Date') }}" />
            <x-admin.input id="created_at" type="text" class="mt-1 block w-full" maxlength="255" wire:model.defer="created_at" autocomplete="created date" disabled/>
            <x-admin.input-error for="created_at" class="mt-2" />
        </div> 
        
        <!-- Name -->
        <div class="px-4 mt-4">
            <x-admin.label for="name" value="{{ __('Name') }}" />
            <x-admin.input id="name" type="text" class="mt-1 block w-full" maxlength="255" wire:model.defer="name" autocomplete="name" />
            <x-admin.input-error for="name" class="mt-2" />
        </div>

        <!-- Name -->
        <div class="px-4 mt-4">
            <x-admin.label for="email" value="{{ __('Email') }}" />
            <x-admin.input id="email" type="text" class="mt-1 block w-full" maxlength="255" wire:model.defer="email" autocomplete="email" />
            <x-admin.input-error for="email" class="mt-2" />
        </div>

        <!-- Type -->
        <div class="px-4 mt-4">
            <x-admin.label for="type" value="{{ __('Type') }}" />
            <x-admin.input id="type" type="text" class="mt-1 block w-full" maxlength="255" wire:model.defer="type" autocomplete="type" />
            <x-admin.input-error for="type" class="mt-2" />
        </div> 
 
        <!-- Subject -->
        <div class="px-4 mt-4">
            <x-admin.label for="subject" value="{{ __('Subject') }}" />
            <x-admin.input id="subject" type="text" class="mt-1 block w-full" maxlength="255" wire:model.defer="subject" autocomplete="subject" />
            <x-admin.input-error for="subject" class="mt-2" />
        </div>        

        <!-- Short Bio -->
        <div class="px-4 mt-4">
            <x-admin.label for="message" value="{{ __('Message') }}" />
            <textarea id="message" class="mt-1 focus:ring-purple-700 focus:purple-700 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md placeholder-gray-400"
                wire:model.defer="message" rows="3" autocomplete="message">
            </textarea>
        </div>
       
    </x-slot>

    <x-slot name="actions">
        <x-admin.button wire:loading.attr="disabled">
            {{ $formButton }}
        </x-admin.button>
    </x-slot>
</x-admin.form-section>