@component('mail::message')

Hey Admin! <br>

A new client <strong>{{$user->fullname}}</strong> from <strong>{{$clientaddress->city}}</strong> and <strong>zipcode </strong>{{$clientaddress->zip}} completed the registration<br>


Thank you,<br>
The Pepe Le Chef Family
@endcomponent
