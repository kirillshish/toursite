<div class="reviews_container_unsigned">
    <h1>Отзывы</h1>
    <?
        $reviews = new M_Model;
        $reviews->showReviews();
    ?>
</div>
<script type="text/javascript">
    $('.review').click(function() {
        $(this).css('height','auto');
        $(this).css('overflow', 'visible');
    });
</script>