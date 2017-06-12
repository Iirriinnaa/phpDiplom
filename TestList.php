<?php 
session_start();

$title = 'Страница вариантов ответа';
require 'header.php'; 

?>

<?php require_once 'Blocks/Authorization.php';?>
<h3>Список тестов</h3>
<?php
require_once 'AutoLoad.php';
$myTest = new Tests();
$ListTest=$myTest->ActiveListTest();

foreach ($ListTest as $test) {
    ?>
<p><a href="TestInfo.php?id_test=<?=$test->id ?>"><?= $test->title ?></a></p>
<?php
}

require 'footer.php';
