<div class="row" id="dashboard">
    <h1>Dashboard</h1>
    <div class="dashboardContainer"> 
        <div class="statusContainer">
            <div class="roundStatus">
                <h3>Game Status: Round #{round-number}</h3>
                <p>Round state: {round-state}</p>
                <p>Time left: {round-countdown}</p>
            </div>
            
            <div class="rounds">
                <h4>Known Pieces</h4>
                {piecedisplay}
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