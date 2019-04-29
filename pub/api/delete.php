<?php
require_once('manage.php');
if (hasPermission($_POST['api_key']){
$m = new manage($_POST['entry_id']);
$m->deleteEntry();
}