<div>
    <p></p>

    <h3>Game Status: Round #{round-number}</h3>
    <p>Round state: {round-state}</p>
    <p>Time left: {round-countdown}</p>
    
    <h2>Previous Rounds</h2>
    {rounds}
    <p>Round {round}: {token}</p>
    {/rounds}
    
    <h2>Registration</h2>
    <p>Registration status: {register-status}</p>
    <form autocomplete="off" action="admin/register">
        <input type="submit" value="Register"/>
    </form>

    <h2>Information</h2>
    <p>{message}</p>
</div>
