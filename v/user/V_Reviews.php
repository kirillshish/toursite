<?
$request_array = null;
?>
<div class="reviews_container">
    <div class="reviews">
        <h1>Отзывы</h1>
        <?
            $reviews = new M_Model;
            $reviews->showReviews();
        ?>
    </div>
    <div class="make_review">
        <h3>Оставить отзыв</h3>
        <hr id="review_horizontal_hr">
        <form method="post" id="make_review_form">
            <input type="text" name="name" value="<?=$_SESSION['name']?>" placeholder="Ваше имя" class="review_input_form">
            <input type="text" name="hotel" placeholder="Ваш отель" class="review_input_form">
            <input type="text" name="place" placeholder="Страна поездки" class="review_input_form">
            <textarea name="text" placeholder="Напишите отзыв" ></textarea>
            <input type="submit" value="Оставить отзыв" class="review_submit_form">
        </form>
        <?
            $request_array = $_POST;
            $user_review = new M_User;
            $user_review->makeReview($request_array);
        ?>
    </div>
</div>
<script type="text/javascript">
    $('.review').click(function() {
        $(this).css('height','auto');
        $(this).css('overflow', 'visible');
    });
</script>