           
<form name="playerform" id="playerform" method="GET">
    <span class="portfolio-label">Player: </span>
    <select onchange="playerform.submit()">
        {players}
        <option value="{player}">{player}</option>
        {/players}
    </select>
</form>

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
            <tr>
                <td>1</td>
                <td>2</td>
                <td>4</td>
                <td class="table-title">Heads</td>
            </tr>
            <tr>
                <td>1</td>
                <td>2</td>
                <td>4</td>
                <td class="table-title">Bodies</td>
            </tr>
            <tr>
                <td>1</td>
                <td>2</td>
                <td>4</td>
                <td class="table-title">Legs</td>
            </tr>
        </table>
        
        <div>
            <span class="portfolio-label">Peanuts:</span>
            <span id="peanuts">0</span>
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
