<x-admin-layout>
    <x-slot name="title">
        {{ __('Mailing') }}
    </x-slot>

    <x-slot name="breadcrumbs">
        <x-admin.breadcrumbs :crumbs="$crumbs" />
    </x-slot>

    <div x-data="{ tab: '{{$tab}}' }"
        class="space-y-6 p-10"
    >
        <div class="border-b border-gray-200">
            <ul class="flex flex-wrap -mb-px text-sm font-medium text-center text-gray-500">
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
                            <path fill-rule="evenodd" d="M6.75 2.25A.75.75 0 017.5 3v1.5h9V3A.75.75 0 0118 3v1.5h.75a3 3 0 013 3v11.25a3 3 0 01-3 3H5.25a3 3 0 01-3-3V7.5a3 3 0 013-3H6V3a.75.75 0 01.75-.75zm13.5 9a1.5 1.5 0 00-1.5-1.5H5.25a1.5 1.5 0 00-1.5 1.5v7.5a1.5 1.5 0 001.5 1.5h13.5a1.5 1.5 0 001.5-1.5v-7.5z" clip-rule="evenodd" />
                        </svg>

                        Customer Excel
                    </a>
                </li>

                <li class="mr-2">
                    <a href="javascript:void(0);"
                        @click.prevent="tab='newsletter'"
                        class="inline-flex p-4 rounded-t-lg border-b-2"
                        :class="tab == 'newsletter' ? 'text-blue-600 border-blue-600' : 'border-transparent hover:text-gray-600 hover:border-gray-300'"
                    >
                        <svg aria-hidden="true" fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"
                            class="mr-2 w-5 h-5"
                            :class="tab == 'newsletter' ? 'text-blue-600' : 'text-gray-400'"
                        >
                            <path d="M19.5 22.5a3 3 0 003-3v-8.174l-6.879 4.022 3.485 1.876a.75.75 0 01-.712 1.321l-5.683-3.06a1.5 1.5 0 00-1.422 0l-5.683 3.06a.75.75 0 01-.712-1.32l3.485-1.877L1.5 11.326V19.5a3 3 0 003 3h15z" />
                            <path d="M1.5 9.589v-.745a3 3 0 011.578-2.641l7.5-4.039a3 3 0 012.844 0l7.5 4.039A3 3 0 0122.5 8.844v.745l-8.426 4.926-.652-.35a3 3 0 00-2.844 0l-.652.35L1.5 9.59z" />
                        </svg>

                        Newsletter
                    </a>
                </li>
            </ul>
        </div>

        <div x-show="tab == 'customer'" style="display:none;">
            <livewire:booking.mailing.customers />
        </div>

        <div x-show="tab == 'newsletter'" style="display:none;">
            <livewire:booking.mailing.newsletter />
        </div>
    </div>
</x-admin-layout>
