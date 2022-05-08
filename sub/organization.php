<?php
include_once("../common.php");
include_once(G5_THEME_MOBILE_PATH.'/head.php');
include_once(G5_LIB_PATH.'/thumbnail.lib.php');

?>
    <script type="text/javascript" src="https://openapi.map.naver.com/openapi/v3/maps.js?ncpClientId=2cc3oldhz5"></script>
<?php
$or_view = sql_fetch(" select co_subject, co_content, co_mobile_content from {$g5['content_table']} where co_id = 'organization' ");
$ex_view = sql_fetch(" select co_subject, co_content, co_mobile_content from {$g5['content_table']} where co_id = 'executives' ");
// print_r2($or_view);
?>
    <style>
        ol.organizational-chart{
            padding-top: 50px;
        }
        ol.organizational-chart h1{
            color:#fff;
            font-size:28px;
        }
        ol.organizational-chart h2{
            color:#fff;
            font-size:26px;
        }
        ol.organizational-chart h3{
            color:#fff;
            font-size:24px;
        }
        ol.organizational-chart h4,
        ol.organizational-chart h5{
            color:#fff;
            font-size:20px;
        }

        ol.organizational-chart,
        ol.organizational-chart ol,
        ol.organizational-chart li,
        ol.organizational-chart li > div {
            position: relative;
        }
        ol.organizational-chart,
        ol.organizational-chart ol {
            list-style: none;
            margin: 0;
            padding: 0;
        }
        ol.organizational-chart {
            text-align: center;
        }
        ol.organizational-chart ol {
            padding-top: 1em;
        }
        ol.organizational-chart ol:before,
        ol.organizational-chart ol:after,
        ol.organizational-chart li:before,
        ol.organizational-chart li:after,
        ol.organizational-chart > li > div:before,
        ol.organizational-chart > li > div:after {
            background-color: #b7a6aa;
            content: '';
            position: absolute;
        }
        ol.organizational-chart ol > li {
            padding: 1em 0 0 1em;
        }
        ol.organizational-chart > li ol:before {
            height: 1em;
            left: 50%;
            top: 0;
            width: 3px;
        }
        ol.organizational-chart > li ol:after {
            height: 3px;
            left: 3px;
            top: 1em;
            width: 50%;
        }
        ol.organizational-chart > li ol > li:not(:last-of-type):before {
            height: 3px;
            left: 0;
            top: 2em;
            width: 1em;
        }
        ol.organizational-chart > li ol > li:not(:last-of-type):after {
            height: 100%;
            left: 0;
            top: 0;
            width: 3px;
        }
        ol.organizational-chart > li ol > li:last-of-type:before {
            height: 3px;
            left: 0;
            top: 2em;
            width: 1em;
        }
        ol.organizational-chart > li ol > li:last-of-type:after {
            height: 2em;
            left: 0;
            top: 0;
            width: 3px;
        }
        ol.organizational-chart li > div {
            background-color: #fff;
            border-radius: 3px;
            min-height: 2em;
            padding: 0.5em;
        }
        /*** PRIMARY ***/
        ol.organizational-chart > li > div {
            background-color: #00478e;
            margin-right: 1em;
        }
        ol.organizational-chart > li > div:before {
            bottom: 2em;
            height: 3px;
            right: -1em;
            width: 1em;
        }
        ol.organizational-chart > li > div:first-of-type:after {
            bottom: 0;
            height: 2em;
            right: -1em;
            width: 3px;
        }
        ol.organizational-chart > li > div + div {
            margin-top: 1em;
        }
        ol.organizational-chart > li > div + div:after {
            height: calc(100% + 1em);
            right: -1em;
            top: -1em;
            width: 3px;
        }
        /*** SECONDARY ***/
        ol.organizational-chart > li > ol:before {
            left: inherit;
            right: 0;
        }
        ol.organizational-chart > li > ol:after {
            left: 0;
            width: 100%;
        }
        ol.organizational-chart > li > ol > li > div {
            background-color: #26a8e0;
        }
        /*** TERTIARY ***/
        ol.organizational-chart > li > ol > li > ol > li > div {
            background-color: #3e83b9;
        }
        /*** QUATERNARY ***/
        ol.organizational-chart > li > ol > li > ol > li > ol > li > div {
            background-color: #9b8579;
        }
        /*** QUINARY ***/
        ol.organizational-chart > li > ol > li > ol > li > ol > li > ol > li > div {
            background-color: #c2b59a;
        }

        @media only screen and ( min-width: 64em ) {
            ol.organizational-chart {
                margin-left: -1em;
                margin-right: -1em;
            }
            /* PRIMARY */
            ol.organizational-chart > li > div {
                display: inline-block;
                float: none;
                margin: 0 1em 1em 1em;
                vertical-align: bottom;
            }
            ol.organizational-chart > li > div:only-of-type {
                margin-bottom: 0;
                width: calc((100% / 1) - 2em - 4px);
            }
            ol.organizational-chart > li > div:first-of-type:nth-last-of-type(2),
            ol.organizational-chart > li > div:first-of-type:nth-last-of-type(2) ~ div {
                width: calc((100% / 2) - 2em - 4px);
            }
            ol.organizational-chart > li > div:first-of-type:nth-last-of-type(3),
            ol.organizational-chart > li > div:first-of-type:nth-last-of-type(3) ~ div {
                width: calc((100% / 3) - 2em - 4px);
            }
            ol.organizational-chart > li > div:first-of-type:nth-last-of-type(4),
            ol.organizational-chart > li > div:first-of-type:nth-last-of-type(4) ~ div {
                width: calc((100% / 4) - 2em - 4px);
            }
            ol.organizational-chart > li > div:first-of-type:nth-last-of-type(5),
            ol.organizational-chart > li > div:first-of-type:nth-last-of-type(5) ~ div {
                width: calc((100% / 5) - 2em - 4px);
            }
            ol.organizational-chart > li > div:before,
            ol.organizational-chart > li > div:after {
                bottom: -1em!important;
                top: inherit!important;
            }
            ol.organizational-chart > li > div:before {
                height: 1em!important;
                left: 50%!important;
                width: 3px!important;
            }
            ol.organizational-chart > li > div:only-of-type:after {
                display: none;
            }
            ol.organizational-chart > li > div:first-of-type:not(:only-of-type):after,
            ol.organizational-chart > li > div:last-of-type:not(:only-of-type):after {
                bottom: -1em;
                height: 3px;
                width: calc(50% + 1em + 3px);
            }
            ol.organizational-chart > li > div:first-of-type:not(:only-of-type):after {
                left: calc(50% + 3px);
            }
            ol.organizational-chart > li > div:last-of-type:not(:only-of-type):after {
                left: calc(-1em - 3px);
            }
            ol.organizational-chart > li > div + div:not(:last-of-type):after {
                height: 3px;
                left: -2em;
                width: calc(100% + 4em);
            }
            /* SECONDARY */
            ol.organizational-chart > li > ol {
                display: flex;
                flex-wrap: nowrap;
            }
            ol.organizational-chart > li > ol:before,
            ol.organizational-chart > li > ol > li:before {
                height: 1em!important;
                left: 50%!important;
                top: 0!important;
                width: 3px!important;
            }
            ol.organizational-chart > li > ol:after {
                display: none;
            }
            ol.organizational-chart > li > ol > li {
                flex-grow: 1;
                padding-left: 1em;
                padding-right: 1em;
                padding-top: 1em;
            }
            ol.organizational-chart > li > ol > li:only-of-type {
                padding-top: 0;
            }
            ol.organizational-chart > li > ol > li:only-of-type:before,
            ol.organizational-chart > li > ol > li:only-of-type:after {
                display: none;
            }
            ol.organizational-chart > li > ol > li:first-of-type:not(:only-of-type):after,
            ol.organizational-chart > li > ol > li:last-of-type:not(:only-of-type):after {
                height: 3px;
                top: 0;
                width: 50%;
            }
            ol.organizational-chart > li > ol > li:first-of-type:not(:only-of-type):after {
                left: 50%;
            }
            ol.organizational-chart > li > ol > li:last-of-type:not(:only-of-type):after {
                left: 0;
            }
            ol.organizational-chart > li > ol > li + li:not(:last-of-type):after {
                height: 3px;
                left: 0;
                top: 0;
                width: 100%;
            }
        }

    </style>
    <article id="ctt" class="ctt_aoIncorporation">
        <div id="ctt_con">
            <div class="organization_content">
                <div class="tab_area">
                    <ul>
                        <li class="t01 on"><a href="javascript:;">조직도</a></li>
                        <li class="t02"><a href="javascript:;">임원</a></li>
                    </ul>
                    <div class="conbox on">
                        <p><?php echo $or_view['co_content']?></p>
                    </div>
                    <div class="conbox">
                        <p><?php echo $ex_view['co_content']?></p>
                    </div>
                </div>

            </div>
        </div>
    </article>

    <script>
        var title = "<?php echo $or_view['co_subject'] ?>";
        $(".sub_nav h2").text(title);

        var $targetBtn = $(".tab_area ul li");
        var $targetCon = $(".tab_area .conbox");
        $targetBtn.on("click", function(){
            var num = $targetBtn.index($(this));
            $targetBtn.removeClass("on");
            $targetCon.removeClass("on");

            $targetBtn.eq(num).addClass("on");
            $targetCon.eq(num).addClass("on");

        });

    </script>

<?php
include_once(G5_THEME_MOBILE_PATH.'/tail.php');
?>