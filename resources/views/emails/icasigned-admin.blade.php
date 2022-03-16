@component('mail::message')

Hey!<br>

New Chef <strong>{{$user->fullname}} </strong>signed Independent Contractors Agreement <br>

Chef belongs to <strong>{{$chefaddress->city}}</strong> and Zipcode is <strong>{{$chefaddress->zip}}</strong>

Thank you,<br>
The Pepe Le Chef Family
@endcomponent
