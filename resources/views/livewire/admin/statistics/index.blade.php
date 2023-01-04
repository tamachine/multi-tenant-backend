<div id="statistics_container" class="flex flex-col p-4 sm:p-10">
    @include('livewire.admin.statistics.partial.filters')

    <div x-data="{ tab: 'general' }"
        class="mt-4 space-y-6"
    >
        <div class="border-b border-gray-200">
            <ul class="flex flex-wrap -mb-px text-sm font-medium text-center text-gray-500">
                <li class="mr-2">
                    <a href="javascript:void(0);"
                        @click.prevent="tab='general'"
                        class="inline-flex p-4 rounded-t-lg border-b-2"
                        :class="tab == 'general' ? 'text-blue-600 border-blue-600' : 'border-transparent hover:text-gray-600 hover:border-gray-300'"
                    >
                        <svg aria-hidden="true" fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"
                            class="mr-2 w-5 h-5"
                            :class="tab == 'general' ? 'text-blue-600' : 'text-gray-400'"
                        >
                            <path fill-rule="evenodd" d="M2.25 2.25a.75.75 0 000 1.5H3v10.5a3 3 0 003 3h1.21l-1.172 3.513a.75.75 0 001.424.474l.329-.987h8.418l.33.987a.75.75 0 001.422-.474l-1.17-3.513H18a3 3 0 003-3V3.75h.75a.75.75 0 000-1.5H2.25zm6.04 16.5l.5-1.5h6.42l.5 1.5H8.29zm7.46-12a.75.75 0 00-1.5 0v6a.75.75 0 001.5 0v-6zm-3 2.25a.75.75 0 00-1.5 0v3.75a.75.75 0 001.5 0V9zm-3 2.25a.75.75 0 00-1.5 0v1.5a.75.75 0 001.5 0v-1.5z" clip-rule="evenodd" />
                        </svg>

                        General
                    </a>
                </li>

                <li class="mr-2">
                    <a href="javascript:void(0);"
                        @click.prevent="tab='vendor'"
                        class="inline-flex p-4 rounded-t-lg border-b-2"
                        :class="tab == 'vendor' ? 'text-blue-600 border-blue-600' : 'border-transparent hover:text-gray-600 hover:border-gray-300'"
                    >
                        <svg aria-hidden="true" fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"
                            class="mr-2 w-5 h-5"
                            :class="tab == 'vendor' ? 'text-blue-600' : 'text-gray-400'"
                        >
                            <path d="M19.006 3.705a.75.75 0 00-.512-1.41L6 6.838V3a.75.75 0 00-.75-.75h-1.5A.75.75 0 003 3v4.93l-1.006.365a.75.75 0 00.512 1.41l16.5-6z" />
                            <path fill-rule="evenodd" d="M3.019 11.115L18 5.667V9.09l4.006 1.456a.75.75 0 11-.512 1.41l-.494-.18v8.475h.75a.75.75 0 010 1.5H2.25a.75.75 0 010-1.5H3v-9.129l.019-.006zM18 20.25v-9.565l1.5.545v9.02H18zm-9-6a.75.75 0 00-.75.75v4.5c0 .414.336.75.75.75h3a.75.75 0 00.75-.75V15a.75.75 0 00-.75-.75H9z" clip-rule="evenodd" />
                        </svg>

                        Vendor
                    </a>
                </li>

                <li class="mr-2">
                    <a href="javascript:void(0);"
                        @click.prevent="tab='cars'"
                        class="inline-flex p-4 rounded-t-lg border-b-2"
                        :class="tab == 'cars' ? 'text-blue-600 border-blue-600' : 'border-transparent hover:text-gray-600 hover:border-gray-300'"
                    >
                        <svg aria-hidden="true" fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"
                            class="mr-2 w-5 h-5"
                            :class="tab == 'cars' ? 'text-blue-600' : 'text-gray-400'"
                        >
                            <path d="M23.5 7c.276 0 .5.224.5.5v.511c0 .793-.926.989-1.616.989l-1.086-2h2.202zm-1.441 3.506c.639 1.186.946 2.252.946 3.666 0 1.37-.397 2.533-1.005 3.981v1.847c0 .552-.448 1-1 1h-1.5c-.552 0-1-.448-1-1v-1h-13v1c0 .552-.448 1-1 1h-1.5c-.552 0-1-.448-1-1v-1.847c-.608-1.448-1.005-2.611-1.005-3.981 0-1.414.307-2.48.946-3.666.829-1.537 1.851-3.453 2.93-5.252.828-1.382 1.262-1.707 2.278-1.889 1.532-.275 2.918-.365 4.851-.365s3.319.09 4.851.365c1.016.182 1.45.507 2.278 1.889 1.079 1.799 2.101 3.715 2.93 5.252zm-16.059 2.994c0-.828-.672-1.5-1.5-1.5s-1.5.672-1.5 1.5.672 1.5 1.5 1.5 1.5-.672 1.5-1.5zm10 1c0-.276-.224-.5-.5-.5h-7c-.276 0-.5.224-.5.5s.224.5.5.5h7c.276 0 .5-.224.5-.5zm2.941-5.527s-.74-1.826-1.631-3.142c-.202-.298-.515-.502-.869-.566-1.511-.272-2.835-.359-4.441-.359s-2.93.087-4.441.359c-.354.063-.667.267-.869.566-.891 1.315-1.631 3.142-1.631 3.142 1.64.313 4.309.497 6.941.497s5.301-.184 6.941-.497zm2.059 4.527c0-.828-.672-1.5-1.5-1.5s-1.5.672-1.5 1.5.672 1.5 1.5 1.5 1.5-.672 1.5-1.5zm-18.298-6.5h-2.202c-.276 0-.5.224-.5.5v.511c0 .793.926.989 1.616.989l1.086-2z"/>
                        </svg>

                        Cars
                    </a>
                </li>

                <li class="mr-2">
                    <a href="javascript:void(0);"
                        @click.prevent="tab='customers'"
                        class="inline-flex p-4 rounded-t-lg border-b-2"
                        :class="tab == 'customers' ? 'text-blue-600 border-blue-600' : 'border-transparent hover:text-gray-600 hover:border-gray-300'"
                    >
                        <svg aria-hidden="true" fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"
                            class="mr-2 w-5 h-5"
                            :class="tab == 'customers' ? 'text-blue-600' : 'text-gray-400'"
                        >
                            <path d="M4.5 6.375a4.125 4.125 0 118.25 0 4.125 4.125 0 01-8.25 0zM14.25 8.625a3.375 3.375 0 116.75 0 3.375 3.375 0 01-6.75 0zM1.5 19.125a7.125 7.125 0 0114.25 0v.003l-.001.119a.75.75 0 01-.363.63 13.067 13.067 0 01-6.761 1.873c-2.472 0-4.786-.684-6.76-1.873a.75.75 0 01-.364-.63l-.001-.122zM17.25 19.128l-.001.144a2.25 2.25 0 01-.233.96 10.088 10.088 0 005.06-1.01.75.75 0 00.42-.643 4.875 4.875 0 00-6.957-4.611 8.586 8.586 0 011.71 5.157v.003z" />
                        </svg>

                        Customers
                    </a>
                </li>


                <li class="mr-2">
                    <a href="javascript:void(0);"
                        @click.prevent="tab='extras'"
                        class="inline-flex p-4 rounded-t-lg border-b-2"
                        :class="tab == 'extras' ? 'text-blue-600 border-blue-600' : 'border-transparent hover:text-gray-600 hover:border-gray-300'"
                    >
                        <svg aria-hidden="true" fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"
                            class="mr-2 w-5 h-5"
                            :class="tab == 'extras' ? 'text-blue-600' : 'text-gray-400'"
                        >
                            <path d="M6 3a3 3 0 00-3 3v2.25a3 3 0 003 3h2.25a3 3 0 003-3V6a3 3 0 00-3-3H6zM15.75 3a3 3 0 00-3 3v2.25a3 3 0 003 3H18a3 3 0 003-3V6a3 3 0 00-3-3h-2.25zM6 12.75a3 3 0 00-3 3V18a3 3 0 003 3h2.25a3 3 0 003-3v-2.25a3 3 0 00-3-3H6zM17.625 13.5a.75.75 0 00-1.5 0v2.625H13.5a.75.75 0 000 1.5h2.625v2.625a.75.75 0 001.5 0v-2.625h2.625a.75.75 0 000-1.5h-2.625V13.5z" />
                        </svg>

                        Extras
                    </a>
                </li>
            </ul>
        </div>

        <div x-show="tab == 'general'" style="display:none;">
            @include('livewire.admin.statistics.partial.general')
        </div>

        <div x-show="tab == 'vendor'" style="display:none;">
            @include('livewire.admin.statistics.partial.vendor')
        </div>

        <div x-show="tab == 'cars'" style="display:none;">
            @include('livewire.admin.statistics.partial.cars')
        </div>

        <div x-show="tab == 'customers'" style="display:none;">
            @include('livewire.admin.statistics.partial.customers')
        </div>

        <div x-show="tab == 'extras'" style="display:none;">
            @include('livewire.admin.statistics.partial.extras')
        </div>
    </div>
</div>

@push('scripts')
<div class="wire:ignore">
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script>
        google.charts.load('current', {packages: ['corechart', 'line', 'bar']});
        let container = document.getElementById('statistics_container');
    </script>
</div>

@include('livewire.admin.statistics.partial.scripts-general')
@include('livewire.admin.statistics.partial.scripts-cars')
@include('livewire.admin.statistics.partial.scripts-customers')
@include('livewire.admin.statistics.partial.scripts-extras')
@endpush
