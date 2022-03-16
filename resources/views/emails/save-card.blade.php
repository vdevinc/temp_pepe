@component('mail::message')

Thank you for joining  Pepe Le Chef, you payment information has been updated with Stripe...Start your FEAST!!<br>

@component('mail::button', ['url' => url('/login'), 'color' => 'success'])
Login in link here 
@endcomponent

<br>

Thank you,<br>
The Pepe Le Chef Family
@endcomponent
