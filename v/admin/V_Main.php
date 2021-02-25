<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?=$title?></title>
    <script
    src="http://code.jquery.com/jquery-3.5.1.js"
    integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc="
    crossorigin="anonymous"></script>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Condensed:wght@300;400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="/v/css/main.css">
</head>
<body>
        <div class="header">
            <div class="container">
                <div class="logo">
                    <h1 id="logo_text"><a href="index.php?act=Profile">АДМИН ПАНЕЛЬ</a></h1>
                </div>
                <div class="navbar">
                    <a href="index.php?act=Admin_Tours" class="navbar_a">ГОРЯЩИЕ ТУРЫ</a>
                    <a href="index.php?act=Admin_Reviews" class="navbar_a">ОТЗЫВЫ</a>
                    <a href="index.php?act=Admin_Requests" class="navbar_a">ЗАЯВКИ</a>
                    <a href="index.php?act=Profile" class="navbar_a_profile">
                    <div class="main_profile">
                        <img src="<?=$_SESSION['img']?>" width="60px" height="60px" id="mini_profile_img">
                        <div class="main_profile_navbar">
                            <strong><?=$_SESSION['name']?></strong>
                            <a href="index.php?act=Exit">Выйти</a>
                    </div>
                    </div>
                    </a>
                </div>
            </div>  
        </div>
        <div class="content">
            <?=$content?>
        </div>

        <div class="footer">
            <div class="container">
                <div class="copyrights">
                    <p>Руссо Туристо - туристическое агенство с 2014 года</p>
                    <p>Все права защищены.&copy</p>
                </div>
                <div class="contacts">
                    <p>+79656054753</p>
                    <p>Дубравная 51Г</p>
                </div>
            </div>
        </div>
</body>
</html>