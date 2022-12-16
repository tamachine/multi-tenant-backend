<div class="flex flex-col">
    <div class="bg-white p-4 sm:p-10 shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
        Add this parameter to the end of any public url: <strong>?affiliate_id={{$affiliate->hashid}}</strong>
        <br><br>

        Examples:
        <ul>
            <li>
                <a href="{{config('app.url')}}?affiliate_id={{$affiliate->hashid}}" target="_blank"
                    class="text-purple-700 hover:underline"
                >
                    {{config('app.url')}}?affiliate_id={{$affiliate->hashid}}
                </a>
            </li>

            <li>
                <a href="{{config('app.url')}}/blog?affiliate_id={{$affiliate->hashid}}" target="_blank"
                    class="text-purple-700 hover:underline"
                >
                    {{config('app.url')}}/blog?affiliate_id={{$affiliate->hashid}}
                </a>
            </li>

            <li>
                <a href="{{config('app.url')}}/vehicle/delorean-dmc?affiliate_id={{$affiliate->hashid}}" target="_blank"
                    class="text-purple-700 hover:underline"
                >
                    {{config('app.url')}}/vehicle/delorean-dmc?affiliate_id={{$affiliate->hashid}}
                </a>
            </li>
        </ul>
    </div>
</div>
