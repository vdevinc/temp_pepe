@component('mail::message')

Head up!<br> <br> 
Your cookin' has been requested, are you avail? <br>
Please confirm or reject order asap! We are hungry!! <br>

@component('mail::button', ['url' => url('/chef/order/list'), 'color' => 'success'])
Check and Accept Order  
@endcomponent


Thank you,<br>
The Pepe Le Chef Family
@endcomponent

