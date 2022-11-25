<div class="flex flex-col md:flex-row w-full">
    <div class="relative md:pl-20 md:pt-20 pt-40">
        <div 
            class="
                absolute left-0 top-0 z-20 w-full "
                >
            <div
                class="
                md:mt-32 mx-12 md:mx-0 p-4               
                md:w-fit  
                bg-pink-red-secondary 
                md:rounded-2xl rounded-[10px]"                
                >
                <div 
                    style="background: linear-gradient(0deg, rgba(0, 0, 0, 0.2), rgba(0, 0, 0, 0.2)), url('{{ asset('images/home/location.png') }}'); background-size:cover"
                    class="w-auto md:w-[500px] h-[270px] md:rounded-2xl rounded-[10px]  bg-cover mx-auto"
                    >
                    <div class="p-6 flex flex-col justify-between h-full">
                        <div class="text-white font-fredoka">
                            <div class="text-base md:text-2xl">
                            {!! __('web.home.location-map-title') !!}
                            </div>
                            <div class="text-xs md:text-lg">
                            {!! __('web.home.location-map-address') !!}
                            </div>
                        </div>
                        <div>
                            <div class="bg-white text-black-primary text-[10px] leading-4 md:leading-6 md:text-xs rounded px-3 py-1 w-fit">
                            {!! __('web.home.location-map-time') !!}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="flex flex-row justify-between px-4 pt-2 md:text-lg text-base">
                    <div><img src="{{ asset('images/icons/phone-red.svg') }}" class="inline pr-2" />{!! __('web.home.location-map-phone') !!}</div>
                    <div><img src="{{ asset('images/icons/envelope-red.svg') }}" class="inline pr-2 text-xs md:text-lg" /> {!! __('web.home.location-map-email') !!}</div>
                </div>
            </div>
        </div>
    </div>
    <div class="w-full relative">
        <div 
            class="
                md:hidden
                absolute top-0 left-0
                w-full h-[250px] 
                z-10 
                md:rounded-2xl rounded-[10px]                 
                "
            style="background: linear-gradient(180deg, #FFFFFF 30%, rgba(255, 255, 255, 0) 98.16%);"
            ></div>
        <div class="md:rounded-2xl rounded-[10px]  p-5 pb-7 border-[#E7ECF3] border">
            <div 
                id="location-map" 
                class="h-[500px] w-full md:rounded-2xl rounded-[10px] "
                >
            </div>
            <div>
                <div class="text-pink-red font-medium text-xl md:text-xl pt-7 pb-5 text-center md:text-left">{!! __('web.home.location-map-hours-title') !!}</div>
                <div 
                    class="            
                        grid md:grid-cols-4 grid-cols-1 justify-between gap-y-2
                        text-center text-sm md:text-sm font-medium text-black"
                    >
                    <div class="md:flex md:justify-start">{!! __('web.home.location-map-hours-monday') !!}</div>
                    <div>{!! __('web.home.location-map-hours-tuesday') !!}</div>
                    <div>{!! __('web.home.location-map-hours-wednesday') !!}</div>
                    <div class="md:flex md:justify-end">{!! __('web.home.location-map-hours-thursday') !!}</div>
                    <div class="md:flex md:justify-start">{!! __('web.home.location-map-hours-friday') !!}</div>
                    <div>{!! __('web.home.location-map-hours-saturday') !!}</div>
                    <div>{!! __('web.home.location-map-hours-sunday') !!}</div>
                </div>
            </div>
        </div>
    </div>
</div>

@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            loader
                .load()
                .then((google) => {
                    const reykjavikAuto = { lat: 64.0151012, lng: -22.5758613 };

                    const locationMapElement = document.getElementById("location-map")

                    // The map, centered at Uluru
                    const map = new google.maps.Map(locationMapElement, {
                        zoom: 13,
                        center: reykjavikAuto,
                        mapId: '307e19008875bc83', {{-- https://console.cloud.google.com/google/maps-apis/studio/maps?authuser=3&project=website-368713 --}}
                        disableDefaultUI: true,
                        gestureHandling: "greedy"
                    });

                    new google.maps.Marker({
                        position: reykjavikAuto,                        
                        map,
                    });                                                                                           
                })
                .catch(e => {
                    console.log(e)
                });
        });
        
    </script>
@endpush