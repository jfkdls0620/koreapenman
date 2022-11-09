<?php
include_once("../common.php");
include_once(G5_THEME_MOBILE_PATH.'/head.php');
include_once(G5_LIB_PATH.'/thumbnail.lib.php');

?>

<?php
$co_view = sql_fetch(" select co_subject, co_content, co_mobile_content from {$g5['content_table']} where co_id = 'sub04' ");
// print_r2($co_view);
?>
    <article id="ctt" class="ctt_aoIncorporation">
        <div id="ctt_con">
            <div class="sub04_content">
                <img src="img/sub04_img.png" alt="명인명장 인증절차">
                <div>
                    <a href="#">한국명인·명장 신청서 PDF 다운로드</a>
                </div>
            </div>
        </div>
    </article>
    <style>
        .sub04_content{text-align: center;padding-bottom: 70px}
        .sub04_content>div{text-align: center;margin-top: 50px;border-top:1px solid #ccc;}
        .sub04_content>div a{display: inline-block;margin-top:60px;border:1px solid #333;line-height: 55px;font-size:20px;padding: 0 35px;color:#333;transition:.4s}
        .sub04_content>div a:hover{background-color: #333;border:1px solid #333;color:#fff;}
    </style>
    <script>
        var title = "<?php echo $co_view['co_subject'] ?>";
        $(".sub_nav h2").text(title);
    </script>
<?php
include_once(G5_THEME_MOBILE_PATH.'/tail.php');
?>