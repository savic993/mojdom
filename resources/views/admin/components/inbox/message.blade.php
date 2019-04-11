<div class="container">
    <p>Poslao:<h3>{{ $message->fullName }}</h3></p>
    <p>{{ $message->email }}</p>
    <hr/>
    <p>{{ $message->subject }}</p>
    <hr/>
    <h5>Poslato u {{ date('d.m.Y. H:i', $message->time) }}</h5>
</div>