<?php

// common setting
include('routes/router.php');
date_default_timezone_set('Asia/Seoul');
define('BASEPATH','/');


// route setting
Router::add('GET', '/',function() {
    include('pages/home.html');
});

// Router::add('GET', '/test_page2',function() {
//     include('routes/test_page2/index.php');
// });

// Router::add('GET', '/test_page2/sub_page1',function() {
//     include('routes/test_page2/sub_page1.php');
// });

// Router::add('GET', '/test_page2/sub_page2',function() {
//     include('routes/test_page2/sub_page2.php');
// });

Router::run(BASEPATH);

?>