<div>
    <div class="md:grid md:grid-cols-2">
        <!-- Name -->
        <div class="mt-4 px-4">
            <x-label for="name" class="text-black-ci" value="{{ __('contact.name') }}" />
            <x-input id="name" type="text" class="w-full mt-1 block border-gray-200" maxlength="255" wire:model.defer="name" autocomplete="name" />
            <x-input-error for="name" class="mt-2" />
        </div>

        <!-- Email -->
        <div class="mt-4 px-4">
            <x-label for="email" class="text-black-ci" value="{{ __('contact.email') }}" />
            <x-input id="email" type="email" class="w-full mt-1 block border-gray-200" maxlength="255" wire:model.defer="email" autocomplete="email" />
            <x-input-error for="email" class="mt-2" />
        </div>

        <!-- Subject -->
        <div class="mt-4 px-4">
            <x-label for="subject" class="text-black-ci" value="{{ __('contact.subject') }}" />
            <x-input id="subject" type="text" class="w-full mt-1 block border-gray-200" maxlength="255" wire:model.defer="subject" autocomplete="subject" />
            <x-input-error for="subject" class="mt-2" />
        </div>

        <!-- Enquiry Type -->
        <div class="mt-4 px-4">
            <x-label for="type" class="text-black-ci" value="{{ __('contact.enquiry_type') }}" />
            <select id="type" name="type" wire:model="type"
                class="disable-arrow block w-full h-10 mt-1 pt-2 px-3 text-left border-gray-200 rounded-md"
            >
                @foreach(config('contact.enquiry_types') as $enquiryType)
                    <option value="{{$enquiryType}}">{{ __('contact.enquiry_' . $enquiryType) }}</option>
                @endforeach
            </select>
            <x-input-error for="type" class="mt-2" />
        </div>
    </div>

    <!-- Message -->
    <div class="w-full px-4 mt-4">
        <x-label for="message" class="text-black-ci" value="{{ __('contact.message') }}" />
        <textarea id="message" class="mt-1 fblock w-full shadow-sm sm:text-sm border-gray-200 rounded-md placeholder-gray-400"
            wire:model.defer="message" rows="5">
        </textarea>
        <x-input-error for="message" class="mt-2" />
    </div>

    <!-- Submit -->
    <div class="w-full px-4 mt-4">
        <button class="w-48 rounded-lg text-white font-sans-bold py-4 text-lg bg-yellow-ci hover:bg-black-ci disabled:bg-[#B1B5C3]"
            wire:click="send"
        >
            {{ __('contact.submit') }}
        </button>
    </div>
</div>
