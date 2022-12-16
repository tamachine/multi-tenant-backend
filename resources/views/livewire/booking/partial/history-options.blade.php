<div class="p-4">
    <div class="sm:flex sm:justify-between sm:items-center">
        <div class="mt-4 flex justify-start">
            <!-- Records -->
            <div class="px-4">
                <x-admin.label for="records" value="{{ __('Records') }}" />

                <select id="records" name="records" wire:model="records"
                    class="disable-arrow block w-full mt-2 pt-2 pl-3 pr-10 text-left border-gray-300 rounded-md"
                >
                    <option value="5">5</option>
                    <option value="10">10</option>
                    <option value="20">20</option>
                    <option value="50">50</option>
                </select>
            </div>

            <!-- Date Format -->
            <div class="ml-4 px-4">
                <x-admin.label for="date_format" value="{{ __('Date format') }}" />

                <select id="date_format" name="date_format" wire:model="date_format"
                    class="disable-arrow block w-full mt-2 pt-2 pl-3 pr-10 text-left border-gray-300 rounded-md"
                >
                    <option value="d-m-Y H:i">Europe</option>
                    <option value="Y-m-d H:i">USA</option>
                </select>
            </div>
        </div>

        <div class="mt-4">
            <button class="inline-flex items-center px-4 py-2 bg-green-900 border border-transparent rounded-md font-semibold text-xs text-white tracking-widest hover:bg-white hover:border-green-900 hover:text-green-900 active:bg-white active:border-green-900 active:text-blue-700 disabled:opacity-25 transition ease-in-out duration-150"
                type="button"
                wire:click="excelExport"
            >
                Excel
            </button>
        </div>
    </div>
</div>
