@component('mail::message')

  Welcome, {{$user->name}}!

  Your temporary password is, {{$password}}

@component('mail::button', ['url' => 'https://smartlock.tk/login'])
Log In
@endcomponent

@component('mail::panel')
  Welcome to the SmartLock Community!
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
