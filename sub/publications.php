<?php
include_once("../common.php");
include_once(G5_THEME_MOBILE_PATH.'/head.php');
include_once(G5_LIB_PATH.'/thumbnail.lib.php');

?>
<script type="text/javascript" src="https://openapi.map.naver.com/openapi/v3/maps.js?ncpClientId=2cc3oldhz5"></script>
<?php
$or_view = sql_fetch(" select co_subject, co_content, co_mobile_content from {$g5['content_table']} where co_id = 'publications' ");
// print_r2($or_view);
?>
<article id="ctt" class="ctt_aoIncorporation">
    <div id="ctt_con">
        <div class="publications_box">
            <ul>
                <li>대한민국서법예술대전</a></li>
                <li>충무공숭모서화대전</li>
                <li>이순신제독시서화초대전</li>
                <li>참고자료</li>
            </ul>
        </div>
        <div>
            <?php echo latest("basic", "data01", 5, 25); ?>
        </div>
    </div>
</article>
<script>
    var title = "<?php echo $or_view['co_subject'] ?>";
    $(".sub_nav h2").text(title);
</script>

<?php
include_once(G5_THEME_MOBILE_PATH.'/tail.php');
?>