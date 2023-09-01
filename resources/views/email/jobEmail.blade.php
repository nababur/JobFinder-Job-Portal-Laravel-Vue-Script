<x-mail::message>

Hey {{ $data['friend_name'] }},

Hope you're doing well! I just wanted to drop a quick note to say that I'm thrilled to recommend you for the "{{ $data['title'] }}" position at {{ $data['cname'] }}. Your "{{ $data['position'] }}" are impressive and would be a great fit.

Feel free to use my name if needed. Rooting for you!

Best,
{{ $data['your_name'] }}
{{ $data['your_email'] }}


<x-mail::button :url="$data['jobUrl']">
Job link
</x-mail::button>

Thanks,<br>
{{ config('app.name') }}
</x-mail::message>
