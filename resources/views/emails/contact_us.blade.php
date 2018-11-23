@component('mail::message')

name: {{$name}}

subject: {{$subject}}

message：{{$message}}

Thanks,<br>
{{ config('app.name') }}
@endcomponent
