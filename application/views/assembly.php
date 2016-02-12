<div>
    <div id="body">
        <div id="assembler" style="width: 600px; float: left;">
            <form name="assemblyform" id="assemblyform" autocomplete="off">
            <table>
                <tr colspan="2">
                    <td>
                        <h2>HEAD</h2>
                    </td>
                </tr>
                <tr>
                    <td>
                        {part0}
                    </td>
                    <td>
                        <select name="selecthead" onchange="assemblyform.submit()">
                            {heads}
                            <option value="1" {selected}>1</option>
                            {/heads}
                        </select>
                    </td>
                </tr>
                <tr colspan="2">
                    <td>
                        <h2>BODY</h2>
                    </td>
                </tr>
                <tr>
                    <td>
                        {part1}
                    </td>
                    <td>
                        <select>
                            {head}
                            <option value="{head}">{head}</option>
                            {/head}
                        </select>
                    </td>
                </tr>
                <tr colspan="2">
                    <td>
                        <h2>LEGS</h2>
                    </td>
                </tr>
                <tr>
                    <td>
                        {part2}
                    </td>
                    <td>
                        <select>
                            {head}
                            <option value="{head}">{head}</option>
                            {/head}
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