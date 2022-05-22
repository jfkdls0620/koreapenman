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
            <div class="content_area">
              <?php if($list[$i]['wr_2']) { ?>
              <div class="category">
                <?php echo $list[$i]['wr_2'] ?>&nbsp;
              </div>
              <?php } ?>
              <div class="title">
                <?php echo $list[$i]['wr_subject'] ?>
              </div>
              <div class="content_bottom">
                <span class="nick_name">
                  <i class="fa fa-user" aria-hidden="true"></i>
                  <?php echo $list[$i]['wr_1'] ?>
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

