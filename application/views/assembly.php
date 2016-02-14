<div>
    <div id="body">
        <div id="assembler" style="width: 600px; float: left;">
            <form name="assemblyform" id="assemblyform" autocomplete="off">
            <table>
                <tr>
                    <td colspan="2">
                        <h2>HEAD</h2>
                    </td>
                </tr>
                <tr>
                    <td>
                        <img src="/data/{part0}.jpeg" alt="head" id='head_image'/>
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
                    <td colspan="2">
                        <h2>BODY</h2>
                    </td>
                </tr>
                <tr>
                    <td>
                        <img src="/data/{part1}.jpeg" alt="head" id='head_image'/>
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
                    <td colspan="2">
                        <h2>LEGS</h2>
                    </td>
                </tr>
                <tr>
                    <td>
                        <img src="/data/{part2}.jpeg" alt="head" id='head_image'/> 
                    </td>
                    <td>
                        <select name="selectlegs" onchange="assemblyform.submit()">
                            {legs}
                                <option value="{piece}" {selected}>{piece}</option>
                            {/legs}
                        </select>
                    </td>
                </tr>
            </table>
            
            </form>
        </div>
        <div id="preview" style="margin-left: 620px;">
            <table>
                <tr>
                    <td>
                        <h2>PREVIEW</h2>
                    </td>
                </tr>
                <tr>
                    <td>
                        <img src="" alt="head"/>
                        </br>
                        <img src="" alt="body"/>
                        </br>
                        <img src="" alt="legs"/>
                    </td>
                </tr>
            </table>
        </div>
    </div>
</div>