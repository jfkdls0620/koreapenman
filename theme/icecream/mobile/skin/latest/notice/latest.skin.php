<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가
include_once(G5_LIB_PATH.'/thumbnail.lib.php');

// add_stylesheet('css 구문', 출력순서); 숫자가 작을 수록 먼저 출력됨
add_stylesheet('<link rel="stylesheet" href="'.$latest_skin_url.'/style.css">', 0);
?>

<div class="notice_wr">
    <h2><a href="<?php echo get_pretty_url($bo_table); ?>"><?php echo $bo_subject ?></a></h2>
    <ul class="lt_notice">
    <?php for ($i=0; $i<count($list); $i++) { ?>
        <li>
            <?php
            if ($list[$i]['icon_secret']) echo "<i class=\"fa fa-lock\" aria-hidden=\"true\"></i> ";
            //echo $list[$i]['icon_reply']." ";
            echo "<a href=\"".$list[$i]['href']."\" class=\"lt_tit\">";

            if ($list[$i]['is_notice']) {
                echo "<strong>".$list[$i]['subject']."</strong>";
            } else {
                echo $list[$i]['subject'];
            }

            $thumb = get_list_thumbnail($list[$i]['bo_table'], $list[$i]['wr_id'], 500,500);
            if($thumb['src']) {
                // <a href="'.$list[$i]['href'].'" class="bo_img"></a>
                $img_content = '<div class="notice_img" style="background-image: url('.$thumb['src'].')"></div>';
                // <img src="'.$thumb['src'].'" alt="'.$thumb['alt'].'" width="100%" height="auto">
                // <div class="notice_img" style="background-image: url('.$thumb['src'].')"></div>
            } else {
                $img_content = '';
            }

            echo $img_content;


            echo "</a>";
            ?>
        </li>
    <?php } ?>
    <?php if (count($list) == 0) { //게시물이 없을 때 ?>
    <li class="empty_li">게시물이 없습니다.</li>
    <?php } ?>
    </ul>


</div>

<script>
$(document).ready(function(){
    $('.lt_notice').bxSlider({
        controls:true,
        pager:false,

    });
});

</script>
