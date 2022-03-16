@component('mail::message')
# Hi {{$name}}

{{$message}}
<br>

<br>
@component('mail::button', ['url' => url('/dish/create'), 'color' => 'success'])
Login in to Pepe Le Chef & add more dishes
@endcomponent

Thank you,<br>
The Pepe Le Chef Family
@endcomponent