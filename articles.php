<?php
require "includes/config.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Блог IT_Минималиста!</title>


    <!-- Bootstrap Grid -->
    <link rel="stylesheet" type="text/css" href="media/assets/bootstrap-grid-only/css/grid12.css">


    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" rel="stylesheet">


    <!-- Custom -->
    <link rel="stylesheet" type="text/css" href="media/css/style.css">
</head>
<body>

<div id="wrapper">

    <?php include "includes/header.php"; ?>
    <?php
    $article = mysqli_query($connection,"SELECT * FROM `articles` WHERE `id`= " . (int) $_GET['id']);
    if(mysqli_num_rows($article) <=0 )
    { ?>
    <div id="content">
        <div class="container">
            <div class="row">
                <section class="content__left col-md-8">
                    <div class="block">
                        <h3>статья не найдена</h3>
                        <div class="block__content">
                            <img src="media/images/post-image.jpg">
                            <div class="full-text">
                                запрашиваемая статья не существует!
                            </div>
                        </div>
                    </div>
                </section>
                <section class="content_right col-md-4">
                    <?php include "includes/sidebar.php"; ?>
                </section>
            </div>
        </div>
    </div>
   }  else
    {
      $art = mysqli_fetch_assoc($article);
      mysqli_query($connection, "UPDATE `articles` SET `views`=`views`+1 WHERE `id`=" . (int) $art['id']);
      ?>
    <div id="content">
        <div class="container">
            <div class="row">
                <section class="content__left col-md-8">
                    <div class="block">
                      <a><?php echo $art['views'];?>просмотров</a>
                          <h3><?php echo $art['title']; ?></h3>
                        <div class="block__content">
                        <img src="static/images/<?php echo $art['image']; ?>" style="max-width: 100%;">
                          <div class="full-text"><?php echo $art['text']; ?></div>
                            </div>
                        </div>

                </section>
                <section class="content_right col-md-4">
                    <?php include "includes/sidebar.php"; ?>
                </section>
                  </div>
                    </div>
                      </div>
              <?php
}
?>
                <?php include "includes/footer.php"; ?>

</div>

</body>
</html>
