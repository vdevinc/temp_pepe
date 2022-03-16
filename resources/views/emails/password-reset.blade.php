@component('mail::message')
Hello,

You recently requested a password reset.
To complete your password reset request, click on the button below:

@component('mail::button', ['url' =>  url('password/reset-confirm?token=' . $user->token.'&email='.$user->email)])
Reset Password
@endcomponent

<br> 
Thank you,<br>
The Pepe Le Chef Family
@endcomponent
