@component('mail::message')
    @component('mail::panel')
        # Welcome mfbf.dk

        Thanks for registering with mfbf.dk. **We really appreciate** it.
        Let us knwo how we can improve mfbf.dk

        @component('mail::button', ['url' => sprintf('/verifyemail/%s', $user->email_token)])
            Click to verify {{ $user->email }}
        @endcomponent

    @endcomponent

    @component('mail::button', ['url' => 'http://mfbf.dk/feedback'])
        Give feedback
    @endcomponent

    Thanks, <br>
    {{ config('app.name') }}
@endcomponent
