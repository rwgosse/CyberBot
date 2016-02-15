<div>
    <div id="body">
        <div id="assembler" style="width: 600px; float: left;">
            <form name="assemblyform" id="assemblyform" autocomplete="off">
                <table>
                    <tr>
                        <th colspan="2">
                            <h2>HEAD</h2>
                        </th>
                    </tr>
                    <tr>
                        <td style="width:90%;">
                            <img src="../data/{part0}.jpeg" alt="head"/>
                        </td>
                        <td>
                            <select name="selecthead" onchange="assemblyform.submit()">
                                {heads}
                                    <option value="{piece}" {selected}>{piece}</option>
                                {/heads}
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <th colspan="2">
                            <h2>BODY</h2>
                        </th>
                    </tr>
                    <tr>
                        <td style="width:90%;">
                            <img src="../data/{part1}.jpeg" alt="body"/>
                        </td>
                        <td>
                            <select name="selectbody" onchange="assemblyform.submit()">
                                {bodys}
                                    <option value="{piece}" {selected}>{piece}</option>
                                {/bodys}
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <th colspan="2">
                            <h2>LEGS</h2>
                        </th>
                    </tr>
                    <tr>
                        <td style="width:90%;">
                            <img src="../data/{part2}.jpeg" alt="legs" /> 
                        </td>
                        <td>
                            <select name="selectlegs" onchange="assemblyform.submit()">
                                {leg}
                                    <option value="{piece}" {selected}>{piece}</option>
                                {/leg}
                            </select>
                        </td>
                    </tr>
                </table>
                <input type="submit" name='btn_submit' value='Assemble'/>
            </form>
        </div>
        <div id="preview" style="margin-left: 620px;">
            <table>
                <tr>
                    <th>
                        <h2>PREVIEW</h2>
                    </th>
                </tr>
                <tr>
                    <td>
                        <img src="../data/{head}.jpeg" alt="head"/>
                        </br>
                        <img src="../data/{body}.jpeg" alt="body"/>
                        </br>
                        <img src="../data/{legs}.jpeg" alt="legs"/>
                    </td>
                </tr>
            </table>
            <div style="color: red;">
                {no_assemble}
            </div>
        </div>
    </div>
</div>