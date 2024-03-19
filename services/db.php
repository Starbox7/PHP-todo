<?php
// PostgreSQL 데이터베이스 연결 문자열
$connectionString = "host=localhost port=5432 dbname=php user=starbox7 password=starbox7";

// 데이터베이스 연결 시도
$dbconn = pg_connect($connectionString);

// 연결 성공 여부 확인
if ($dbconn) {
    echo "데이터베이스에 성공적으로 연결되었습니다.";
} else {
    echo "데이터베이스 연결에 실패했습니다.";
}
?>
