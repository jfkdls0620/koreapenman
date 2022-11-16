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

<div class="main_container">
    <!-- } 공지 최신글2 끝 -->
    <div class="v2_container">
        <div class="v2_container_con">
            <div class="grid-item"><div class="grid-inner">1</div></div>
            <div class="grid-item"><a href="http://koreapenman.com/bbs/content.php?co_id=association" class="grid-inner">협회소개</a></div>
            <div class="grid-item"><div class="grid-inner">3</div></div>
            <div class="grid-item"><a href="http://koreapenman.com/bbs/board.php?bo_table=registration" class="grid-inner">사범증</a></div>
            <div class="grid-item"><a href="http://koreapenman.com/bbs/board.php?bo_table=executives" class="grid-inner">회원소개</a></div>
            <div class="grid-item"><div class="grid-inner">6</div></div>
            <div class="grid-item"><a href="http://koreapenman.com/bbs/board.php?bo_table=notice" class="grid-inner">알림</a></div>
            <div class="grid-item"><div class="grid-inner">8</div></div>
            <div class="grid-item"><div class="grid-inner">9</div></div>
            <div class="grid-item"><a href="http://www.koreapenman.com/bbs/board.php?bo_table=data01" class="grid-inner">발간자료</a></div>
            <div class="grid-item"><div class="grid-inner">11</div></div>
            <div class="grid-item"><a href="http://www.koreapenman.com/bbs/content.php?co_id=masterintro" class="grid-inner">한국명인명장</a></div>
            <div class="grid-item"><div class="grid-inner">13</div></div>
        </div>
        <!--  공지 최신글2 { -->
        <?php
        // 이 함수가 바로 최신글을 추출하는 역할을 합니다.
        // 사용방법 : latest(스킨, 게시판아이디, 출력라인, 글자수);
        // 테마의 스킨을 사용하려면 theme/basic 과 같이 지정
        echo new_latest('theme/notice', 4, 40);
        ?>
        <div class="ex_area">
            <div class="ex_area-inner">
                <a href="http://koreapenman.com/bbs/board.php?bo_table=work01">소장작품</a>
                <div class="ex_area-bg"></div>
            </div>
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