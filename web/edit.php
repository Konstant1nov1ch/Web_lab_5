<?php
    include "connection.php";
    require_once('./errorcollection.php');
    
    $errors = new errorcollection();
    

    $errorMessage="";
    
    $id="";
    $name="";
    $cost2=0;
    $describes="";

    $error="";
    $succes="";

    if($_SERVER["REQUEST_METHOD"] == 'GET'){
        if(!isset($_GET["id"])){
            header("location:index.php");
            exit;
        }
    
    $id = $_GET["id"];
    $sql = ("SELECT * FROM products WHERE id=$id;");
    $result=$conn->query($sql);
    $row=$result->fetch_assoc();
    while(!$row){
        header("location:index.php");
        exit;
    }
    $name = $row["name"];
    $describes = $row["describes"];
    $cost=$row["cost"];
  }
  else{
    if(isset($_POST['submit'])){
      $errorFlag2 = 0;
      $id = $_POST["id"];
      $name=$_POST["name"];
      $cost2=intval($_POST["cost"]);
      $describes=$_POST["describes"];
      if(empty($name)){
        $errors->addError("Введите название товара!");
        $errorFlag2 = 1;
      }
      elseif(empty($cost2)){
        $errors->addError("Введите стоймость товара!");
        $errorFlag2 = 1;
      }
      elseif(!is_integer($cost2)){
        $errors->addError("Не верно указана стоймость товара!");
        $errorFlag2 = 1;
      }
      $errorMessage = implode("<br />", $errors->getErrors());

      if($errorFlag2 == 0){

        $sql = ("UPDATE `products` SET name='$name'  WHERE id=$id;");
        $result = $conn->query($sql);
    

        $sql = ("UPDATE `products` SET cost=$cost2 WHERE id=$id;");
        $result = $conn->query($sql);

        $sql = ("UPDATE `products` SET describes='$describes' WHERE id= $id;");
        $result = $conn->query($sql);
        header("location:index.php");
      }

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
        <h1> Редактирование карточки товара.</h1>
        <?php
            if(isset($errorMessage)){
              echo "<h2>". $errorMessage ."</h2>";
            } 
         ?>
        <form method="POST" action="edit.php">
        <input type="hidden" name="id" value="<?php echo $id;?>" class="form-control"> <br>
        <label> Name:</label>
        <input type="text" name ="name" value="<?php echo $name;?>"/> <br>
        <label> Cost($):</label>
        <input type="text" name ="cost" value="<?php echo $cost;?>"/> <br />
        <label> Describe:</label>
        <input type="text" name ="describes" value="<?php echo $describes;?>"/> <br />
        <button  type="submit" name="submit"> Submit </button><br>
        <a  type="submit" name="cancel" href="index.php"> Cancel </a><br> 
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
