<x-mail::message>
# Introduction

The body of your message.

<h1>Ciao admin!</h1>
<p>
Hai ricevuto un nuovo messaggio, ecco qui i dettagli:<br>
Nome: {{ $lead->name }}<br>
Email: {{ $lead->email }}<br>
Messaggio:<br>
{{ $lead->message }}
</p>

{{-- <x-mail::button :url="''">
Button Text
</x-mail::button> --}}

Thanks,<br>
{{ config('app.name') }}
</x-mail::message>
