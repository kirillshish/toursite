<div id="banner"></div>
<div class="fixedcontainer">
    <div class="info">
        <div class="block first">
            <p class="info_big_text">Туры по России</p>
            <p class="info_small_text">Самые выгодные цены на путевки в Россию от ведущих туроператоров и лучших турфирм</p>
            <a class="index_info_button_first" href="index.php?act=Tours">Узнать больше</a>
        </div>
        <div class="block second">
            <p class="info_big_text">Зарубежные туры</p>
            <p class="info_small_text">Пляжный отдых на популярных курортах Турции и  Кипра или ознакомительный тур в самые разные города мира</p>
            <a class="index_info_button_second" href="index.php?act=Tours">Узнать больше</a>
        </div>
        <div class="block third">
            <p class="info_big_text">Экскурсионные туры</p>
            <p class="info_small_text">Возможность полюбоваться уникальными памятниками, принять участие в местных праздниках,
            познакомиться с интересными традициями и людьми.</p>
            <a class="index_info_button_third" href="index.php?act=Tours">Узнать больше</a>
        </div>
        <div class="block fourth">
            <p class="info_big_text">Морские и речные круизы</p>
            <p class="info_small_text">Путешествия по России и за границей от Балтики до Средиземноморья, от Тихого до Атлантики </p>
            <a class="index_info_button_fourth" href="index.php?act=Tours">Узнать больше</a>
        </div>
    </div>  
    <div class="notecontainer">
        <div class="notes">
            <?php
                $obj = new M_Model;
                $obj->showNotesIndexPage();?>
        </div>
        <div class="notesinfo">
            <h1>Горящие туры</h1>
            <p>Актуальные туры по низким ценам.</p>
            <a href="index.php?act=Tours" id="href_notes">Все туры <img src="/v/img/arrow1.png" style="margin-left:10px"></a>
        </div>
    </div>
</div>