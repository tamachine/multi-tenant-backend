<x-admin-layout>
    <x-slot name="title">
        {{ __('Import') }}
    </x-slot>

    <x-slot name="breadcrumbs">
        <x-admin.breadcrumbs :crumbs="$crumbs" />
    </x-slot>

    <x-slot name="action">

    </x-slot>

    <div class="p-6">
        @if(session()->has('flash'))
        <div class="rounded-md bg-green-50 p-4 mb-4">
            <div class="flex">
                <div class="flex-shrink-0">
                    <svg class="h-5 w-5 text-green-400" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.857-9.809a.75.75 0 00-1.214-.882l-3.483 4.79-1.88-1.88a.75.75 0 10-1.06 1.061l2.5 2.5a.75.75 0 001.137-.089l4-5.5z" clip-rule="evenodd" />
                    </svg>
                </div>
                <div class="ml-3">
                    <h3 class="text-sm font-medium text-green-800">
                        {{ session('flash') }}
                    </h3>
                </div>
            </div>
        </div>
        @endif

        <div class="bg-white shadow sm:rounded-lg">
            <div class="px-4 py-5 sm:p-6">
                <h3 class="text-base font-semibold leading-6 text-gray-900">Post import</h3>
                <div class="mt-2 max-w-xl text-sm text-gray-500">
                    <p>Upload csv file to begin the process</p>
                </div>
                <form method="POST" action="{{ route('intranet.blog.import.upload') }}" class="mt-5" enctype="multipart/form-data">
                    @csrf

                    <div class="flex">
                        <div class="sm:max-w-xs">
                            <input type="file"
                                   name="file"
                                   id="file"
                                   class="block rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                                   required>
                        </div>
                        <button class="inline-flex items-center ml-2 px-4 py-2 bg-blue-700 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-white hover:border-blue-700 hover:text-blue-700 active:bg-white active:border-blue-700 active:text-blue-700 disabled:opacity-25 transition ease-in-out duration-150">
                            Upload
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>


</x-admin-layout>
