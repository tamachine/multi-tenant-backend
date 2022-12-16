<x-admin-layout>
    <x-slot name="title">
        {{ __('Affiliate Panel') }}
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
                        <path fill-rule="evenodd" d="M4.5 3.75a3 3 0 00-3 3v10.5a3 3 0 003 3h15a3 3 0 003-3V6.75a3 3 0 00-3-3h-15zm4.125 3a2.25 2.25 0 100 4.5 2.25 2.25 0 000-4.5zm-3.873 8.703a4.126 4.126 0 017.746 0 .75.75 0 01-.351.92 7.47 7.47 0 01-3.522.877 7.47 7.47 0 01-3.522-.877.75.75 0 01-.351-.92zM15 8.25a.75.75 0 000 1.5h3.75a.75.75 0 000-1.5H15zM14.25 12a.75.75 0 01.75-.75h3.75a.75.75 0 010 1.5H15a.75.75 0 01-.75-.75zm.75 2.25a.75.75 0 000 1.5h3.75a.75.75 0 000-1.5H15z" clip-rule="evenodd" />
                    </svg>

                    Basic details
                </a>
            </li>

            <li class="mr-2">
                <a href="javascript:void(0);"
                    @click.prevent="tab='statistics'"
                    class="inline-flex p-4 rounded-t-lg border-b-2"
                    :class="tab == 'statistics' ? 'text-blue-600 border-blue-600' : 'border-transparent hover:text-gray-600 hover:border-gray-300'"
                >
                    <svg aria-hidden="true" fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"
                        class="mr-2 w-5 h-5"
                        :class="tab == 'statistics' ? 'text-blue-600' : 'text-gray-400'"
                    >
                        <path fill-rule="evenodd" d="M2.25 2.25a.75.75 0 000 1.5H3v10.5a3 3 0 003 3h1.21l-1.172 3.513a.75.75 0 001.424.474l.329-.987h8.418l.33.987a.75.75 0 001.422-.474l-1.17-3.513H18a3 3 0 003-3V3.75h.75a.75.75 0 000-1.5H2.25zm6.04 16.5l.5-1.5h6.42l.5 1.5H8.29zm7.46-12a.75.75 0 00-1.5 0v6a.75.75 0 001.5 0v-6zm-3 2.25a.75.75 0 00-1.5 0v3.75a.75.75 0 001.5 0V9zm-3 2.25a.75.75 0 00-1.5 0v1.5a.75.75 0 001.5 0v-1.5z" clip-rule="evenodd" />
                    </svg>

                    Statistics
                </a>
            </li>

            <li class="mr-2">
                <a href="javascript:void(0);"
                    @click.prevent="tab='bookings'"
                    class="inline-flex p-4 rounded-t-lg border-b-2"
                    :class="tab == 'bookings' ? 'text-blue-600 border-blue-600' : 'border-transparent hover:text-gray-600 hover:border-gray-300'"
                >
                    <svg aria-hidden="true" fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"
                        class="mr-2 w-5 h-5"
                        :class="tab == 'bookings' ? 'text-blue-600' : 'text-gray-400'"
                    >
                        <path d="M12.75 12.75a.75.75 0 11-1.5 0 .75.75 0 011.5 0zM7.5 15.75a.75.75 0 100-1.5.75.75 0 000 1.5zM8.25 17.25a.75.75 0 11-1.5 0 .75.75 0 011.5 0zM9.75 15.75a.75.75 0 100-1.5.75.75 0 000 1.5zM10.5 17.25a.75.75 0 11-1.5 0 .75.75 0 011.5 0zM12 15.75a.75.75 0 100-1.5.75.75 0 000 1.5zM12.75 17.25a.75.75 0 11-1.5 0 .75.75 0 011.5 0zM14.25 15.75a.75.75 0 100-1.5.75.75 0 000 1.5zM15 17.25a.75.75 0 11-1.5 0 .75.75 0 011.5 0zM16.5 15.75a.75.75 0 100-1.5.75.75 0 000 1.5zM15 12.75a.75.75 0 11-1.5 0 .75.75 0 011.5 0zM16.5 13.5a.75.75 0 100-1.5.75.75 0 000 1.5z" />
                        <path fill-rule="evenodd" d="M6.75 2.25A.75.75 0 017.5 3v1.5h9V3A.75.75 0 0118 3v1.5h.75a3 3 0 013 3v11.25a3 3 0 01-3 3H5.25a3 3 0 01-3-3V7.5a3 3 0 013-3H6V3a.75.75 0 01.75-.75zm13.5 9a1.5 1.5 0 00-1.5-1.5H5.25a1.5 1.5 0 00-1.5 1.5v7.5a1.5 1.5 0 001.5 1.5h13.5a1.5 1.5 0 001.5-1.5v-7.5z" clip-rule="evenodd" />
                    </svg>

                    Bookings
                </a>
            </li>
        </ul>
    </div>

    <div x-show="tab == 'basic'" style="display:none;">
        <livewire:affiliate.basic :affiliate="$affiliate" />
    </div>

    <div x-show="tab == 'statistics'" style="display:none;">
        <livewire:affiliate.statistics :affiliate="$affiliate" />
    </div>

    <div x-show="tab == 'bookings'" style="display:none;">
        <livewire:affiliate.bookings :affiliate="$affiliate" />
    </div>


</x-admin-layout>
