<x-admin-layout>
    <x-slot name="title">
        {{ __('Dashboard') }}
    </x-slot>

    <div class="grid sm:grid-cols-2 lg:grid-cols-3 p-5">
        <div class="bg-white shadow px-5 py-10 m-5 sm:rounded-lg flex justify-start">
            <div class="w-14 ml-8">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-14 h-14 text-purple-700">
                    <path fill-rule="evenodd" d="M11.54 22.351l.07.04.028.016a.76.76 0 00.723 0l.028-.015.071-.041a16.975 16.975 0 001.144-.742 19.58 19.58 0 002.683-2.282c1.944-1.99 3.963-4.98 3.963-8.827a8.25 8.25 0 00-16.5 0c0 3.846 2.02 6.837 3.963 8.827a19.58 19.58 0 002.682 2.282 16.975 16.975 0 001.145.742zM12 13.5a3 3 0 100-6 3 3 0 000 6z" clip-rule="evenodd" />
                </svg>
            </div>

            <div class="ml-8 my-auto font-bold text-purple-700 hover:underline">
                <a href="{{route('location.index')}}">Locations</a>
            </div>
        </div>

        <div class="bg-white shadow px-5 py-10 m-5 sm:rounded-lg flex justify-start">
            <div class="w-14 ml-8">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-14 h-14 text-purple-700">
                    <path d="M19.006 3.705a.75.75 0 00-.512-1.41L6 6.838V3a.75.75 0 00-.75-.75h-1.5A.75.75 0 003 3v4.93l-1.006.365a.75.75 0 00.512 1.41l16.5-6z" />
                    <path fill-rule="evenodd" d="M3.019 11.115L18 5.667V9.09l4.006 1.456a.75.75 0 11-.512 1.41l-.494-.18v8.475h.75a.75.75 0 010 1.5H2.25a.75.75 0 010-1.5H3v-9.129l.019-.006zM18 20.25v-9.565l1.5.545v9.02H18zm-9-6a.75.75 0 00-.75.75v4.5c0 .414.336.75.75.75h3a.75.75 0 00.75-.75V15a.75.75 0 00-.75-.75H9z" clip-rule="evenodd" />
                </svg>
            </div>

            <div class="ml-8 my-auto font-bold text-purple-700 hover:underline">
                <a href="{{route('vendor.index')}}">Vendors</a>
            </div>
        </div>
    </div>
</x-admin-layout>
