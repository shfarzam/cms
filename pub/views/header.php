<html xmlns="http://www.w3.org/1999/html">
<head content="text/plain">

    <title><?=(isset($this->title)) ? $this->title : 'Hello Docker World !!!' ?></title>
</head>
<link rel="stylesheet/less" type="text/less" href="<?php echo URL; ?>less/style1.less"/>
<script src="https://cdnjs.cloudflare.com/ajax/libs/less.js/3.9.0/less.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"
        integrity="sha256-VazP97ZCwtekAsvgPBSUwPFKdrwD3unUfSGVYrahUqU=" crossorigin="anonymous"></script>
<?php
if (isset($this->js)) {
    foreach ($this->js as $js) {
        echo '<script  src="' . URL . 'views/' . $js . '"></script>';
    }
}


?>
<body>

<div id="mypar1">
    <ul>
        <li><a href="<?php echo URL; ?>index">Index</a></li>
        <li><a href="<?php echo URL; ?>Help">Help</a></li>
        <?php if (Session::get('type') == 'admin'): ?>
            <li><a href="<?php echo URL; ?>User">Users</a></li>
        <?php endif; ?>
        <?php if (Session::get('logIn') == true): ?>
            <li><a href="<?php echo URL; ?>Dashboard">Dashboard</a></li>
            <li><a href="<?php echo URL; ?>Dashboard/logout">Logout</a></li>
            <li style="float:right; "><a class="active">Hallo <?php echo Session::get('user'); ?></a></li>
        <?php else: ?>
            <li><a href="<?php echo URL; ?>Login">Login</a></li>
            <li style="float:right"><a class="active">Hallo Guest</a></li>
        <?php endif; ?>
    </ul>
</div>

<div id="mypar2">



