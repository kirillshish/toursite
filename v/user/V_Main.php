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
                    <a href="index.php?act=Index" class="navbar_a">ГЛАВНАЯ</a>
                    <a href="index.php?act=About" class="navbar_a">О НАС</a>
                    <a href="index.php?act=Tours" class="navbar_a">ГОРЯЩИЕ ТУРЫ</a>
                    <a href="index.php?act=Reviews" class="navbar_a">ОТЗЫВЫ</a>
                    <a href="index.php?act=Request" class="navbar_a">ВАШИ ЗАЯВКИ</a>
                    <a href="index.php?act=Profile" class="navbar_a_profile">
                    <hr id="vertical_main_hr">
                    <div class="main_profile">
                        <img src="<?=$_SESSION['img']?>" width="60px" height="60px" id="mini_profile_img">
                        <div class="main_profile_navbar">
                            <strong><?=$_SESSION['name']?></strong>
                            <a href="index.php?act=Exit">Выйти</a>
                    </div>
                        <div class="mini_cart">
                            <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAB4AAAAeCAYA
                                AAA7MK6iAAAABmJLR0QA/wD/AP+gvaeTAAADxklEQVRIib2WwWtcVRSHv3
                                NfYqZNo1iTpraBmXkJzSILUVBa04WgojTdiBTBjYg7hS6kVpRk+oi1C82mKN35
                                FxRxFevKuqpIFRHE0mDieyZ9M0lsFSvScebd42JeXt6bGWMmjj2rmd+953znnnvPfVfYpoUl93ng
                                FZTethOEGvDRgdmlj7cTT9qJKyX3SQfdm5o2qPAh8CVI2D6UHgSOCLwG+kviaczN/d7i5/8KvjFdHB
                                cj19qNWcP4iLe00DZZzz1kLNfbZeSYnrFhb2EpLfY0zzKG4wrV3nrk/mn1DkAul7s/svUrxvJ9WHL/aA
                                fGsgcoGxtNVuv6G8BuI7laj7NUt9EU8MGWYKtyTITLQ+eCckr+df3t/MN1x3nOCgPtuAZ+d4z9ZN9sUEnr
                                Ycm9LKrHtwTf9MburVp7VNDXmwPHiVxou9otTFU/FZG59dPjA0PvXb+dSnTTqtY+DdxjrPNZp4B/MkftPNB
                                Xy9WfSusZsMAU8MPw2R8XuwXefzb4CeQa6FRbsIKAPKPofLegSWxhHjimqU6R8szYhKKTwD5E31Hhglj5rqtg
                                ow+J8ioqM8Cacbgi4UzxEiLPdhO0DbvUg7AKXD0wu/TY3SCGJfcqyIpRxAcKdwMaWwFsYIAAGFrzJvb838TK
                                qeF+YBDEN6axYqKomk9PKpdG36h4hcNpTUHCM8Xzq94hd0NbnR4bDc8Uz2vT3V6ecR8NS+5bGf9dAwUAV
                                fGN2LoPgNhMuRV9Sa28mNbWvYl+VE5GUe3xDS2S6AgqJ9e9if6Mv8gLwMuZJccMax3fDPcUl4E6aPM+/
                                4yaPDs2LQB+WrGqReCvkd6FshHvizpww0IzxEdakunECsTbmJgxeSAQDxvfXOILpqnUBArFnXO1ADZI
                                K2I3qxCDrd9SapUAGFj2RvbSoa2fHh8AeaBlxbJZBQPQrpcVCQAcch2XO+qrJae3aSipwsZHIgC
                                GGpk2rC+qxU62c3B8Nqx1EnAcezCz4qSXd9eTAzZ4LqgAd4h2cquZAvHpTZJpqoIBSHo5tc8CCixjt
                                OOWkkaHBOJhE3BTFQzA8NrgClCPouwBU5Fv0/+HwlwVuKWOVDbnsAp6Mx7bUE2zL0oeqKarAEBYcv2wN
                                DqXmXsCR73sK0W9J1oeiM2aehg9gZONPzoXltzkaZxykJaWkotEXMxC4gtnSy1d4lQ6mZssvZqvgclbb7r3
                                tTr9N4tjHo0ZjeQ2flSm80VrnG+A2yBfdReth4FdGskjB99dXM6AofGJixx7CstYV7GGBSP2/Qc9Pyn138K
                                /iTHRVDVhAAAAAElFTkSuQmCC" id="mini_profile_second_img">
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