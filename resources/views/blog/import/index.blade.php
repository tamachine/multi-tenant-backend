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
        <div class="bg-white shadow sm:rounded-lg">
            <div class="px-4 py-5 sm:p-6">
                <h3 class="text-base font-semibold leading-6 text-gray-900">Update your email</h3>
                <div class="mt-2 max-w-xl text-sm text-gray-500">
                    <p>Change the email address you want associated with your account.</p>
                </div>
                <form method="POST" action="{{ route('intranet.blog.import.upload') }}" class="mt-5 flex" enctype="multipart/form-data">
                    @csrf

                    <div class="w-full sm:max-w-xs">
                        <label for="file" class="sr-only">Email</label>
                        <input type="file" name="file" id="file" class="block rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" placeholder="you@example.com">
                    </div>
                    <button type="submit" class="mt-3 inline-flex items-center justify-center rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600 sm:ml-3 sm:mt-0 sm:w-auto">Save</button>
                </form>
            </div>
        </div>
    </div>


</x-admin-layout>
