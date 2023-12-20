<p>Hello!</p>
@component('mail::button',['url' => url('/api/email/verify/'.$user->id)])
Verify Account
@endcomponent
