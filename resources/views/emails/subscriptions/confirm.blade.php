@component('mail::message')
# Simgoodies.app Newsletter Subscription

You have requested to stay up to date of events happening surrounding Simgoodies, confirm your subscription by clicking the button below.

@component('mail::button', ['url' => url('confirm-subscription/' . $token)])
Confirm subscription
@endcomponent

If you can not see the button, copy and paste the following link in your browser:<br>
{{ url('confirm-subscription/' . $token) }}

Thanks,<br>
{{ config('app.name') }}
@endcomponent
