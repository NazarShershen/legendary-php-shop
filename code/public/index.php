<?php

require '../vendor/autoload.php';

use App\Actions\CreateArtifact;
use App\Application;
use App\Shop;

Application::init();

$pageName = 'list.php';

if (isset($_GET['page'])) {
    $requestedPage = filter_input(INPUT_GET, 'page', FILTER_SANITIZE_STRING);

    if ($requestedPage == 'add-artifact') {
        $pageName = 'add-item.php';
    } elseif ($requestedPage == '404') {
        $pageName = '404.php';
    }
}

if (isset($_GET['action'])) {
    $action = filter_input(INPUT_GET, 'action', FILTER_SANITIZE_STRING);

    if ($action == 'save-artifact') {
        $dataToSave = $_REQUEST['artifact'];
        $artifact = (new CreateArtifact(new Shop))->execute($dataToSave);
        (new Shop())->addNewItem($artifact);

        header("Location: {$_SERVER['REQUEST_SCHEME']}://{$_SERVER['HTTP_HOST']}", true, 301);
        exit();
    }
}

$pagePath = VIEWS_PATH . "/pages/$pageName";

if (file_exists($pagePath)) {
    require_once VIEWS_PATH . '/layout/main.php';
} else {
    require VIEWS_PATH . '/pages/404.php';
}
