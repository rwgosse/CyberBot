<div>
    <p></p>

    <h3>Game Status: Round #{round-number}</h3>
    <p>Round state: {round-state}</p>
    <p>Time left: {round-countdown}</p>

    <h2>Registration</h2>
    <p>Registration status: {register-status}</p>
    <form autocomplete="off" method="post" action="admin/register">
        Team: <input type="text" name="team" /> <br>
        Name: <input type="text" name="name" /> <br>
        Password: <input type="text" name="password" /> <br>
        <input type="submit" value="Register"/>
    </form>
    
    <h2>Known Rounds</h2>
    {rounds}
    <p>Round {round}: {token}</p>
    {/rounds}

    <h2>Information</h2>
    <p>{message}</p>
</div>
