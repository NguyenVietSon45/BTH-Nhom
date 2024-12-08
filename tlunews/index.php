<?php
require_once 'controllers/HomeController.php';
require_once 'controllers/NewsController.php';
require_once 'controllers/AdminController.php';

$controller = isset($_GET['controller']) ? $_GET['controller'] : 'home';
$action = isset($_GET['action']) ? $_GET['action'] : 'index';

switch ($controller) {
    case 'home':
        $controller = new HomeController();
        break;
    case 'news':
        $controller = new NewsController();
        break;
    case 'admin':
        $controller = new AdminController();
        break;
    default:
        die('Controller không tồn tại!');
}

$controller->$action();
?>

<script>
document.getElementById('searchForm').addEventListener('submit', function(e) {
    e.preventDefault();
    const keyword = document.getElementById('searchKeyword').value;

    fetch(`?controller=home&action=index&ajax=true&keyword=${encodeURIComponent(keyword)}`)
        .then(response => response.text())
        .then(data => {
            document.getElementById('newsResults').innerHTML = data;
        })
        .catch(error => console.error('Có lỗi xảy ra:', error));
});
</script>
