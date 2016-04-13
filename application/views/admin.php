<div id="admin-wrapper">
    <div id="admin-status">
        <h2>Game Status: Round #{round-number}</h2>
        <p>Round state: {round-state}</p>
        <p>Time left: {round-countdown}</p>
    </div>

    <div id="admin-register">
        <h2>Registration</h2>
        <p id="register-status">Status: {register-status}</p>
        <form autocomplete="off" method="post" action="admin/register">
            <label for="team">Team:</label><input type="text" name="team" value="A04" readonly/> <br>
            <label for="name">Name:</label><input type="text" name="name" value="cyberbot" /> <br>
            <label for="password">Password:</label><input type="text" name="password" /> <br>
            <input type="submit" value="Register"/>
        </form>
    </div>

    <div id="admin-rounds">
        <h2>Known Rounds</h2>
        {rounds}
        <p>Round {round}: {token}</p>
        {/rounds}
    </div>

    <div id="admin-info">
        <h2>Information</h2>
        <p>{message}</p>
    </div>
	
	    <div id="admin-player-mgmt">
        <h2>Player Management</h2>
		<table id="admin-players">
			<tr>
				<th>Player Name</th>
				<th>Peanuts</th>
				<th>Admin Role</th>
				<th>Avatar Image Path</th>
			</tr>
			{adminplayertable}
			<tr>
				<td>
					{player}
				</td>
				<td>
					{peanuts}
				</td>
				<td>
					{adminrole}
				</td>
				<td>
					{imgpath}
				</td>
			</tr>
		{/adminplayertable}
		</table>
    </div>
</div>
