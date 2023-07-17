<x-admin-layout>
    <x-slot name="title">
        {{ __('Edit Extra:') }} {{$extraName}}
    </x-slot>

    <x-slot name="breadcrumbs">
        <x-admin.breadcrumbs :crumbs="$crumbs" />
    </x-slot>

    <x-slot name="backTo">
        <x-admin.back-to route="{{$action->get('route')}}" title="{{$action->get('title')}}" />
    </x-slot>

    <div x-data="{ tab: '{{$tab}}' }"
        class="space-y-6 p-10"
    >
        <div class="border-b border-gray-200">
            <ul class="flex flex-wrap -mb-px text-sm font-medium text-center text-gray-500">
                <li class="mr-2">
                    <a href="javascript:void(0);"
                        @click.prevent="tab='basic'"
                        class="inline-flex p-4 rounded-t-lg border-b-2"
                        :class="tab == 'basic' ? 'text-blue-600 border-blue-600' : 'border-transparent hover:text-gray-600 hover:border-gray-300'"
                    >
                        <svg aria-hidden="true" fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"
                            class="mr-2 w-5 h-5"
                            :class="tab == 'basic' ? 'text-blue-600' : 'text-gray-400'"
                        >
                            <path d="M23.5 7c.276 0 .5.224.5.5v.511c0 .793-.926.989-1.616.989l-1.086-2h2.202zm-1.441 3.506c.639 1.186.946 2.252.946 3.666 0 1.37-.397 2.533-1.005 3.981v1.847c0 .552-.448 1-1 1h-1.5c-.552 0-1-.448-1-1v-1h-13v1c0 .552-.448 1-1 1h-1.5c-.552 0-1-.448-1-1v-1.847c-.608-1.448-1.005-2.611-1.005-3.981 0-1.414.307-2.48.946-3.666.829-1.537 1.851-3.453 2.93-5.252.828-1.382 1.262-1.707 2.278-1.889 1.532-.275 2.918-.365 4.851-.365s3.319.09 4.851.365c1.016.182 1.45.507 2.278 1.889 1.079 1.799 2.101 3.715 2.93 5.252zm-16.059 2.994c0-.828-.672-1.5-1.5-1.5s-1.5.672-1.5 1.5.672 1.5 1.5 1.5 1.5-.672 1.5-1.5zm10 1c0-.276-.224-.5-.5-.5h-7c-.276 0-.5.224-.5.5s.224.5.5.5h7c.276 0 .5-.224.5-.5zm2.941-5.527s-.74-1.826-1.631-3.142c-.202-.298-.515-.502-.869-.566-1.511-.272-2.835-.359-4.441-.359s-2.93.087-4.441.359c-.354.063-.667.267-.869.566-.891 1.315-1.631 3.142-1.631 3.142 1.64.313 4.309.497 6.941.497s5.301-.184 6.941-.497zm2.059 4.527c0-.828-.672-1.5-1.5-1.5s-1.5.672-1.5 1.5.672 1.5 1.5 1.5 1.5-.672 1.5-1.5zm-18.298-6.5h-2.202c-.276 0-.5.224-.5.5v.511c0 .793.926.989 1.616.989l1.086-2z"/>
                        </svg>

                        Basic details
                    </a>
                </li>

                <li class="mr-2">
                    <a href="javascript:void(0);"
                        @click.prevent="tab='translations'"
                        class="inline-flex p-4 rounded-t-lg border-b-2"
                        :class="tab == 'translations' ? 'text-blue-600 border-blue-600' : 'border-transparent hover:text-gray-600 hover:border-gray-300'"
                    >
                        <svg aria-hidden="true" fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"
                            class="mr-2 w-5 h-5"
                            :class="tab == 'translations' ? 'text-blue-600' : 'text-gray-400'"
                        >
                            <path fill-rule="evenodd" d="M9 2.25a.75.75 0 01.75.75v1.506a49.38 49.38 0 015.343.371.75.75 0 11-.186 1.489c-.66-.083-1.323-.151-1.99-.206a18.67 18.67 0 01-2.969 6.323c.317.384.65.753.998 1.107a.75.75 0 11-1.07 1.052A18.902 18.902 0 019 13.687a18.823 18.823 0 01-5.656 4.482.75.75 0 11-.688-1.333 17.323 17.323 0 005.396-4.353A18.72 18.72 0 015.89 8.598a.75.75 0 011.388-.568A17.21 17.21 0 009 11.224a17.17 17.17 0 002.391-5.165 48.038 48.038 0 00-8.298.307.75.75 0 01-.186-1.489 49.159 49.159 0 015.343-.371V3A.75.75 0 019 2.25zM15.75 9a.75.75 0 01.68.433l5.25 11.25a.75.75 0 01-1.36.634l-1.198-2.567h-6.744l-1.198 2.567a.75.75 0 01-1.36-.634l5.25-11.25A.75.75 0 0115.75 9zm-2.672 8.25h5.344l-2.672-5.726-2.672 5.726z" clip-rule="evenodd" />
                        </svg>

                        Translations
                    </a>
                </li>

                <li class="mr-2">
                    <a href="javascript:void(0);"
                        @click.prevent="tab='image'"
                        class="inline-flex p-4 rounded-t-lg border-b-2"
                        :class="tab == 'image' ? 'text-blue-600 border-blue-600' : 'border-transparent hover:text-gray-600 hover:border-gray-300'"
                    >
                        <svg aria-hidden="true" fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"
                            class="mr-2 w-5 h-5"
                            :class="tab == 'image' ? 'text-blue-600' : 'text-gray-400'"
                        >
                            <path fill-rule="evenodd" d="M1.5 6a2.25 2.25 0 012.25-2.25h16.5A2.25 2.25 0 0122.5 6v12a2.25 2.25 0 01-2.25 2.25H3.75A2.25 2.25 0 011.5 18V6zM3 16.06V18c0 .414.336.75.75.75h16.5A.75.75 0 0021 18v-1.94l-2.69-2.689a1.5 1.5 0 00-2.12 0l-.88.879.97.97a.75.75 0 11-1.06 1.06l-5.16-5.159a1.5 1.5 0 00-2.12 0L3 16.061zm10.125-7.81a1.125 1.125 0 112.25 0 1.125 1.125 0 01-2.25 0z" clip-rule="evenodd" />
                        </svg>

                        Image
                    </a>
                </li>

                @if($extra->is_insurance)
                <li class="mr-2">
                    <a href="javascript:void(0);"
                        @click.prevent="tab='features'"
                        class="inline-flex p-4 rounded-t-lg border-b-2"
                        :class="tab == 'features' ? 'text-blue-600 border-blue-600' : 'border-transparent hover:text-gray-600 hover:border-gray-300'"
                    >
                        

                        <svg 
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" 
                            class="mr-2 w-5 h-5"
                            :class="tab == 'features' ? 'text-blue-600' : 'text-gray-400'">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75m-3-7.036A11.959 11.959 0 013.598 6 11.99 11.99 0 003 9.749c0 5.592 3.824 10.29 9 11.623 5.176-1.332 9-6.03 9-11.622 0-1.31-.21-2.571-.598-3.751h-.152c-3.196 0-6.1-1.248-8.25-3.285z" />
                        </svg>

                        Features
                    </a>
                </li>
                @endif
            </ul>
        </div>

        <div x-show="tab == 'basic'" style="display:none;">
            <livewire:admin.extra.edit :extra="$extra" />
        </div>

        <div x-show="tab == 'translations'" style="display:none;">
            <livewire:admin.extra.translations :extra="$extra" />
        </div>

        <div x-show="tab == 'image'" style="display:none;">
            <livewire:admin.extra.image :extra="$extra" />
        </div>

        @if($extra->is_insurance)
        <div x-show="tab == 'features'" style="display:none;">
            <livewire:admin.extra.features :insurance="$extra->insurance" />
        </div>
        @endif
    </div>
</x-admin-layout>
