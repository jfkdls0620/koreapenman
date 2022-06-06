<?php
include_once("../common.php");
include_once(G5_THEME_MOBILE_PATH.'/head.php');
include_once(G5_LIB_PATH.'/thumbnail.lib.php');

?>
    <script type="text/javascript" src="https://openapi.map.naver.com/openapi/v3/maps.js?ncpClientId=2cc3oldhz5"></script>
<?php
$co_view = sql_fetch(" select co_subject, co_content, co_mobile_content from {$g5['content_table']} where co_id = 'location' ");
// print_r2($co_view);
?>
    <article id="ctt" class="ctt_aoIncorporation">
        <div id="ctt_con">
            <ul class="ex_ul">
                <li>
                    <a href="http://koreapenman.com/bbs/board.php?bo_table=certificate&wr_4=한글서예" class="draw-btn draw-border">
                        한글서예사범
                    </a>
                </li>
                <li>
                    <a href="http://koreapenman.com/bbs/board.php?bo_table=certificate&wr_4=한글서예" class="draw-btn draw-border">
                        한문서예사범
                    </a>
                </li>
                <li>
                    <a href="http://koreapenman.com/bbs/board.php?bo_table=certificate&wr_4=한글서예" class="draw-btn draw-border">
                        문인화사범
                    </a>
                </li>
                <li>
                    <a href="http://koreapenman.com/bbs/board.php?bo_table=certificate&wr_4=한글서예" class="draw-btn draw-border">
                        서각사범
                    </a>
                </li>
                <li>
                    <a href="http://koreapenman.com/bbs/board.php?bo_table=certificate&wr_4=한글서예" class="draw-btn draw-border">
                        전각사범
                    </a>
                </li>
                <li>
                    <a href="http://koreapenman.com/bbs/board.php?bo_table=certificate&wr_4=한글서예" class="draw-btn draw-border">
                        민화사범
                    </a>
                </li>
            </ul>
        </div>
    </article>
    <style>
        ul.ex_ul{font-size:0;}
        ul.ex_ul li{display:inline-block;width: 31%;text-align: center;margin: 1%;vertical-align:top;}
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
            color:#fff;
            cursor: pointer;
            font-size:24px;
            padding: 1em 2em;
            letter-spacing: 0.05rem;
        }
        .draw-btn:focus {
            outline: 2px dotted #55d7dc;
        }

    </style>
    <script>
            var title = "<?php echo $co_view['co_subject'] ?>";
            $(".sub_nav h2").text("사범증취득자");

    </script>
<?php
include_once(G5_THEME_MOBILE_PATH.'/tail.php');
?>