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
                <button type="button" class="modal_btn">인증절차 보기</button>
                <div class="mobile_area">
                    <div>
                        <button type="button" class="close_btn">닫기</button>
                        <img src="img/sub04_img.png" alt="명인명장 인증절차">
                    </div>
                </div>
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

        .sub04_content>button{display: none}
        .mobile_area{display: none;}

        @media (max-width: 969px){
            .sub04_content>button{
                width: 100%;
                display: block;
                border: 1px solid #333;
                line-height: 55px;
                font-size: 20px;
                padding: 0 35px;
                color: #333;
                margin: 30px auto;
            }
            .sub04_content>div{
                border-top:0;
                margin-top: 0;
            }

            .sub04_content img{
                display: none;
            }
            .sub04_content>div a{
                width: 100%;
                margin-top: 40px;
                padding: 0 10px;
                font-size:18px;
            }

            .mobile_area{
                position:fixed;
                z-index: 999;
                background-color: #e1e1e1;
                width: 100%;
                height: 100%;
                top:0;
                left:0;
                overflow: scroll;
                padding: 0 30px 30px;
            }
            .mobile_area>div{
                position:relative;
                display: inline-block;
            }
            .mobile_area button{
                width: 100%;
                font-size:20px;
                padding:15px 0;
                border:0;
                position:fixed;
                top:0;
                left:0;
                background-color: #2e3336;
                color:#fff;
            }
            .mobile_area img{
                margin-top: 90px;
            }
        }
    </style>
    <script>
        var title = "<?php echo $co_view['co_subject'] ?>";
        $(".sub_nav h2").text(title);

        $(".modal_btn").on('click', function(){
            const $target = $(".mobile_area");
            const objWidth = $("#wrapper").width();


            $target.fadeIn(300);
            $target.find("img").show();

            const imgWidth = $target.find("img").width();

            $target.scrollLeft((imgWidth - objWidth)/2+30);
            $target.scrollTop(0);
        });

        $(".close_btn").on('click', function(){
            $(".mobile_area").fadeOut(300);

        })
    </script>
<?php
include_once(G5_THEME_MOBILE_PATH.'/tail.php');
?>