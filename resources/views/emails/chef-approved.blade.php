
@component('mail::message')
# Hi {{$name}}<br><br>

Congratulations! <br>
You have been successfully approved by Pepe Le Chef<br>
Please find your Independent Contractor's Agreement signed by you, attached.<br>First you have to update your bank account details to stripe and then start adding dishes
<br>
@component('mail::button', ['url' => url('/chef/bank'), 'color' => 'success'])
Login in & update you payment informations with Stripe  
@endcomponent

Thank you,<br>
The Pepe Le Chef Family
@endcomponent

