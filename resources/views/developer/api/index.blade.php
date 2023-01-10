<x-admin-layout>
    <x-slot name="title">
        {{ __('API docs') }}
    </x-slot>        
    <div class="flex flex-col p-4 sm:p-10">
        <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
            <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">            
                <div class="p-4 shadow overflow-hidden border-b border-gray-200 sm:rounded-lg bg-white">
                    <p>API docs are generated automatically from code using <a class="underline" href="https://github.com/rakutentech/laravel-request-docs" target="_blank"> larvel request-docs </a> package</p>
                    <p class="pt-2">Click <a class="underline" href="{{url(config('request-docs.url'))}}" target="_blank">here</a> to access.</p>                    
                </div>
                
            </div>
        </div>
    </div>
</x-admin-layout>
