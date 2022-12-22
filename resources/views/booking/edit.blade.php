<x-admin-layout>
    <x-slot name="title">
        {{ $booking->order_id }}
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
                            <path fill-rule="evenodd" d="M5.625 1.5c-1.036 0-1.875.84-1.875 1.875v17.25c0 1.035.84 1.875 1.875 1.875h12.75c1.035 0 1.875-.84 1.875-1.875V12.75A3.75 3.75 0 0016.5 9h-1.875a1.875 1.875 0 01-1.875-1.875V5.25A3.75 3.75 0 009 1.5H5.625zM7.5 15a.75.75 0 01.75-.75h7.5a.75.75 0 010 1.5h-7.5A.75.75 0 017.5 15zm.75 2.25a.75.75 0 000 1.5H12a.75.75 0 000-1.5H8.25z" clip-rule="evenodd" />
                            <path d="M12.971 1.816A5.23 5.23 0 0114.25 5.25v1.875c0 .207.168.375.375.375H16.5a5.23 5.23 0 013.434 1.279 9.768 9.768 0 00-6.963-6.963z" />
                        </svg>

                        Booking Information
                    </a>
                </li>

                @if ($booking->is_caren)
                    <li class="mr-2">
                        <a href="javascript:void(0);"
                            @click.prevent="tab='caren'"
                            class="inline-flex p-4 rounded-t-lg border-b-2"
                            :class="tab == 'caren' ? 'text-blue-600 border-blue-600' : 'border-transparent hover:text-gray-600 hover:border-gray-300'"
                        >
                            <svg aria-hidden="true" fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"
                                class="mr-2 w-5 h-5"
                                :class="tab == ');"' ? 'text-blue-600' : 'text-gray-400'"
                            >
                                <path d="M5.507 4.048A3 3 0 017.785 3h8.43a3 3 0 012.278 1.048l1.722 2.008A4.533 4.533 0 0019.5 6h-15c-.243 0-.482.02-.715.056l1.722-2.008z" />
                                <path fill-rule="evenodd" d="M1.5 10.5a3 3 0 013-3h15a3 3 0 110 6h-15a3 3 0 01-3-3zm15 0a.75.75 0 11-1.5 0 .75.75 0 011.5 0zm2.25.75a.75.75 0 100-1.5.75.75 0 000 1.5zM4.5 15a3 3 0 100 6h15a3 3 0 100-6h-15zm11.25 3.75a.75.75 0 100-1.5.75.75 0 000 1.5zM19.5 18a.75.75 0 11-1.5 0 .75.75 0 011.5 0z" clip-rule="evenodd" />
                            </svg>

                            Caren info
                        </a>
                    </li>
                @endif

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

                <li class="mr-2">
                    <a href="javascript:void(0);"
                        @click.prevent="tab='customer'"
                        class="inline-flex p-4 rounded-t-lg border-b-2"
                        :class="tab == 'customer' ? 'text-blue-600 border-blue-600' : 'border-transparent hover:text-gray-600 hover:border-gray-300'"
                    >
                        <svg aria-hidden="true" fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"
                            class="mr-2 w-5 h-5"
                            :class="tab == 'customer' ? 'text-blue-600' : 'text-gray-400'"
                        >
                            <path fill-rule="evenodd" d="M7.5 6a4.5 4.5 0 119 0 4.5 4.5 0 01-9 0zM3.751 20.105a8.25 8.25 0 0116.498 0 .75.75 0 01-.437.695A18.683 18.683 0 0112 22.5c-2.786 0-5.433-.608-7.812-1.7a.75.75 0 01-.437-.695z" clip-rule="evenodd" />
                        </svg>

                        Customer
                    </a>
                </li>

                <li class="mr-2">
                    <a href="javascript:void(0);"
                        @click.prevent="tab='affiliate'"
                        class="inline-flex p-4 rounded-t-lg border-b-2"
                        :class="tab == 'affiliate' ? 'text-blue-600 border-blue-600' : 'border-transparent hover:text-gray-600 hover:border-gray-300'"
                    >
                        <svg aria-hidden="true" fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"
                            class="mr-2 w-5 h-5"
                            :class="tab == 'affiliate' ? 'text-blue-600' : 'text-gray-400'"
                        >
                            <path fill-rule="evenodd" d="M4.5 3.75a3 3 0 00-3 3v10.5a3 3 0 003 3h15a3 3 0 003-3V6.75a3 3 0 00-3-3h-15zm4.125 3a2.25 2.25 0 100 4.5 2.25 2.25 0 000-4.5zm-3.873 8.703a4.126 4.126 0 017.746 0 .75.75 0 01-.351.92 7.47 7.47 0 01-3.522.877 7.47 7.47 0 01-3.522-.877.75.75 0 01-.351-.92zM15 8.25a.75.75 0 000 1.5h3.75a.75.75 0 000-1.5H15zM14.25 12a.75.75 0 01.75-.75h3.75a.75.75 0 010 1.5H15a.75.75 0 01-.75-.75zm.75 2.25a.75.75 0 000 1.5h3.75a.75.75 0 000-1.5H15z" clip-rule="evenodd" />
                        </svg>

                        Affiliate
                    </a>
                </li>

                <li class="mr-2">
                    <a href="javascript:void(0);"
                        @click.prevent="tab='log'"
                        class="inline-flex p-4 rounded-t-lg border-b-2"
                        :class="tab == 'log' ? 'text-blue-600 border-blue-600' : 'border-transparent hover:text-gray-600 hover:border-gray-300'"
                    >
                        <svg aria-hidden="true" fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"
                            class="mr-2 w-5 h-5"
                            :class="tab == 'log' ? 'text-blue-600' : 'text-gray-400'"
                        >
                            <path fill-rule="evenodd" d="M2.625 6.75a1.125 1.125 0 112.25 0 1.125 1.125 0 01-2.25 0zm4.875 0A.75.75 0 018.25 6h12a.75.75 0 010 1.5h-12a.75.75 0 01-.75-.75zM2.625 12a1.125 1.125 0 112.25 0 1.125 1.125 0 01-2.25 0zM7.5 12a.75.75 0 01.75-.75h12a.75.75 0 010 1.5h-12A.75.75 0 017.5 12zm-4.875 5.25a1.125 1.125 0 112.25 0 1.125 1.125 0 01-2.25 0zm4.875 0a.75.75 0 01.75-.75h12a.75.75 0 010 1.5h-12a.75.75 0 01-.75-.75z" clip-rule="evenodd" />
                        </svg>

                        Booking Log
                    </a>
                </li>
            </ul>
        </div>

        <div x-show="tab == 'basic'" style="display:none;">
            <livewire:booking.edit :booking="$booking" />
        </div>

        <div x-show="tab == 'caren'" style="display:none;">
            <livewire:booking.caren :booking="$booking" />
        </div>

        <div x-show="tab == 'extras'" style="display:none;">
            <livewire:booking.extras :booking="$booking" />
        </div>

        <div x-show="tab == 'customer'" style="display:none;">
            <livewire:booking.customer :booking="$booking" />
        </div>

        <div x-show="tab == 'affiliate'" style="display:none;">
            <livewire:booking.linked-affiliate :booking="$booking" />
        </div>

        <div x-show="tab == 'log'" style="display:none;">
            <livewire:booking.log :booking="$booking" />
        </div>
    </div>
</x-admin-layout>
