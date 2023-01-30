<?php
include_once("../common.php");
include_once(G5_THEME_MOBILE_PATH.'/head.php');
include_once(G5_LIB_PATH.'/thumbnail.lib.php');

?>

<?php
$co_view = sql_fetch(" select co_subject, co_content, co_mobile_content from {$g5['content_table']} where co_id = 'masterintro' ");
// print_r2($co_view);
?>
    <article id="ctt" class="ctt_aoIncorporation">
        <div id="ctt_con">
            <div class="sub01_content">
                <div class="table tl">
                    <div class="td-img img01">
                       <!-- 한국명인·명장취지 및 목적 -->
                    </div>
                    <div class="td-text">
                        <dl>
                            <dt>한국명인·명장취지 및 목적</dt>
                            <dd>
                                한국 전통문화를 계승하고 대한민국 문화예술 분야에서 무형문화유산을 전승하고 창조 정신으로 장인들의 위상 제고하며 창조적이고
                                진취적인 문화의 장을 만들어 전통문화 각 분야의 일가를 이룬 최고의 장인을 발굴하여 한국명인·명장으로 추대함으로써 무형문화유산을
                                계승 발전시키고 국가 위상을 높이며 우리 민족의 독창성을 세계에 선양하는데 기여하고자한다
                            </dd>
                        </dl>
                    </div>
                </div>
                <div class="table tr">
                    <div class="td-text" style="width: 55%">
                        <dl>
                            <dt>무형문화유산의 정의</dt>
                            <dd>
                                전승되어 온 무형문화유산은 민속, 전통, 관습, 묘사, 표현, 지식 및 기술 및 이와 관련된 기구, 물품, 가공품 및 문화 공간이며,
                                사회 집단 및 경우에 따라서는 개인이 자기의 문화 유산의 일부로 인정하는 것을 말한다.
                            </dd>
                        </dl>
                    </div>
                    <div class="td-img img02" style="width: 45%">
                        <!-- 무형문화유산의 정의 -->
                    </div>
                </div>
                <div class="td-img img03">
                    <div>
                        <h3>한국명인·명장(名人·名匠)이란?</h3>
                    </div>
                </div>

                <div class="list">
                    <dl>
                        <dt>한국명인·명장</dt>
                        <dd>- 한국 전통(공예. 국악. 예능. 음식. 한복. 미술. 무용. 도예. 술. 악기제작.)등을 기능 전수를 통해 후계자를 양성하고 있는 분</dd>
                        <dt>한국명인·명장 전승단체</dt>
                        <dd>- 한국 전통(공예. 국악. 예능. 음식. 한복. 미술. 무용. 도예. 술. 악기제작.)등을 실현·강습할 수 있는 단체</dd>
                        <dt>한국명인·명장 전승공동체</dt>
                        <dd>- 한국 전통(공예. 국악. 예능. 음식. 한복. 미술. 무용. 도예. 술. 악기제작.)등을 전승해온 주민, 마을 또는 단체</dd>
                    </dl>
                </div>

                <div class="table tl" style="margin-top:100px">
                    <div class="td-img img04">
                        <!-- 한국 명장·명인 인증 목적 -->
                    </div>
                    <div class="td-text">
                        <dl>
                            <dt>한국 명장·명인 인증 목적</dt>
                            <dd>
                                본 협회에서 시행하는 한국명인·명장 인증사업은 (사)한국서화교육협회가 문화예술 분야에서 무형문화유산의 전승하고
                                창조 정신으로 장인들의 위상 제고하며 창조적이고 진취적인 문화의 장을 만들어 전통문화 각 분야의 일가를 이룬 최고의
                                장인을 발굴하여 인증을 위한 사항을 제정 함으로서 정관 제4조 목적사업을 수행하기 위한 것을 목적으로 한다.
                            </dd>
                        </dl>
                    </div>
                </div>

                <div class="table tr" style="margin-top:100px">
                    <div class="td-text">
                        <dl>
                            <dt>한국 명인·명장 인증 지정대상 및 자격</dt>
                            <dd>
                                한국 전통(공예. 국악. 예능. 음식. 한복. 미술. 무용. 도예. 술. 악기제작.) 등에 다년간 종사한 자로서 계승 발전을
                                위해 노력하고 전통문화발전에 이바지하고, 각 공모전에 다수의 수상경력이 있는 자로서 기능 전수를 통해 후계자를 양성하고 있는 분
                            </dd>
                        </dl>
                    </div>
                    <div class="td-img img05">
                        <!-- 한국 명인·명장 인증 지정대상 및 자격 -->
                    </div>
                </div>

            </div>
        </div>
    </article>
    <style>
        #ctt{padding-left: 0;padding-right: 0;}
        .table{width: 100%;font-size:0;margin-bottom: 60px;padding: 0 20px}
        .table>div{display:inline-block;vertical-align: top;}
        .td-img{width: 35%;min-height:240px;background-position: center;background-repeat: no-repeat;background-size:cover}
        .td-img.img01{background-image: url("img/sub01.jpg");}
        .td-img.img02{background-image: url("img/sub02.jpg");}
        .td-img.img03{width: 100%;background-image: url("img/sub03.jpg");height: 300px;margin-top:120px;position:relative}
        .td-img.img03::after{content:"";position:absolute;width: 100%;height: 100%;background-color: rgba(0,0,0,.5);}
        .td-img.img03 h3{position:absolute;top:50%;left:50%;transform:translate(-50%,-50%);font-size:30px;text-align: center;color:#fff;z-index: 10;}
        .td-img.img04{background-image: url("img/sub04.jpg")}
        .td-img.img05{background-image: url("img/sub05.jpg")}
        .table .td-text{width: 65%}
        .table.tl .td-text dl{padding-left: 15px}
        .table.tr .td-text dl{padding-right:15px;}
        dl dt{font-size:26px;font-weight:600;padding-bottom: 10px}
        dl dd{font-size:20px;color:#444;font-weight: 300}

        .list{padding: 20px}
        .list dl{padding-left: 10px}
        .list dl dt{font-size:18px;margin-top: 10px}
        .list dl dd{font-size:16px;font-weight: 300;padding-left: 5px}

        @media (max-width: 969px){
            #container.sub_page{
                padding: 0;
            }
            .td-img{
                width: 100%;
            }
            .table{
                padding: 0 10px;
            }
            .table .td-text{
                width: 100% !important;
            }
            .table.tl .td-text dl{
                padding: 0;
                margin-top: 15px;
            }
            dl dt{
                font-size:20px;
                padding-bottom: 5px;
            }
            dl dd{
                font-size:18px;
            }
            .td-img.img02{
                width: 100% !important;
            }
        }
    </style>
    <script>
        var title = "<?php echo $co_view['co_subject'] ?>";
        $(".sub_nav h2").text(title);
    </script>
<?php
include_once(G5_THEME_MOBILE_PATH.'/tail.php');
?>