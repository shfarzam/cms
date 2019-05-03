<form id="randomInsert" action="<?php echo URL; ?>Dashboard/XhrInsert" method="post">
    <table style="text-align: center" align="center">
        <tr>
            <th colspan="2">User Insert</th>
        </tr>
        <tr>
            <td>Username</td>
            <td><input type="text" name="user"></td>
        </tr>
        <tr>
            <td>Password</td>
            <td><input type="password" name="pass"></td>
        </tr>
        <tr>
            <td>Type</td>
            <td><input type="text" name="type"></td>
        </tr>
        <tr>
            <td colspan="2" ><input type="submit" ></td>
        </tr>
    </table>

</form>

<div id="InsertMsg" style="text-align: center">

</div>

