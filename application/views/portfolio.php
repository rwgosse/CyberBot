           
<form name="playerform" id="playerform" method="GET" autocomplete="off">
    <span class="portfolio-label">Player: </span>
    <select onchange="playerform.submit()">
        {players}
        <option value="{player}" {selected}>{player}</option>
        {/players}
    </select>
</form>

<p>{debug}</p>

<div id="content-container">
    
    <div id="content-left">

        <h2>Current Holdings</h2>
        
        <table id="part-table" style="width: 90%">
            <tr>
                <th class="table-title">Series 11</th>
                <th class="table-title">Series 13</th>
                <th class="table-title">Series 26</th>
                <th></th>
            </tr>
            {series}
            <tr>
                <td>{11}</td>
                <td>{13}</td>
                <td>{26}</td>
                <td class="table-title">{piece}</td>
            </tr>
            {/series}
        </table>
        
        <div>
            <span class="portfolio-label">Peanuts:</span>
            <span id="peanuts">{peanuts}</span>
        </div>
        
    </div>

    <div id="content-right">
        <h2>Trading Activity</h2>
            
        <h3>Purchases</h3>
        <div id="purchases">
            <p>('2016.02.01-09:01:05', 'George', NULL, 'buy')</p>
            <p>('2016.02.01-09:01:10', 'Mickey', NULL, 'buy')</p>
        </div>
        
        <h3>Sales</h3>
        <div id="sales">
            <p>('2016.02.01-09:01:15', 'George', '13', 'sell')</p>
        </div>
        
    </div>        
</div>
