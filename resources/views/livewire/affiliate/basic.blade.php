<div class="flex flex-col">
    <div class="bg-white p-4 sm:p-10 shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
        <div class="w-full sm:grid sm:gap-2 sm:grid-cols-3">
            <!-- Name -->
            <div class="px-4 mt-4 sm:mt-0">
                <x-admin.label for="name" class="mb-1" value="{{ __('Name') }}" />
                <strong>{{$name}}</strong>
            </div>

            <!-- Username -->
            <div class="px-4 mt-4 sm:mt-0">
                <x-admin.label for="username" class="mb-1"  value="{{ __('Username') }}" />
                <strong>{{$username}}</strong>
            </div>

            <!-- Id -->
            <div class="px-4 mt-4 sm:mt-0">
                <x-admin.label for="id" class="mb-1" value="{{ __('Id') }}" />
                <strong>{{$hashid}}</strong>
            </div>

            <!-- Commission -->
            <div class="px-4 mt-4">
                <x-admin.label for="commission" class="mb-1" value="{{ __('Commission') }}" />
                <strong>{{$commission}} %</strong>
            </div>

            @if($email)
                <!-- Email -->
                <div class="px-4 mt-4">
                    <x-admin.label for="email" class="mb-1"  value="{{ __('Email') }}" />
                    <strong>{{$email}}</strong>
                </div>
            @endif
        </div>

        <hr class="px-4 my-4">

        <div class="px-4 my-4">
            <h1 class="text-xl font-medium my-4">Affiliate Link</h1>

            Add your "Id" as a parameter to the end of any url: <strong>?affiliate_id={{$hashid}}</strong>
            <br><br>
            Examples:
            <ul>
                <li>
                    <a href="{{config('app.url')}}?affiliate_id={{$hashid}}" target="_blank"
                        class="text-purple-700 hover:underline"
                    >
                        {{config('app.url')}}?affiliate_id={{$hashid}}
                    </a>
                </li>

                <li>
                    <a href="{{config('app.url')}}/blog?affiliate_id={{$hashid}}" target="_blank"
                        class="text-purple-700 hover:underline"
                    >
                        {{config('app.url')}}/blog?affiliate_id={{$hashid}}
                    </a>
                </li>

                <li>
                    <a href="{{config('app.url')}}/vehicle/delorean-dmc?affiliate_id={{$hashid}}" target="_blank"
                        class="text-purple-700 hover:underline"
                    >
                        {{config('app.url')}}/vehicle/delorean-dmc?affiliate_id={{$hashid}}
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>
