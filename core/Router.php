<?php
$controller = $_GET['controller'] ?? 'auth';
$action = $_GET['action'] ?? 'login';

$controllerName = $controller . "Controller";
$controllerFile = "../app/controllers/$controllerName.php";

if (file_exists($controllerFile)) {
    require_once $controllerFile;
    $controllerObj = new $controllerName();
    if (method_exists($controllerObj, $action)) {
        $controllerObj->$action();
    } else {
        echo "Action $action non trouvée.";
    }
} else {
    echo "Contrôleur $controllerName non trouvé.";
}
?>