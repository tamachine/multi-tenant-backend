<div class="bg-pink-red">
<input id="datepicker"/>
</div>
@push('scripts')
    <script>
      document.addEventListener('DOMContentLoaded', () => {          
         const picker = new easepick.create({
        element: document.getElementById('datepicker'),
        css: [
          'https://cdn.jsdelivr.net/npm/@easepick/bundle@1.2.0/dist/index.css',
          'https://easepick.com/css/customize_sample.css',
        ],
      });        
      });
    </script>

https://litepicker.com/
https://www.daterangepicker.com/
@endpush
