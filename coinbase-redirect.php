<?php

$url = (!empty($_SERVER['HTTPS']))
    ? "https://".$_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI'] 
    : "http://".$_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI'];

for($i = 0; $i < 4; $i++) {
  $url = substr( $url, 0, strrpos( $url, '/'));
}

if (!isset($_GET['code'])) {
  die();
}

$url .= "/wp-admin/options-general.php?page=coinbase-wp&coinbase_code=" . urlencode($_GET['code']);
    
header("Location: " . $url);
