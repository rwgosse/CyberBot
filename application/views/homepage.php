<div class="row" id="dashboard">
    <div id="round-status">
        <h3>Game Status: Round #{round-number}</h3>
        <p>Round state: {round-state}</p>
        <p>Time left: {round-countdown}</p>
    </div>

    <div id="content-container">        

        <div id="content-left">
            <h3>Pieces</h3>
            <div id="homepage-pieces">
                <h4>Known Pieces</h4>
                {piecedisplay}
            </div>

        </div>
        <div id="content-right">
            <h3>Players</h3>
            <div>
                {test}
                <div class="homepage-players">
                    <a href="/Portfolio?player={player}">{player}</a><br/><br/>
                    Peanuts: {peanuts}<br/><br/>
                    Equity: {equity}<br/>
                </div>
                {/test}
            </div>
            
            <h3>Transactions</h3>
            <div class="homepage-transaction">
                <table>
                    <tr>
                        <th>Date/Time</th>
                        <th>Player</th>
                        <th>Broker</th>
                        <th>Series</th>
                        <th>Trans</th>
                    </tr>
                {transactions}
                    <tr>
                        <td>{datetime}</td>
                        <td>{player}</td>
                        <td>{broker}</td>
                        <td>{series}</td>
                        <td>{trans}</td>
                    </tr>               
                {/transactions}
                </table>
            </div>
            
            
        </div>
    </div>
</div>