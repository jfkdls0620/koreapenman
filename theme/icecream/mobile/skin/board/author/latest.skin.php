<?php
  if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가
  include_once(G5_LIB_PATH.'/thumbnail.lib.php');


  //스킨 CSS,JS 인클루드
  add_stylesheet('<link rel="stylesheet" href="'.$latest_skin_url.'/style.css?'.time().'" />', 0);

  //썸네일 크기 설징
  $thumb_width = 300;
  $thumb_height = 168;
?>


<div class="gnuboard_latest_gallery_list">

  <div class="document_list">
    <ul>
      <?php for ($i=0; $i < count($list); $i++) { ?>
        <li>
          <a href="<?php echo $list[$i]['href'] ?>">
            <?php
              //썸네일 설정
    	  	    $thumb = get_list_thumbnail($bo_table, $list[$i]['wr_id'], $thumb_width, $thumb_height, false, true);
    	  	  ?>
            <div class="thumb_area">
              <?php if($thumb['src']) { ?>
                <img src="<?php echo $thumb['src'] ?>" />
              <?php } else { ?>
                <img src="<?php echo $latest_skin_url ?>/images/noimage_300x168.jpg" />
              <?php } ?>
            </div>
            <div class="content_area">
              <?php if($list[$i]['ca_name']) { ?>
              <div class="category">
                <?php echo $list[$i]['ca_name'] ?>&nbsp;
              </div>
              <?php } ?>
              <div class="title">
                <?php echo $list[$i]['wr_subject'] ?>
              </div>
              <div class="content_bottom">
                <span class="nick_name">
                  <i class="fa fa-user" aria-hidden="true"></i>
                  <?php echo $list[$i]['wr_name'] ?>
                </span>
                ·
                <span class="date">
                  <i class="fa fa-clock-o" aria-hidden="true"></i>
                  <?php echo date("y-m-d", strtotime($list[$i]['wr_datetime'])) ?>
                </span>
                <span class="comment_count">
                  <i class="fa fa-commenting-o" aria-hidden="true"></i>
                  <?php echo number_format($list[$i]['wr_comment']) ?>
                </span>
              </div>
            </div>
          </a>
        </li>
      <?php } ?>
    </ul>
  </div>

</div>

