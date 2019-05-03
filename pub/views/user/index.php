<form id="randomInsert" action="<?php echo URL; ?>User/create" method="post">
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
            <td>
                <select name="type" style="width: 100%">
                    <option value="admin">Admin</option>
                    <option value="user">User</option>
                </select>
            </td>
        </tr>
        <tr>
            <td colspan="2"><input type="submit"></td>
        </tr>
    </table>

</form>

<div id="InsertMsg" style="text-align: center">
    <table align="center">
        <?php  foreach ($this->userList as $key => $value) : ?>
            <tr>
                <td><?=$value['user'] ?></td>
                <td><?=$value['type'] ?></td>
                <td><a href="<?=URL.'User/edit/'.$value['id']  ?>" >Edit</a> </td>
                <td><a href="<?=URL.'User/delete/'.$value['id'] ?>" >Delete</a> </td>
            </tr>
        <?php   endforeach;   ?>
    </table>
</div>