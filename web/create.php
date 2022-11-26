<?php
    include "connection.php";
    require_once('./errorcollection.php');
    
    $errors = new errorcollection();
    

    $errorMessage="";
    if(isset($_POST['submit'])){
      $errorFlag = 0;
      $name = $_POST["name"];
      $cost = intval($_POST["cost"]);
      $describes = $_POST["describes"];
        if(empty($name)){
          $errors->addError("Введите название товара!");
          $errorFlag = 1;
        }
        elseif(empty($cost)){
          $errors->addError("Введите стоймость товара!");
          $errorFlag = 1;
        }
        elseif(!is_integer($cost)){
          $errors->addError("Не верно указана стоймость товара!");
          $errorFlag = 1;
        }
        $errorMessage = implode("<br />", $errors->getErrors());
        
        if($errorFlag == 0){
        
        $q = (" INSERT INTO `products`(`name`, `describes`, `cost`) VALUES('". $name ."','". $describes ."', $cost );"); 

        $query = mysqli_query($conn,$q);    
        }
          
      }
?>
<!DOCTYPE html>
<html>
 <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="style.css">
    <title>Онлайн магазин</title>
 </head>
 <body>
    <header>
        <nav class="container">
          <nav class="container1">
            <a class="logo" href="index.php">
              <span>L</span>
              <span>O</span>
              <span>G</span>
              <span>O</span>
            </a>
          </nav>
          <ul id="menu">
            <li><a href="">Профиль</a></li>
            <li><a href="">Заказы</a></li>
            <li><a href="">Корзина</a></li>
          </ul>
        </nav>
      </header>
      <div class="creator">
        <h1> Создание карточки товара.</h1>
        <?php
            if(isset($errorMessage)){
              echo "<h2>". $errorMessage ."</h2>";
            }
         ?>
        <form method="POST" action="create.php">
        <label> Name:</label>
        <input type="text" name ="name" /> <br />
        <label> Cost($):</label>
        <input type="text" name ="cost" /> <br />
        <label> Describe:</label>
        <input type="text" name ="describes" /> <br />
        <button class="btn btn-success" type="submit" name="submit"> Submit </button><br>
        <a class="btn btn-info" type="submit" name="cancel" href="index.php"> Cancel </a><br> 
        </form>
      </div>
    </div>
        <aside>
            <div class="widget">
              <h3 class="widget-title">Категории</h3>
              <ul class="widget-category-list">
                <li><a href="">Зима</a> (2)</li>
                <li><a href="">Лето</a> (5)</li>
                <li><a href="">Осень</a> (1)</li>
                <li><a href="">Весна</a> (4)</li>
              </ul>
            </div>
            <div class="widget">
              <h3 class="widget-title">Часто заказывают</h3>
              <ul class="widget-posts-list">
                <li>
                  <a href="" class="post-image1"></a>
                </li>
                <li>
                  <a href="" class="post-image2"></a>
                </li>
                <li>
                  <a href="" class="post-image3"></a>
                </li>
              </ul>
            </div>
          </aside>
      </div> 
    </body>
</html>
