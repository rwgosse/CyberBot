<div class="row" id="dashboard">
    <h1>Dashboard</h1>
       <div class="dashboardContainer"> 
        <div class="statusContainer">
            <h3>Game Status: Round #1</h3>
            <div class="rounds">
                <div class="displayStatus">
					{piecedisplay}
                </div>
            </div>
        </div>
        <div class="playersContainer">
            <h3>Players</h3>
			{test}
            <div class="homepagePlayers">
				<a href="/Portfolio?player={player}">{player}</a><br/><br/>
				Peanuts: {peanuts}<br/><br/>
				Equity: {equity}<br/>
			</div>
			{/test}
        </div>
       </div>
</div>