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
            <a class="logo" href="">
              <span>L</span>
              <span>O</span>
              <span>G</span>
              <span>O</span>
            </a>
          </nav>
          <form> 
            <input type="text" name=text" class="search" placeholder"Search here!">
            <input type="submit" name="submit" class="submit1" value="Search">
          </form>
          <ul id="menu">
            <li><a href="">Профиль</a></li>
            <li><a href="">Заказы</a></li>
            <li><a href="">Корзина</a></li>
          </ul>
        </nav>
      </header>
      <div class="container">
        <div class="posts-list">
          <ul class="products-clearfix">
            <a class="nav-link" href="create.php">Add new</a>
                <?php
                    include "connection.php";
                    $sql = "select * from products";
                    $result = $conn->query($sql);
                    if(!$result){
                        die("invalid qury!");
                    }
                    while($row=$result->fetch_assoc()){
                        echo "
                        <li class='product-wrapper'>
                        <a href='' class='product1'>$row[name] $row[cost]$</a>
                        <figcaption>$row[describes]</figcaption>
                        </li>
                        <li>
                        <a  href='edit.php?id=$row[id]'>Edit</a>
                        <a  href='delete.php?id=$row[id]'>Delete</a>
                        </li>
                    ";
                }
                
                ?>
          </ul>
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
            <div class="widget">
              <h3 class="widget-title">Подписка на рассылку</h3>
              <form action="" method="post" class="subscribe">
                <input type="email" name="email" placeholder="Ваш email" required>
                <button type="submit" name="submint"><input class="submit2" value="Send"></input></button>
              </form>
            </div>
          </aside>
      </div> 
          <footer>
            <div class="container">
              <div class="footer-col"><span>My shop</span></div>
              <div class="footer-col">
                <a href="mailto:kostya.pinchuk.04@gmail.com">Отправить жалобу</a>
              </div>
            </div>
          </footer>
    </body>
</html>
