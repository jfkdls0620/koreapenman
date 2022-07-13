<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가

// 선택옵션으로 인해 셀합치기가 가변적으로 변함
$colspan = 2;

if ($is_checkbox) $colspan++;
include_once(G5_LIB_PATH.'/thumbnail.lib.php');

// add_stylesheet('css 구문', 출력순서); 숫자가 작을 수록 먼저 출력됨
add_stylesheet('<link rel="stylesheet" href="'.$board_skin_url.'/style.css">', 0);
?>

<style type="text/css">
    .bo_info_items .bo_info_item .bo_info_item--title {color: #333; font-weight: 700;}
    .board_kor_search_bar button{background-color:#fff;font-weight: 600}
    .board_kor_search_bar button.on {background-color: #0d61fb;color: #fff;}

    ul.ex_ul {font-size:0;margin-bottom: 15px;}
    ul.ex_ul li{display:inline-block;width: calc(33% - 5px);text-align: center;margin: 0 10px 10px 0;vertical-align:top;}
    ul.ex_ul li:nth-child(3n) {margin-right: 0;}
    .draw-border {
        box-shadow: inset 0 0 0 4px #1a5ec1;
        color: #1a5ec1;
        transition: color 0.25s 0.0833333333s;
        position: relative;
    }
    .draw-border::before, .draw-border::after {
        border: 0 solid transparent;
        box-sizing: border-box;
        content: "";
        pointer-events: none;
        position: absolute;
        width: 0;
        height: 0;
        bottom: 0;
        right: 0;
    }
    .draw-border::before {
        border-bottom-width: 4px;
        border-left-width: 4px;
    }
    .draw-border::after {
        border-top-width: 4px;
        border-right-width: 4px;
    }
    .draw-border:hover {
        color: #000;
    }
    .draw-border:hover::before, .draw-border:hover::after {
        border-color: #000;
        transition: border-color 0s, width 0.25s, height 0.25s;
        width: 100%;
        height: 100%;
    }
    .draw-border:hover::before {
        transition-delay: 0s, 0s, 0.25s;
    }
    .draw-border:hover::after {
        transition-delay: 0s, 0.25s, 0s;
    }

    .draw-btn {
        display: block;
        background: #6aa3f7;
        border: none;
        color: #fff;
        cursor: pointer;
        font-size: 1.3rem;
        padding: .4em 1em;
        letter-spacing: 0.05rem;
    }

    .grade_area{
        margin-top: 10px;
    }
    .grade_area a{display: inline-block;border: 1px solid #ccc;
        font-size: 16px;
        padding: 10px;
        margin-right: 10px;
        line-height: 16px;}
    .grade_area a.on{
        background-color: #0d61fb;
        color: #fff;
    }
    /*.draw-btn:focus {*/
    /*    outline: 2px dotted #55d7dc;*/
    /*}*/

</style>

<!-- 게시판 목록 시작 -->
<div id="bo_list">

    <?php if ($is_category) { ?>
    <nav id="bo_cate">
        <h2><?php echo ($board['bo_mobile_subject'] ? $board['bo_mobile_subject'] : $board['bo_subject']) ?> 카테고리</h2>
        <ul id="bo_cate_ul">
            <?php echo $category_option ?>
        </ul>
    </nav>
    <?php } ?>

    <div id="bo_list_total">
        <span>전체 <?php echo number_format($total_count) ?>건</span>
        <?php echo $page ?> 페이지
    </div>


    <form name="fboardlist" id="fboardlist" action="<?php echo G5_BBS_URL; ?>/board_list_update.php" onsubmit="return fboardlist_submit(this);" method="post">
    <input type="hidden" name="bo_table" value="<?php echo $bo_table ?>">
    <input type="hidden" name="sfl" value="<?php echo $sfl ?>">
    <input type="hidden" name="stx" value="<?php echo $stx ?>">
    <input type="hidden" name="spt" value="<?php echo $spt ?>">
    <input type="hidden" name="sst" value="<?php echo $sst ?>">
    <input type="hidden" name="sod" value="<?php echo $sod ?>">
    <input type="hidden" name="page" value="<?php echo $page ?>">
    <input type="hidden" name="sw" value="">

    <div class="board_list">
        <!--
            <ul class="ex_ul">
            <li>
                <a href="http://koreapenman.com/bbs/board.php?bo_table=certificate&kor=&wr_4=한글서예" class="draw-btn draw-border">
                    한글서예사범
                </a>
            </li>
            <li>
                <a href="http://koreapenman.com/bbs/board.php?bo_table=certificate&kor=&wr_4=한문서예" class="draw-btn draw-border">
                    한문서예사범
                </a>
            </li>
            <li>
                <a href="http://koreapenman.com/bbs/board.php?bo_table=certificate&kor=&wr_4=문인화" class="draw-btn draw-border">
                    문인화사범
                </a>
            </li>
            <li>
                <a href="http://koreapenman.com/bbs/board.php?bo_table=certificate&kor=&wr_4=서각" class="draw-btn draw-border">
                    서각사범
                </a>
            </li>
            <li>
                <a href="http://koreapenman.com/bbs/board.php?bo_table=certificate&kor=&wr_4=전각" class="draw-btn draw-border">
                    전각사범
                </a>
            </li>
            <li>
                <a href="http://koreapenman.com/bbs/board.php?bo_table=certificate&kor=&wr_4=민화" class="draw-btn draw-border">
                    민화사범
                </a>
            </li>
        </ul>
         -->
        <div class="board_kor_search_bar">
            <button type="button" onclick="search_kor('ㄱ');"<?php if (strpos($f_word, 'ㄱ') === 0) { ?> class="on"<?}?>>ㄱ</button>
            <button type="button" onclick="search_kor('ㄴ');"<?php if (strpos($f_word, 'ㄴ') === 0) { ?> class="on"<?}?>>ㄴ</button>
            <button type="button" onclick="search_kor('ㄷ');"<?php if (strpos($f_word, 'ㄷ') === 0) { ?> class="on"<?}?>>ㄷ</button>
            <button type="button" onclick="search_kor('ㄹ');"<?php if (strpos($f_word, 'ㄹ') === 0) { ?> class="on"<?}?>>ㄹ</button>
            <button type="button" onclick="search_kor('ㅁ');"<?php if (strpos($f_word, 'ㅁ') === 0) { ?> class="on"<?}?>>ㅁ</button>
            <button type="button" onclick="search_kor('ㅂ');"<?php if (strpos($f_word, 'ㅂ') === 0) { ?> class="on"<?}?>>ㅂ</button>
            <button type="button" onclick="search_kor('ㅅ');"<?php if (strpos($f_word, 'ㅅ') === 0) { ?> class="on"<?}?>>ㅅ</button>
            <button type="button" onclick="search_kor('ㅇ');"<?php if (strpos($f_word, 'ㅇ') === 0) { ?> class="on"<?}?>>ㅇ</button>
            <button type="button" onclick="search_kor('ㅈ');"<?php if (strpos($f_word, 'ㅈ') === 0) { ?> class="on"<?}?>>ㅈ</button>
            <button type="button" onclick="search_kor('ㅊ');"<?php if (strpos($f_word, 'ㅊ') === 0) { ?> class="on"<?}?>>ㅊ</button>
            <button type="button" onclick="search_kor('ㅋ');"<?php if (strpos($f_word, 'ㅋ') === 0) { ?> class="on"<?}?>>ㅋ</button>
            <button type="button" onclick="search_kor('ㅌ');"<?php if (strpos($f_word, 'ㅌ') === 0) { ?> class="on"<?}?>>ㅌ</button>
            <button type="button" onclick="search_kor('ㅍ');"<?php if (strpos($f_word, 'ㅍ') === 0) { ?> class="on"<?}?>>ㅍ</button>
            <button type="button" onclick="search_kor('ㅎ');"<?php if (strpos($f_word, 'ㅎ') === 0) { ?> class="on"<?}?>>ㅎ</button>
            <button type="button" onclick="search_kor('');"<?php if (!$f_word) { ?> class="on"<?}?>>전체</button>
        </div>
        <div class="grade_area">

            <a href="<?=G5_BBS_URL?>/board.php?bo_table=acquirer&sca=&kor=&wr_5=1&wr_4=<?=$wr_4?>" <?php if ($wr_5 === '1') { ?> class="on"<?}?>>
                1급
            </a>
            <a href="<?=G5_BBS_URL?>/board.php?bo_table=acquirer&sca=&kor=&wr_5=2&wr_4=<?=$wr_4?>" <?php if ($wr_5 === '2') { ?> class="on"<?}?>>
                2급
            </a>
            <a href="<?=G5_BBS_URL?>/board.php?bo_table=acquirer&sca=&kor=&kor=&wr_4=<?=$wr_4?>">
                전체 급수보기
            </a>

        </div>
        <?php if ($is_checkbox) { ?>
        <div class="al_chk">
            <input type="checkbox" id="chkall" onclick="if (this.checked) all_checked(true); else all_checked(false);">
            <label for="chkall"><span class="sound_only">현재 페이지 게시물 </span>전체선택</label>
        </div>
        <?php } ?>
        <ul class="board_list__items">
            <?php
            for ($i=0; $i<count($list); $i++) {
            ?>
            <li class="<?php if ($thumb) echo "bo_liimg "; ?><?php if ($list[$i]['is_notice']) echo " bo_notice"; ?>">
                <div class="card-content">
                    <div class="card-content_img">
                        <?php
                        $thumb = get_list_thumbnail($board['bo_table'], $list[$i]['wr_id'], $board['bo_mobile_gallery_width'], $board['bo_mobile_gallery_height']);
                        if ($is_admin){
                            if($thumb['src']) {
                                $img_content = '<a href="'.$list[$i]['href'].'" class="bo_img" style="background-image:url('.$thumb['src'].')"> </a>';
                            } else {
                                $img_content = '<a href="'.$list[$i]['href'].'" class="bo_img v2_no-image"></a>';
                            }
                        }else{
                            if($thumb['src']) {
                                $img_content = '<span class="bo_img" style="background-image:url('.$thumb['src'].')"> </a>';
                            } else {
                                $img_content = '<span class="bo_img v2_no-image"></a>';
                            }
                        }
                        echo $img_content;
                        ?>
                    </div>
                    <dl class="dl_title">
                        <dt>아호 성명</dt>
                        <dd>
                            <span style="min-width: 30px;display: inline-block;text-align: center;"><?php echo $list[$i]['wr_2']?></span>
                            <span><?php echo $list[$i]['subject']?></span>
                        </dd>
                    </dl>
                    <dl>
                        <dt>분야</dt>
                        <dd><?php echo $list[$i]['wr_4']?></dd>
                    </dl>
                    <dl>
                        <dt>급수</dt>
                        <dd><?php echo $list[$i]['wr_5']?></dd>
                    </dl>
                    <dl>
                        <dt>취득년도</dt>
                        <dd><?php echo $list[$i]['wr_1']?></dd>
                    </dl>

                </div>
                <div class="bo_subject">
                    <?php if ($is_checkbox) { ?>
                    <span class="bo_chk">
                        <label for="chk_wr_id_<?php echo $i ?>" class="sound_only"><?php echo $list[$i]['subject'] ?></label>
                        <input type="checkbox" name="chk_wr_id[]" value="<?php echo $list[$i]['wr_id'] ?>" id="chk_wr_id_<?php echo $i ?>">
                    </span><?php } ?>


                    <?php
                    if ($is_category && $list[$i]['ca_name']) {
                    ?>
                    <a href="<?php echo $list[$i]['ca_name_href'] ?>" class="bo_cate_link"><?php echo $list[$i]['ca_name'] ?></a>
                    <?php } ?>

                    <a href="<?php echo $list[$i]['href'] ?>" class="bo_subject">
                        <?php echo $list[$i]['icon_reply']; ?>
                        <?php if ($list[$i]['is_notice']) { ?><strong class="notice_icon">공지</strong><?php } ?>
                        <?php
                        /*
                        // if ($list[$i]['file']['count']) { echo '<'.$list[$i]['file']['count'].'>'; }

                        if (isset($list[$i]['icon_new'])) echo $list[$i]['icon_new'];
                        if (isset($list[$i]['icon_hot'])) echo $list[$i]['icon_hot'];
                        if (isset($list[$i]['icon_file'])) echo $list[$i]['icon_file'];
                        if (isset($list[$i]['icon_link'])) echo $list[$i]['icon_link'];
                        if (isset($list[$i]['icon_secret'])) echo $list[$i]['icon_secret'];
                    */
                        ?>
                    </a>

                </div>
                <div class="bo_info">
                    <span class="bo_pf_img"><?php echo get_member_profile_img($list[$i]['mb_id']); ?></span>
                </div>
                 
            </li><?php } ?>
            <?php if (count($list) == 0) { echo '<li class="empty_table">해당 취득자가 없습니다.</li>'; } ?>
        </ul>
    </div>

    <?php if ($list_href || $is_checkbox || $write_href) { ?>
    <div class="bo_fx">
        <ul class="btn_bo_adm">
            <?php if ($list_href) { ?>
<!--            <li><a href="--><?php //echo $list_href ?><!--" class="btn_b01 btn"> 목록</a></li>-->
            <?php } ?>
            <?php if ($is_checkbox) { ?>
            <li><button type="submit" name="btn_submit" value="선택삭제" onclick="document.pressed=this.value" class="btn"><i class="fa fa-trash-o" aria-hidden="true"></i><span class="sound_only">선택삭제</span></button></li>
            <li><button type="submit" name="btn_submit" value="선택복사" onclick="document.pressed=this.value" class="btn"><i class="fa fa-files-o" aria-hidden="true"></i><span class="sound_only">선택복사</span></button></li>
            <li><button type="submit" name="btn_submit" value="선택이동" onclick="document.pressed=this.value" class="btn"><i class="fa fa-arrows" aria-hidden="true"></i> <span class="sound_only">선택이동</span></button></li>
            <?php } ?>
        </ul>

                
        <?php if ($rss_href || $write_href) { ?>
        <ul class="btn_bo_user ">
            <?php if ($rss_href) { ?><li><a href="<?php echo $rss_href ?>" class="btn_b01 btn"><i class="fa fa-rss" aria-hidden="true"></i><span class="sound_only">RSS</span></a></li><?php } ?>
            <?php if ($admin_href) { ?><li><a href="<?php echo $admin_href ?>" class="btn_admin btn"><i class="fa fa-user-circle" aria-hidden="true"></i><span class="sound_only">관리자</span></a></li><?php } ?>
            <?php if ($write_href) { ?><li><a href="<?php echo $write_href ?>" class="btn_b02 btn">글쓰기</a></li><?php } ?>
        </ul>
        <?php } ?>
    </div>
    <?php } ?>
    </form>

    <?php if ($write_href) { ?><div class="write_btn"><a href="<?php echo $write_href ?>" class="btn_b02"><i class="fa fa-pencil" aria-hidden="true"></i><span class="sound_only">글쓰기</span></a></div><?php } ?>
</div>

<?php if($is_checkbox) { ?>
<noscript>
<p>자바스크립트를 사용하지 않는 경우<br>별도의 확인 절차 없이 바로 선택삭제 처리하므로 주의하시기 바랍니다.</p>
</noscript>
<?php } ?>

<!-- 페이지 -->
<?php echo $write_pages;?>

<fieldset id="bo_sch">
    <legend>게시물 검색</legend>

    <form name="fsearch" method="get">
    <input type="hidden" name="bo_table" value="<?php echo $bo_table ?>">
    <input type="hidden" name="sca" value="<?php echo $sca ?>">
    <input type="hidden" name="sop" value="and">
    <input type="hidden" name="kor" value="">
    <input type="hidden" name="wr_4" value="<?=$wr_4?>">
    <input type="hidden" name="wr_5" value="<?=$wr_5?>">
    <label for="sfl" class="sound_only">검색대상</label>
    <select name="sfl" id="sfl">
        <option value="wr_subject"<?php echo get_selected($sfl, 'wr_subject', true); ?>>이름</option>
    </select>
    <input name="stx" value="<?php echo stripslashes($stx) ?>" placeholder="검색어(필수)" required id="stx" class="sch_input" size="15" maxlength="20">
    <button type="submit" value="검색" class="sch_btn"><i class="fa fa-search" aria-hidden="true"></i> <span class="sound_only">검색</span></button>
    </form>
</fieldset>

<script type="text/javascript">
    function search_kor(v) {
        var f = document.fsearch;

        f.kor.value = v;
        f.submit();
    }
</script>

<?php if ($is_checkbox) { ?>
<script type="text/javascript">
function all_checked(sw) {
    var f = document.fboardlist;

    for (var i=0; i<f.length; i++) {
        if (f.elements[i].name == "chk_wr_id[]")
            f.elements[i].checked = sw;
    }
}

function fboardlist_submit(f) {
    var chk_count = 0;

    for (var i=0; i<f.length; i++) {
        if (f.elements[i].name == "chk_wr_id[]" && f.elements[i].checked)
            chk_count++;
    }

    if (!chk_count) {
        alert(document.pressed + "할 게시물을 하나 이상 선택하세요.");
        return false;
    }

    if(document.pressed == "선택복사") {
        select_copy("copy");
        return;
    }

    if(document.pressed == "선택이동") {
        select_copy("move");
        return;
    }

    if(document.pressed == "선택삭제") {
        if (!confirm("선택한 게시물을 정말 삭제하시겠습니까?\n\n한번 삭제한 자료는 복구할 수 없습니다\n\n답변글이 있는 게시글을 선택하신 경우\n답변글도 선택하셔야 게시글이 삭제됩니다."))
            return false;

        f.removeAttribute("target");
        f.action = g5_bbs_url+"/board_list_update.php";
    }

    return true;
}

// 선택한 게시물 복사 및 이동
function select_copy(sw) {
    var f = document.fboardlist;

    if (sw == 'copy')
        str = "복사";
    else
        str = "이동";

    var sub_win = window.open("", "move", "left=50, top=50, width=500, height=550, scrollbars=1");

    f.sw.value = sw;
    f.target = "move";
    f.action = g5_bbs_url+"/move.php";
    f.submit();
}
</script>
<?php } ?>
<!-- 게시판 목록 끝 -->
