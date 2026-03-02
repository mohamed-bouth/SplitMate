<h2>You are invited!</h2>

<p>You have been invited to join an apartment.</p>

<p>
    Click here to accept:
    <a href="{{ url('/invitation/'.$invitation->token) }}">
        Accept Invitation
    </a>
</p>