<?php
$url = $_GET['url'];
if (str_contains($url, URL_AUTH)) {
    echo '<script src="' . BASEURL . '/js/script_Auth.js"></script>';
    echo '<script src="' . BASEURL . '/js/script.js"></script>';
}
?>
</body>

</html>