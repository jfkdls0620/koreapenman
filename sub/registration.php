<?php
include_once("../common.php");
include_once(G5_THEME_MOBILE_PATH.'/head.php');
include_once(G5_LIB_PATH.'/thumbnail.lib.php');

?>
    <script type="text/javascript" src="https://openapi.map.naver.com/openapi/v3/maps.js?ncpClientId=2cc3oldhz5"></script>
<?php
$or_view = sql_fetch(" select co_subject, co_content, co_mobile_content from {$g5['content_table']} where co_id = 'registration' ");
// print_r2($or_view);
?>
    <article id="ctt" class="ctt_aoIncorporation">
        <div id="ctt_con">
            <div class="organization_content">
                <div class="tab_area">
                    <div class="conbox on">
                        <p><?php echo $or_view['co_content']?></p>
                    </div>
                </div>
            </div>
        </div>
        <div class="v2_modal re_pwd" id="re_pwd">
            <div class="modal_container">
                <div class="m_content">
                    <div class="con">
                        <img src="../img/etc/01.jpg" alt="">
                        <button type="button" class="btn ok_btn" onclick="fnHidePop('re_pwd')">확인</button>
                    </div>
                </div>
            </div>
        </div>
    </article>

    <script>
        var title = "<?php echo $or_view['co_subject'] ?>";
        $(".sub_nav h2").text(title);

        function fnShowPop(sGetName){
            var $layer = $("#"+ sGetName);
            var mHeight = $layer.find(".m_content").height()/2;
            $layer.find(".m_content").css({'margin-top':-mHeight});
            $layer.addClass("on");
        }

        function fnHidePop(sGetName){
            $("#"+ sGetName).removeClass("on");
        }
    </script>

<?php
include_once(G5_THEME_MOBILE_PATH.'/tail.php');
?>