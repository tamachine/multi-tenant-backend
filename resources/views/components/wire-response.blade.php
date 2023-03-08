@if (session()->has('message'))
    <div x-data="{ openResponse: true }"
        x-show="openResponse"
        class="wire-response z-50 absolute top-10 left-1/4 w-1/2 shadow sm:rounded-lg sm:p-6 flex justify-between {{ session('status') == 'success' ? 'bg-green-700' : 'bg-red-700' }}"
    >
        <div class="text-md font-medium text-white">
            <p>{{ session('message') }}</p>
        </div>

        <div class="text-md font-medium text-white">
            <button class="pointer" @click="openResponse = !openResponse">X</button>
        </div>
    </div>
@endif

<div x-data="{ openSuccess: false, message: '' }"
    x-on:open-success.window="openSuccess = true; message = event.detail.message; setTimeout(() => openSuccess = false, 5000)"
    x-show="openSuccess"
    class="wire-response z-50 absolute top-10 left-1/4 w-1/2 shadow sm:rounded-lg sm:p-6 flex justify-between bg-green-700"
    x-cloak
>
    <div class="text-md font-medium text-white">
        <p x-text="message"></p>
    </div>

    <div class="text-md font-medium text-white">
        <button class="pointer" @click="openSuccess = !openSuccess">X</button>
    </div>
</div>

<div x-data="{ openError: false, message: '' }"
    x-on:open-error.window="openError = true; message = event.detail.message; setTimeout(() => openError = false, 5000)"
    x-show="openError"
    class="wire-response z-50 absolute top-10 left-1/4 w-1/2 shadow sm:rounded-lg sm:p-6 flex justify-between bg-red-700"
    x-cloak
>
    <div class="text-md font-medium text-white">
        <p x-text="message"></p>
    </div>

    <div class="text-md font-medium text-white">
        <button class="pointer" @click="openError = !openError">X</button>
    </div>
</div>
