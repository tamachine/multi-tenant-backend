<div x-data="{ tab: '#tab1' }"  class="py-36">
    <x-heading-h2 
        title="{{ __('web.home.faqs-title') }}" 
        subtitle="{{ __('web.home.faqs-subtitle') }}" 
    />

    <div class="pt-12 pb-3 flex justify-center gap-5 w-full">
        <button class="tab w-[136px] h-[50px] p-0" @click.prevent="tab='#tab1'" :class="{ 'active': tab == '#tab1' }">Top six</button>
        <button class="tab w-[136px] h-[50px] p-0" @click.prevent="tab='#tab2'" :class="{ 'active': tab == '#tab2' }">Deliveries</button>
        <button class="tab w-[136px] h-[50px] p-0" @click.prevent="tab='#tab3'" :class="{ 'active': tab == '#tab3' }">Booking</button>
    </div>
    <div class="max-w-2xl m-auto">

        <div x-show="tab == '#tab1'" class="grid grid-cols-1 divide-y">
            <div class="py-9"><x-accordion question="I'm ready to book - tab 1" answer="Vitae congue eu consequat ac felis placerat vestibulum lectus mauris ultrices. Cursus sit amet dictum sit amet justo donec enim diam porttitor lacus luctus accumsan tortor posuere."/></div>
            <div class="py-9"><x-accordion question="So, what's included in the rental price? - tab 1" answer="Vitae congue eu consequat ac felis placerat vestibulum lectus mauris ultrices. Cursus sit amet dictum sit amet justo donec enim diam porttitor lacus luctus accumsan tortor posuere."/></div>
            <div class="py-9"><x-accordion question="Where do I retrieve my rental? - tab 1" answer="Vitae congue eu consequat ac felis placerat vestibulum lectus mauris ultrices. Cursus sit amet dictum sit amet justo donec enim diam porttitor lacus luctus accumsan tortor posuere."/></div>
        </div>
        <div x-show="tab == '#tab2'" class="grid grid-cols-1 divide-y">
            <div class="py-9"><x-accordion question="I'm ready to book - tab 2" answer="Vitae congue eu consequat ac felis placerat vestibulum lectus mauris ultrices. Cursus sit amet dictum sit amet justo donec enim diam porttitor lacus luctus accumsan tortor posuere."/></div>
            <div class="py-9"><x-accordion question="So, what's included in the rental price? - tab 2" answer="Vitae congue eu consequat ac felis placerat vestibulum lectus mauris ultrices. Cursus sit amet dictum sit amet justo donec enim diam porttitor lacus luctus accumsan tortor posuere."/></div>
            <div class="py-9"><x-accordion question="Where do I retrieve my rental? - tab 2" answer="Vitae congue eu consequat ac felis placerat vestibulum lectus mauris ultrices. Cursus sit amet dictum sit amet justo donec enim diam porttitor lacus luctus accumsan tortor posuere."/></div>    
        </div>
        <div x-show="tab == '#tab3'" class="grid grid-cols-1 divide-y">
            <div class="py-9"><x-accordion question="I'm ready to book - tab 3" answer="Vitae congue eu consequat ac felis placerat vestibulum lectus mauris ultrices. Cursus sit amet dictum sit amet justo donec enim diam porttitor lacus luctus accumsan tortor posuere."/></div>
            <div class="py-9"><x-accordion question="So, what's included in the rental price? - tab 3" answer="Vitae congue eu consequat ac felis placerat vestibulum lectus mauris ultrices. Cursus sit amet dictum sit amet justo donec enim diam porttitor lacus luctus accumsan tortor posuere."/></div>
            <div class="py-9"><x-accordion question="Where do I retrieve my rental? - tab 3" answer="Vitae congue eu consequat ac felis placerat vestibulum lectus mauris ultrices. Cursus sit amet dictum sit amet justo donec enim diam porttitor lacus luctus accumsan tortor posuere."/></div>
        </div>

        <div class="flex justify-center py-3">
            <button class="tab">View all questions</button>
        </div>
        
    </div>
</div>
