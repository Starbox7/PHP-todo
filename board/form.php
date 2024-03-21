<?php
if (isset($_GET['no'])) {
    $dbconn = pg_connect("host=localhost dbname=php user=starbox7 password=starbox7");
    $query = "SELECT * FROM board WHERE no = '".pg_escape_string($_GET['no'])."'";
    $result = pg_query($dbconn, $query);
    $form = pg_fetch_array($result);
} else {
    $form = array('no' => '', 'name' => '', 'title' => '', 'content' => '');
}
// include("header.php");
?>
<link rel="stylesheet" href="css/board.css">
<div>
    <form action="update.php" method="post">
        <input type="hidden" name="no" value="<?php echo htmlspecialchars($form['no']); ?>">
        <input type="hidden" name="act" value="<?php echo isset($_GET['act']) ? htmlspecialchars($_GET['act']) : ''; ?>">
        <div class="bo_w_info write_div">
            <input type="text" name="name" class="frm_input full_input" placeholder="글쓴이" required value="<?php echo htmlspecialchars($form['name']); ?>">
            <input type="text" name="title" class="frm_input full_input" placeholder="제목" required value="<?php echo htmlspecialchars($form['title']); ?>">
            <textarea name="content" class="frm_area" placeholder="내용" required><?php echo htmlspecialchars($form['content']); ?></textarea>
        </div>
        <div class="btn_confirm write_div">
            <a href="list.php" class="btn btn_cancel">취소</a>
            <input type="submit" class="btn btn_submit" value="입력">
        </div>
    </form>
</div>
<?php
// include("footer.php");
?>
