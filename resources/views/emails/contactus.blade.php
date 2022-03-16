@component('mail::message')
# Hi Admin<br><br>

We received a new contact details ,<br><br>
	Name        : 	{{$name}}<br><br>
 	Phone No    : 	{{$phone}}<br></br>
 	Email       :   {{$email}}<br><br>
 	Message     :	{{$message}}<br></br>

Thanks,<br>
{{ config('app.name') }}
@endcomponent
