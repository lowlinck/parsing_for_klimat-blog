<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>
    <div class="content">
        <div class="container">
            <div class="row">
                <div class="col-sm">
                    <?php echo '<pre>' . print_r(($this->tables), true) . '</pre>';?>
                </div>
                <div class="col-sm">
                   <?php echo '<pre>' . print_r(($this->table), true) . '</pre>';?>
                </div>
                <div class="col-sm">
                    <?php echo '<pre>' . print_r(($this->data), true) . '</pre>';?>
                </div>
                <div class="col-sm">
                <?php foreach ($this->img as $key){
                echo "<img src ='https://cooperandhunter.ua/$key' width='200 px' height='150 px'>";
                }?>
                 </div>
                <div class="col-sm">
                    <?php echo $this->text;?>
                </div>
            </div>
        </div>
    </div>
</body>
</html>


<?php
/*header('Content-type:text/html; charset=utf-8');

foreach ($this->img as $key){
    echo "<img src ='https://cooperandhunter.ua/$key'>";
}
echo "$this->text";

echo $this->table[3];
echo "</br>";
echo $this->user;
echo "</br>";
echo $this->models;
echo "</br>";
echo $this->price;

echo '<pre>' . print_r(($this->tables), true) . '</pre>';
echo '<pre>' . print_r(($this->data), true) . '</pre>';
echo '<hr>';*/