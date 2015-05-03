<?php

require_once('class/Functions.php');

print_r($_GET);

$search_app = new Functions;
$search_app->set_name_application($_GET["search"]);

json_encode($search_app->find_application());





?>