<?
$request_array = null;
?>
<h1 id="h1_reviews">Отзывы</h1>
<div class="reviews_container">
    <div class="priority_reviews">
        <h3>Отзывы на сайте</h3>
    <?
        $reviews = new M_Admin;
        $active_reviews = $reviews->showReviews();
        for($i=0;$i<count($active_reviews);$i++){
            $active_reviews[$i];?>
            <div class="review">
                    <div class="left_side_review">
                        <div class="review_mini_profile">
                            <img id="review_img" src="<?=$active_reviews[$i]['img']?>">
                            <p id="review_name"><?=$active_reviews[$i]['name']?></p>
                            <p id="review_date"><?=$active_reviews[$i]['date']?></p>
                        </div>
                    </div>
                    <div class="right_side_review">
                        <div class="review_content">
                            <div class="review_content_title">
                                <p id="review_hotel"><?=$active_reviews[$i]['hotel']?></p>
                                <p id="review_place"><?=$active_reviews[$i]['place']?></p>
                            </div>
                            <p id="review_text"><?=$active_reviews[$i]['text']?></p>
                        </div>
                    </div>
                </div>    
                <a href="index.php?act=Admin_Reviews&id=<?=$active_reviews[$i]['review_id']?>&check=1" id="review_check">Проверить</a>   
    <?}?>
    <?
        if($_GET['check']==1){
            $reviews->checkReview();
        }
    ?>
    </div>
    <div class="admin_reviews">
        <h3>Отзывы на проверке</h3>
        <?
            $array_reviews = $reviews->showAdminReviews();
                for($i=0;$i<count($array_reviews);$i++){
                    $array_reviews[$i];?>
                        <div class="admin_simple_review">
                            <div class="left_side_review">
                                <div class="review_mini_profile">
                                    <img id="review_img" src="<?=$array_reviews[$i]['img']?>">
                                    <p id="review_name"><?=$array_reviews[$i]['name']?></p>
                                    <p id="review_date"><?=$array_reviews[$i]['date']?></p>
                                </div>
                            </div>
                            <div class="right_side_review">
                                <div class="review_content">
                                    <div class="review_content_title">
                                        <p id="review_hotel"><?=$array_reviews[$i]['hotel']?></p>
                                        <p id="review_place"><?=$array_reviews[$i]['place']?></p>
                                    </div>
                                    <p id="review_text"><?=$array_reviews[$i]['text']?></p>
                                </div>
                            </div>
                        </div>
                        <div class="admin_review">
                            <a href="index.php?act=Admin_Reviews&id=<?=$array_reviews[$i]['review_id']?>&accept=1" id="review_button1">Принять</a>
                            <a href="index.php?act=Admin_Reviews&id=<?=$array_reviews[$i]['review_id']?>&delete=1" id="review_button2">Удалить</a>
                        </div>
                    <?}?>
    </div>
    <?
        if($_GET['accept']==1){
            $reviews->acceptReview();
        }
        if($_GET['delete']==1){
            $reviews->deleteReview();
        }
    ?>
</div>
<script type="text/javascript">
    $('.admin_simple_review').click(function() {
        $(this).css('height','auto');
        $(this).css('overflow', 'visible');
    });
</script>