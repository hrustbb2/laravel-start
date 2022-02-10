<?php

$notificationType = $_POST['notification_type'];
$operationId = $_POST['operation_id'];
$amount = $_POST['amount'];
$currency = $_POST['currency'];
$datetime = $_POST['datetime'];
$sender = $_POST['sender'];
$codepro = $_POST['codepro'];
$notificationSecret = '5V9CnvAOp2XowgohTXw1+kgG';
$label = $_POST['label'];
$hash = $_POST['sha1_hash'];

$str = $notificationType . '&' . $operationId . '&' . $amount . '&' . $currency . '&' . $datetime . '&' . $sender . '&' . $codepro . '&' . $notificationSecret . '&' . $label;

if(bin2hex(sha1($str)) == $hash){
    $file = 'pays';
    file_put_contents($file, 'qwe', FILE_APPEND | LOCK_EX);
}