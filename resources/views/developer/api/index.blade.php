<x-admin-layout>
    <x-slot name="title">
        {{ __('API docs') }}
    </x-slot>        
    <div class="flex flex-col p-4 sm:p-10">
        <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
            <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">            
                <div class="p-4 shadow overflow-hidden border-b border-gray-200 sm:rounded-lg bg-white">
                    <div>API docs are generated automatically from code using <a class="underline" href="https://github.com/rakutentech/laravel-request-docs" target="_blank"> larvel request-docs </a> package.</div>
                    <div class="pt-2">
                        <span class="text-red-400">IMPORTANT!</span><br>
                        <ul class="list-decimal pl-4">
                            <li>API requires a token for third party apps (not api docs case). For the same domain (docs case) token is not needed. <br>Please, <strong>provide a token</strong> in your third party apps in order to request endpoints.</li>
                            <li>Make sure you are serving the API docs in <strong>{{config('request-docs.open_api.server_url')}}</strong> to avoid CORS issues.</li>
                        </ul>
                    </div> 
                    <div class="pt-2">Click <a class="underline" href="{{url(config('request-docs.url'))}}" target="_blank">here</a> to access.</div> 
                    
                </div>
                
            </div>
        </div>
    </div>
    
</x-admin-layout>

