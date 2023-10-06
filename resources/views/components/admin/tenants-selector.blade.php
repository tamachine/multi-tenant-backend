<select x-data x-on:change="window.location.href = $event.target.value">
@foreach(App\Models\Landlord\Tenant::get() as $tenant)
    <option {{ app('currentTenant') == $tenant ? 'selected' : ''}} value="{{ $tenant->login_url }}">{{ $tenant->long_name }}</option>
@endforeach
</select>
