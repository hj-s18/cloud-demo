FROM php:7.3-apache
# php:7.3-apache 이미지를 기반으로 필요한 설정, 패키지, 파일 등을 추가하거나 변경하여 새로운 Docker 이미지 생성
# PHP 7.3 : PHP 버전 7.3이 설치된 환경을 제공 (PHP : 서버 측 스크립트 언어로, 주로 웹 애플리케이션 개발에 사용됨)
# Apache : HTTP 요청을 처리하고 클라이언트(브라우저)로 웹 페이지를 전송하는 역할을 함
# 기본적으로 PHP 파일은 Apache 서버의 문서 루트(/var/www/html/) 디렉터리에서 제공됨

# php:7.3-apache는 PHP 공식 Docker 이미지 중 하나로, PHP와 Apache를 함께 설정한 상태로 제공되며, Docker Hub의 PHP 공식 리포지토리에서 유지 관리됨
# PHP 애플리케이션을 실행하기 위한 기본 환경이 이미 설정되어 있어 편리함



COPY *.php /var/www/html/
# 애플리케이션 소스를 컨테이너에 복사
# /var/www/html/ : PHP 파일을 이 디렉터리에 배치하면, Apache가 이를 처리하여 클라이언트에게 제공
# PHP 파일은 Apache에서 해석되고 결과가 클라이언트로 전송됨
# 추가적인 설정이나 확장이 필요하면 RUN 명령으로 추가하면 됨

# create.php : 데이터를 입력받는 사용자 인터페이스 제공
# process_create.php : create.php에서 전송된 데이터를 처리하여 데이터베이스나 파일 시스템에 저장

# http://<컨테이너 IP>/create.php: 사용자 입력 화면 제공 => 사용자가 브라우저에서 create.php를 열어 입력 폼에 데이터를 작성
# http://<컨테이너 IP>/process_create.php: 입력된 데이터를 처리 => 사용자가 입력한 데이터를 제출하면 이를 처리 (例: 데이터베이스에 삽입)



RUN docker-php-ext-install mysqli
# 추가 확장 설치 (mysqli)
# docker-php-ext-install mysqli : PHP가 MySQL 데이터베이스와 상호작용할 수 있도록 mysqli 확장을 설치하는 명령어



# EXPOSE 80
  # 포트 80을 노출
