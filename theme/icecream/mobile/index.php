<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가

include_once(G5_THEME_MOBILE_PATH.'/head.php');
include_once(G5_THEME_LIB_PATH.'/new_lastest.lib.php');
?>

<!--  사진 최신글2 { -->
<?php
// 이 함수가 바로 최신글을 추출하는 역할을 합니다.
// 사용방법 : latest(스킨, 게시판아이디, 출력라인, 글자수);
// 테마의 스킨을 사용하려면 theme/basic 과 같이 지정
//echo latest('theme/slide', 'gallery', 6, 43);
?>
<!-- } 사진 최신글2 끝 -->
<!--  공지 최신글2 { -->
<?php
// 이 함수가 바로 최신글을 추출하는 역할을 합니다.
// 사용방법 : latest(스킨, 게시판아이디, 출력라인, 글자수);
// 테마의 스킨을 사용하려면 theme/basic 과 같이 지정
//echo latest('theme/notice', 'notice', 6, 43);
?>
<!-- } 공지 최신글2 끝 -->
    <div class="v2_container">
        <div class="v2_container_con">
            <div class="box box01"><a href="#">1</a></div>
            <div class="box box02"><a href="#">2</a></div>
            <div class="box box03"><a href="#">3</a></div>
            <div class="box box04"><a href="#">4</a></div>
            <div class="box box05"><a href="#">5</a></div>
            <div class="box box06"><a href="#">6</a></div>
            <div class="box box06"><a href="#">7</a></div>
            <div class="box box06"><a href="#">8</a></div>
            <div class="box box06"><a href="#">9</a></div>
        </div>
    </div>
</div>

<div class="con_left">

<!--    --><?php //echo new_latest('theme/new_latest', 10, 40); ?>
<!-- 최신게시글 }-->


<script>
$("#con").removeClass("con_left");
</script>
<?php
include_once(G5_THEME_MOBILE_PATH.'/tail.php');
?>