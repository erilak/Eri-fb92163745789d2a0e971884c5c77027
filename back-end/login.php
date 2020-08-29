<?php
require "Koneksi.php";

// $kon = (new Koneksi())->select();
// $kon = (new Koneksi())->insert(1, (new DateTime())->format("Y-m-d H:i:s"), (new Koneksi())->getMac(), (new Koneksi())->getBrowser());
// $kon = (new Koneksi())->delete(1, (new Koneksi())->getMac(), (new Koneksi())->getBrowser());
// $kon = (new Koneksi())->getMac();
// $kon = (new Koneksi())->getBrowser();

$post = json_decode(file_get_contents('php://input'));
echo "<pre>";
print_r($post);
exit;
?>