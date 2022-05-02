<?php
include_once("../common.php");
include_once(G5_THEME_MOBILE_PATH.'/head.php');
include_once(G5_LIB_PATH.'/thumbnail.lib.php');

?>
    <script type="text/javascript" src="https://openapi.map.naver.com/openapi/v3/maps.js?ncpClientId=2cc3oldhz5"></script>
<?php
$or_view = sql_fetch(" select co_subject, co_content, co_mobile_content from {$g5['content_table']} where co_id = 'branch' ");
$ex_view = sql_fetch(" select co_subject, co_content, co_mobile_content from {$g5['content_table']} where co_id = 'chapter' ");
// print_r2($or_view);
?>
    <article id="ctt" class="ctt_aoIncorporation">
        <div id="ctt_con">
            <div class="organization_content">
                <div class="tab_area">
                    <ul>
                        <li class="t01 on"><a href="#">지회</a></li>
                        <li class="t02"><a href="#">지부</a></li>
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