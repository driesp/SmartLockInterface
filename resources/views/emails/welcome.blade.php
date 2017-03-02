@component('mail::message')

  Welcome, {{$user->name}}!

  Your password is: {{$password}}

@component('mail::button', ['url' => 'https://smartlock.tk/login'])
To Login
@endcomponent

@component('mail::panel')
  Welcome to the SmartLock Community!
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
