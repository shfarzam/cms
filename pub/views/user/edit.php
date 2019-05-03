<?php
if (isset($this->user))
    $data = $this->user[0];
?>
<form id="randomEdit" action="<?php echo URL; ?>User/editSave/<?php echo $data['id']; ?>" method="post">
    <table style="text-align: center" align="center">
        <tr>
            <th colspan="2">User Edit</th>
        </tr>
        <tr>
            <td>Username</td>
            <td><input type="text" name="user" value="<?php echo $data['user']; ?>"></td>
        </tr>
        <tr>
            <td>Password</td>
            <td><input type="password" name="pass" value="<?php echo $data['pass']; ?>"></td>
        </tr>
        <tr>
            <td>Type</td>
            <td>
                <select name="type" style="width: 100%">
                    <option value="admin" <?php if ($data['type'] == 'admin') {
                        echo 'selected="selected"';
                    } ?> > Admin
                    </option>
                    <option value="user" <?php if ($data['type'] == 'user') {
                        echo 'selected="selected"';
                    } ?> > User
                    </option>
                </select>
            </td>
        </tr>
        <tr>
            <td colspan="2"><input type="submit"></td>
        </tr>
    </table>

</form>

<div id="InsertMsg" style="text-align: center">

</div>