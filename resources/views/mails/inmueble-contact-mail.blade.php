@component('mail::message')
# Nuevo interesado en un inmueble - {{ config('app.name') }}

@component('mail::panel')

@foreach($names as $key => $name)
- {{ $name }}: {{ $InmuebleContact->{$key} }}
@endforeach

@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
