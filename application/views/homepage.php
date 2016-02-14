<div class="row" id="dashboard">
    <h1>Dashboard</h1>
       <div class="dashboardContainer"> 
        <div class="statusContainer">
            <h3>Game Status</h3>
            <div class="rounds">
                <p>Round #1</p>
                <div class="displayStatus">
                </div>
            </div>
        </div>
        <div class="playersContainer">
            <h3>Players</h3>
			{test}
            <div class="homepagePlayers">
				<a href="/Portfolio?player={player}">{player}</a><br/>
				Peanuts: {peanuts}<br/>
				Equity: {Equity}
			</div>
			{/test}
        </div>
       </div>
</div>