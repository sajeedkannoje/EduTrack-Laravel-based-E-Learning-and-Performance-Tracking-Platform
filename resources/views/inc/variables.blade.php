{{-- @routes --}}
<script>
    window.Laravel = {!! json_encode([
        'appName' => config('app.name'),
        'user' => Auth::user(),
        'csrfToken' => csrf_token(),
        'vapidPublicKey' => config('webpush.vapid.public_key'),
        'pusher' => [
            'key' => config('broadcasting.connections.pusher.key'),
            'cluster' => config('broadcasting.connections.pusher.options.cluster'),
        ],
        'stripe' => [
            'public' => config('services.stripe.public')
        ],
        'agora' => [
            'appId' => config('services.agora.appId')
        ],
        'appUrl' => url('/'),
        'setting' => config('setting'),
        'firebaseConfig' => config('services.firebase.' . config('app.env'))
    ])
    !!};
</script>

