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

    <article id="ctt" class="ctt_aoIncorporation">
        <div id="ctt_con">
            <div class="organization_content">
                <img src="img/v2_org.png" alt="조직도">
            </div>
        </div>
    </article>

    <script>
        var title = "<?php echo $or_view['co_subject'] ?>";
        $(".sub_nav h2").text(title);

        $(function(){
            $("#container").addClass("org")
        })

    </script>

<?php
include_once(G5_THEME_MOBILE_PATH.'/tail.php');
?>