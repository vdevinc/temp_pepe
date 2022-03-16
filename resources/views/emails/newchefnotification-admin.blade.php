@component('mail::message')

A new Chef has registered with Pepe Le Chef.<br>

Full Name : {{$user->fullname}}<br>
City 	  : {{$chefaddress->city}}<br>
Zip Code  : {{$chefaddress->zip}}<br>

Thank you,<br>
The Pepe Le Chef Family
@endcomponent
