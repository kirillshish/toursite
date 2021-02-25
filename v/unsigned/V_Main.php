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
                    <h1 id="logo_text"><a href="index.php?act=Index">РУССО ТУРИСТО</a></h1>
                </div>
                <div class="navbar">
                    <a href="index.php?act=Index" class="navbar_a_unsigned">ГЛАВНАЯ</a>
                    <a href="index.php?act=About" class="navbar_a_unsigned">О НАС</a>
                    <a href="index.php?act=Tours" class="navbar_a_unsigned">ГОРЯЩИЕ ТУРЫ</a>
                    <a href="index.php?act=Reviews" class="navbar_a_unsigned">ОТЗЫВЫ</a>
                    <a href="index.php?act=Request" class="navbar_a_unsigned">ОСТАВИТЬ ЗАЯВКУ</a>
                    <a href="index.php?act=Auth" class="navbar_a_unsigned">АВТОРИЗАЦИЯ</a>
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