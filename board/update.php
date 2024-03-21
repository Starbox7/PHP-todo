<?php
$dbconn = pg_connect("host=localhost dbname=php user=starbox7 password=starbox7");

if($_POST['act'] == 'u' && $_POST['no']){
    $query = "UPDATE board SET name = '".pg_escape_string($_POST['name'])."', title = '".pg_escape_string($_POST['title'])."', content = '".pg_escape_string($_POST['content'])."' WHERE no = '".pg_escape_string($_POST['no'])."'";
    $result = pg_query($dbconn, $query);
    
    if ($result) {
        echo "<script>alert('글수정 완료.'); location.href='view.php?no=".$_POST['no']."';</script>";
    } else {
        echo "<script>alert('글수정 실패.'); location.href='form.php?no=".$_POST['no']."&act=u';</script>";
    }
} else if($_GET['act'] == 'd' && $_GET['no']){
    $query = "DELETE FROM board WHERE no = '".pg_escape_string($_GET['no'])."'";
    $result = pg_query($dbconn, $query);
    
    if ($result) {
        echo "<script>alert('글삭제 완료.'); location.href='list.php';</script>";
    } else {
        echo "<script>alert('글삭제 실패.'); location.href='view.php?no=".$_POST['no']."';</script>";
    }
} else {
    $query = "INSERT INTO board (name, title, content, regdate) VALUES ('".pg_escape_string($_POST['name'])."', '".pg_escape_string($_POST['title'])."', '".pg_escape_string($_POST['content'])."', NOW())";
    $result = pg_query($dbconn, $query);
    
    if ($result) {
        echo "<script>alert('글작성 완료.'); location.href='list.php';</script>";
    } else {
        echo "<script>alert('글작성 실패.'); location.href='form.php';</script>";
    }
}
?>
