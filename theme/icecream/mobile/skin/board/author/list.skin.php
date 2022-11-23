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
    .empty_table{font-size:15px;}
    .bo_info_items .bo_info_item .bo_info_item--title {color: #333; font-weight: 700;}
    .board_kor_search_bar button{background-color:#fff;font-weight: 600}
    .board_kor_search_bar button.on {background-color: #0d61fb;color: #fff;}

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
<!--        <ul class="ex_ul">-->
<!--            <li>-->
<!--                <a href="http://koreapenman.com/bbs/board.php?bo_table=author&kor=&u_author=wr_2" class="draw-btn draw-border">-->
<!--                    대한민국서법예술대전-->
<!--                </a>-->
<!--            </li>-->
<!--            <li>-->
<!--                <a href="http://koreapenman.com/bbs/board.php?bo_table=author&kor=&u_author=wr_3" class="draw-btn draw-border">-->
<!--                    충무공숭모서화대전-->
<!--                </a>-->
<!--            </li>-->
<!---->
<!--        </ul>-->

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

        <?php
        //직접하면 안돼는 추가한 쿼리문 임시로 사용하느것이기에 이렇게 사용하며 좋지 않음을 인지해야함
        /*<button type="button" onclick="search_kor('대한민국서법예술대전');"<?php if (strpos($f_word, '대한민국서법예술대전') === 0) { ?> class="on"<?}?>>대한민국서법예술대전</button>
        <button type="button" onclick="search_kor('충무공숭모서화대전');"<?php if (strpos($f_word, '충무공숭모서화대전') === 0) { ?> class="on"<?}?>>충무공숭모서화대전</button>
        */

        $u_sql = "select wr_2 from {$write_table} where wr_2 !='' group by wr_2";
        $u_query = sql_query($u_sql);
        while($row=sql_fetch_array($u_query)){
            $yy[] = (int)trim($row['wr_2']);
        }

        $u_sql = "select wr_3 from {$write_table} where wr_3 !='' group by wr_3";
        $u_query = sql_query($u_sql);
        while($row=sql_fetch_array($u_query)){
            $yy[] = (int)trim($row['wr_3']);
        }

        $yy = array_unique($yy);
        sort($yy);

        if(count($yy) > 2){
        ?>
            <?php /*
            <div class="board_kor_search_bar">
                <button type="button" onclick="search_yy('')">전체보기</button>
                <?php for($i=0;$i<count($yy);$i++){?>
                <button type="button" onclick="search_yy('<?=$yy[$i]?>')"><?=$yy[$i]?></button>
                <?php } ?>
            </div>
            */ ?>
        <?php } ?>

        <?php if ($is_checkbox) { ?>
        <div class="al_chk">
            <input type="checkbox" id="chkall" onclick="if (this.checked) all_checked(true); else all_checked(false);">
            <label for="chkall"><span class="sound_only">현재 페이지 게시물 </span>전체선택</label>
        </div>
        <?php } ?>
        <div class="board_list__items">
            <ul class="div-table_thead">
                <li>성명</li>
                <li>아호</li>
                <li>대한민국서법예술대전 위촉년도</li>
                <li>충무공숭모예술대전 위촉년도</li>
            </ul>
            <ul class="div-table_tbody">
                <?php
                for ($i=0; $i<count($list); $i++) {
                ?>
                <li class="<?php if ($thumb) echo "bo_liimg "; ?><?php if ($list[$i]['is_notice']) echo " bo_notice"; ?>">
                    <div class="name">
                        <div class="bo_subject">
                            <?php if ($is_checkbox) { ?>
                                <span class="bo_chk">
                                <label for="chk_wr_id_<?php echo $i ?>" class="sound_only"><?php echo $list[$i]['subject'] ?></label>
                            <input type="checkbox" name="chk_wr_id[]" value="<?php echo $list[$i]['wr_id'] ?>" id="chk_wr_id_<?php echo $i ?>">
                                </span><?php } ?>

                            <?php
                            if ($is_category && $list[$i]['ca_name']) {
                                ?>
                                <?php /* <a href="<?php echo $list[$i]['ca_name_href'] ?>" class="bo_cate_link"><?php echo $list[$i]['ca_name'] ?></a> */ ?>
                            <?php } ?>

                            <a href="<?php echo $list[$i]['href'] ?>" class="bo_subject">
                                <?php echo $list[$i]['icon_reply']; ?>
                                <?php if ($list[$i]['is_notice']) { ?><strong class="notice_icon">공지</strong><?php } ?>
                                <?php
                                // if ($list[$i]['file']['count']) { echo '<'.$list[$i]['file']['count'].'>'; }
                                /*
                                                if (isset($list[$i]['icon_new'])) echo $list[$i]['icon_new'];
                                                if (isset($list[$i]['icon_hot'])) echo $list[$i]['icon_hot'];
                                                if (isset($list[$i]['icon_file'])) echo $list[$i]['icon_file'];
                                                if (isset($list[$i]['icon_link'])) echo $list[$i]['icon_link'];
                                                if (isset($list[$i]['icon_secret'])) echo $list[$i]['icon_secret'];
                        */
                                ?>
                            </a>
                        </div>
                        <?php if($is_admin){?>
                            <a href="<?php echo $list[$i]['href'] ?>"><?php echo $list[$i]['subject']?></a>
                        <?php }else{ ?>
                            <?php echo $list[$i]['subject']?>
                        <?php }?>

                    </div> <!-- 성명 -->
                    <div class="sub_name"><?php echo $list[$i]['wr_1']?></div> <!-- 아호 -->
                    <div><?php echo $list[$i]['wr_2']?></div>
                    <div><?php echo $list[$i]['wr_3']?></div>


                </li><?php } ?>
                <?php if (count($list) == 0) { echo '<li class="empty_table">등록된 작가가 없습니다.</li>'; } ?>
            </ul>
        </div>
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
<?php echo $write_pages; ?>

<fieldset id="bo_sch">
    <legend>게시물 검색</legend>

    <form name="fsearch" method="get">
    <input type="hidden" name="bo_table" value="<?php echo $bo_table ?>">
    <input type="hidden" name="sca" value="<?php echo $sca ?>">
    <input type="hidden" name="sop" value="and">
    <input type="hidden" name="kor" value="">

    <input type="hidden" name="u_author" value="<?=$u_author?>">



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

    function search_yy(v) {
        var f = document.fsearch;

        f.kor.wr_2 = v;
        f.kor.wr_3 = v;
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
