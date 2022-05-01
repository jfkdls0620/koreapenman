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
            <div class="location_content">
                <?php echo $co_view['co_content']?>
                <div id="map" style="width:100%;height:400px;"></div>
            </div>
        </div>
    </article>

    <script>
            var title = "<?php echo $co_view['co_subject'] ?>";
            $(".sub_nav h2").text(title);

            var mapOptions = {
                center: new naver.maps.LatLng(37.558404, 127.0130084),
                zoom: 18
            };

            var map = new naver.maps.Map('map', mapOptions);

            var marker = new naver.maps.Marker({
                position: new naver.maps.LatLng(37.558404, 127.0130084),
                map: map
            });
            marker.setMap(map);

    </script>
<?php
include_once(G5_THEME_MOBILE_PATH.'/tail.php');
?>