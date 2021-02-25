<div class="tours_container">
    <div class="tour_title">
        <h1>Горящие туры</h1>
        <div class="tour_href">
            <a href="index.php?act=Admin_Create" class="tours_href_tour">
            Добавить тур
            </a>
        </div>
    </div>
   <div class="tour_notes">
       <p class="tour_notes_p">Актуальное:</p>
       <div class="actual_tours">
        <?
            $unsigned = new M_Model;
            $array_tours = $unsigned->showTours();
            if($array_tours){
                $count = count($array_tours);
                for($i=0;$i<$count;$i++){
                    $array_tours[$i];

                ?>
                    <a href="index.php?act=Product&id=<?=$array_tours[$i]['tour_id']?>" id="note">
                    <div class="note">
                        <div class="note_img">
                            <img src="<?=$array_tours[$i]['img']?>" width="100%" height="100%">
                        </div> 
                        <div class="note_content">
                            <div class="up_note_content">
                                <div class="up_note_p">
                                    <p id="up_note_p">
                                        <?=$array_tours[$i]['hotel']?> 
                                        <?=$array_tours[$i]['stars']?>*
                                    </p>
                                </div>
                                <p id="up_note_place">
                                    <?=$array_tours[$i]['place']?>
                                </p>
                            </div>
                            <div class="mid_note_content">
                                <p>Вылет: <?=$array_tours[$i]['flight_dates']?></p>
                            </div>
                            <div class="bot_note_content">
                                <p><?=$array_tours[$i]['nights']?> ночей</p>
                                <p id="bot_note_cost"><?=$array_tours[$i]['cost']?></p>
                            </div>
                        </div>
                    </div>
                    </a>
                <?}
            }
        ?>
       </div>
   </div>
</div>