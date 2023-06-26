<div class="mt-4 shadow overflow-hidden bg-white border-b border-gray-200 sm:rounded-lg overflow-x-auto flex gap-3 p-4 divide-x">
    
    <div class="w-full">
        <div class="bg-gray-100 p-2 mb-2">
            Request
        </div>
        <table class="w-full divide-y divide-gray-200 border">
            <thead class="bg-gray-100">
                <tr>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-bold text-gray-500 tracking-wider">
                        key
                    </th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-bold text-gray-500 tracking-wider">
                        Value
                    </th>                
                </tr>            
            </thead>

            <tbody>
                @foreach($booking->valitor_request as $key => $value)
                    <tr class="{{$loop->odd ? 'bg-white' : 'bg-gray-50'}}">
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                            {{ $key }}
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                            {{ $value }}
                        </td>                    
                    </tr>
                @endforeach

            </tbody>
        </table>
    </div>
    <div class="w-full pl-4">
        <div class="bg-gray-100 p-2 mb-2">
            Response
        </div>
        <table class="w-full divide-y divide-gray-200 border">
            <thead class="bg-gray-100">
                <tr>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-bold text-gray-500 tracking-wider">
                        key
                    </th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-bold text-gray-500 tracking-wider">
                        Value
                    </th>                
                </tr>            
            </thead>

            <tbody>
                @foreach($booking->valitor_response as $key => $value)
                    <tr class="{{$loop->odd ? 'bg-white' : 'bg-gray-50'}}">
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                            {{ $key }}
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                            {{ $value }}
                        </td>                    
                    </tr>
                @endforeach
                
            </tbody>
        </table>
    </div>
</div>
