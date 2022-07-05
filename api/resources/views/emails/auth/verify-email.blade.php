@include('emails.inc.header')
<section class="content p-x-15 p-y-15">
    <p>
        <b>Hello, {{ ucfirst($firstName) }}</b> <br> <br>
        An account has been created on {{ config('app.name') }} using your email address.
        kindly, click the button below to verifiy your email or copy the link below to your browser and visit it
    </p>

    <a href="{{ $verificationUrl }}" class="btn">Verify Email</a> <br><br>
    <a class="link wrap" href="{{ $verificationUrl }}">{{ $verificationUrl }}</a>

    <p class="p-y-15">
        Best Regards, <br>
        {{ config('app.name') }}
    </p>
</section>
@include('emails.inc.footer')
