<?php
# PHP 코드



$conn = mysqli_connect("DB IP","root","Test123!","webtest",3306);
# mysqli_connect() 함수를 사용하여 MySQL 데이터베이스에 연결
# mysqli_connect(데이터베이스 서버의 IP 주소, 데이터베이스 사용자 계정 이름, 데이터베이스 비밀번호, 사용할 데이터베이스 이름, 데이터베이스 포트 번호(기본 MySQL 포트))
# 例: $conn = mysqli_connect("172.17.0.3","root","Test123!","webtest",3306);
# Docker에서 MySQL 이미지를 기본 설정으로 실행하면 MYSQL_ROOT_PASSWORD를 통해 root 계정이 활성화됨 (docker inspect 명령어로 보면 Env에 MYSQL_ROOT_PASSWORD 있음)



$sql = "insert into items (title, description, created) value ('{$_POST['title']}','{$_POST['description']}', now())";
# SQL 쿼리 생성

# insert into items: items라는 테이블에 데이터 삽입
# {$_POST['title']}: 사용자가 HTML 폼을 통해 전송한 title 데이터 삽입
# {$_POST['description']}: 사용자가 전송한 description 데이터 삽입
# now(): 현재 시간을 created 열에 삽입

# $_POST['title'], $_POST['description'] : PHP의 $_POST 슈퍼글로벌 배열을 통해 폼에서 전달된 데이터를 가져옴
# SQL 인젝션 공격을 방지하기 위해 $_POST 데이터를 반드시 검증 및 필터링해야 함
# 데이터베이스 사용자 계정 및 비밀번호는 실제 운영 환경에서 안전하게 관리해야 하며, 코드에 하드코딩하지 않는 것이 좋음



mysqli_query($conn,$sql);
# SQL 실행
# mysqli_query() 함수를 사용하여 MySQL 쿼리를 실행
# $conn: 데이터베이스 연결 객체
# $sql: 실행할 SQL 쿼리



if ($result=== false){
    echo 'error occured.';
    error_log(mysqli_error($conn));
}
# if ($result === false) : SQL 실행 결과가 실패한 경우(例: 테이블이 없거나 데이터가 잘못된 경우)
# error_log(mysqli_error($conn)) : 에러 메시지를 서버 로그에 기록


echo 'Succeed. <a href="index.php"> back</a>';
# 데이터 삽입이 성공적으로 완료되면 화면에 성공 메시지 출력
# index.php로 돌아가는 링크 제공



?>
