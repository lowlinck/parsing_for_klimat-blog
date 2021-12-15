<!DOCTYPE html>
<html lang="ru">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <title>test</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link href="/css/main.css" rel="stylesheet">
    <script src="/js/main.js"></script>
  </head>

  <body>

    <div class="container">
      <div class="header">
        <ul class="nav nav-pills pull-right">
          <li <?php if($this->name == 'main'  ){ echo 'class="active"'; }; ?>><a href="/">Главная</a></li>
          <li <?php if($this->name == 'task'  ){ echo 'class="active"'; }; ?>><a href="/task">Задачник</a></li>
          <li <?php if($this->name == 'admin' ){ echo 'class="active"'; }; ?>><a href="/admin">Админка</a></li>
          <li <?php if($this->name == 'pharsing' ){ echo 'class="active"'; }; ?>><a href="/pharsing">Парсинг</a></li>
        </ul>
        <h3 class="text-muted">Тестовое Сергей Могилевич</h3>
      </div>

      <?php include 'app/views/'.$this->name.'_view.php'; ?>

      <div class="footer">
        <p>&copy; Sergey Mogilevich 2021</p>
      </div>

    </div>
	
  </body>
</html>