<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);


// common setting
include('routes/router.php');
date_default_timezone_set('Asia/Seoul');
define('BASEPATH','/');


// route setting
Router::add('GET', '/',function() {
    include('board/form.php');
});

Router::add('GET', '/post',function() {
    include('pages/post.php');
});

Router::add('GET', '/post.php',function() {
    include('pages/post.php');
});

// Router::add('GET', '/test_page2/sub_page2',function() {
//     include('routes/test_page2/sub_page2.php');
// });

Router::run(BASEPATH);

?>