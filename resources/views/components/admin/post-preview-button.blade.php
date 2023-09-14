@if($showButton)
<x-admin.button x-on:click.prevent="window.open('{!! $url !!}','_blank');">Preview</x-admin.button>
@else
 {{ __('Preview not available') }}
 <br>
 {{ __('Missing: ') . $envVarName . ' env var'}}
@endif
