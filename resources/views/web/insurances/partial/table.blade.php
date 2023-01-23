{{-- desktop --}}
<table class="hidden md:table table-auto h-fit w-full mt-20 mb-7">
  <thead>
    <tr>
        <th class="pr-6 font-normal">
            @include('web.insurances.partial.free-cancelation')
        </th>

        @foreach($insurances as $insurance)
        <th class="pb-10 {{ $loop->last ? 'pl-6' : ($loop->first ? 'pr-6' : 'px-6') }} font-normal">
            <x-insurance-box :insurance=$insurance />
        </th>
        @endforeach      
    </tr>
  </thead>
  <tbody>    
  @foreach($InsuranceFeatures as $InsuranceFeature)
    <tr class="{{ ($loop->even) ? '' : 'bg-pink-red-secondary' }}">
        <td class="rounded-l-lg p-6">
            {!! $InsuranceFeature->name !!}
        </td>
        @foreach($insurances as $insurance)
        <td class="{{ $loop->last ? 'pl-6' : ($loop->first ? 'pr-6' : 'px-6') }} {{ $loop->last ? 'rounded-r-lg' : '' }}">            
            @if(
                ($loop->last) || 
                ($loop->first && $loop->parent->index <= 1) ||
                ($loop->index == 1 && (($loop->parent->index <= 3) || ($loop->parent->remaining == 1)))
                ) 
                <img class="mx-auto" src="{{ asset('images/icons/check-circle.svg') }}" />            
            @endif            
        </td>
        @endforeach        
    </tr>
  @endforeach  
    <tr>
        <td></td>
        @foreach($insurances as $insurance)
        <td class="{{ $loop->last ? 'pl-6' : ($loop->first ? 'pr-6' : 'px-6') }}">
            <div class="flex justify-center mt-4">
                <button class="rounded-xl px-5 py-3 bg-[{{ $insurance->color }}] text-white hover:opacity-75">{!! __('insurances.btn-text') !!}</button>  
            </div>
        </td>
        @endforeach
    </tr>
  </tbody>
</table>
{{-- desktop end --}}

{{-- mobile --}}
<div class="md:hidden flex flex-col pt-7 items-center gap-6">
    <div>
        @include('web.insurances.partial.free-cancelation')
    </div>

    @foreach($insurances as $insurance)
        <x-insurance-box :insurance=$insurance />
    @endforeach
</div>
{{-- mobile end --}}