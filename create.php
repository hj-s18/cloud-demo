# 일반적으로 사용자 입력을 위한 폼(form)을 제공하는 페이지
# 데이터베이스와 상호작용하는 웹 애플리케이션에서 데이터 생성(Create)을 처리하기 위한 입력 화면으로 주로 사용함
# 즉, 데이터를 입력받는 사용자 인터페이스를 제공함
# /var/www/html/ 경로에 PHP 파일을 두면, 웹 브라우저를 통해 해당 파일을 접근하고 실행할 수 있음
# http://<컨테이너 IP>/create.php: 사용자 입력 화면 제공 => 사용자가 브라우저에서 create.php를 열어 입력 폼에 데이터를 작성
  # 참고 : 사용자가 입력한 데이터를 제출하면 process_create.php가 이를 처리 (例: 데이터베이스에 삽입)


<!doctype html>
<html>
  <head>
    <meta charset="utf-8">
    <title>WEB</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
    integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  </head>
  <body>

  <div class="jumbotron jumbotron-fluid">
      <div class="container">
        <h1 class="display-4"> Input the title and description </h1>
      </div>
  </div>
  <div class="container">
    <form action="process_create.php" method ="POST">

    <div class="form-group">
    <label >Title</label>
    <input type="text" name="title" class="form-control" placeholder="Input Title">
    </div>
  <div class="form-group">
    <label >description</label>
    <input type="text" name="description" class="form-control"  placeholder="Input Description">
  </div>

  <button type="submit" class="btn btn-primary">Submit</button>
  </form>
  </div>  
  </body>
</html>
