@component('mail::message')


Client {{$order->user->full_name}} has placed {{$order->price}} order, pending chefs approval 

Chef Name : {{$order->dish->user->full_name}}

Thank you,<br>
The Pepe Le Chef Family
@endcomponent

