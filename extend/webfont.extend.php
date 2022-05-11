<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가
add_event('tail_sub', 'web_font');
function web_font() {
    echo "
        <link rel=preconnect href=https://fonts.googleapis.com>
        <link rel=preconnect href=https://fonts.gstatic.com crossorigin>
        <link href=https://fonts.googleapis.com/css2?family=Noto+Sans+KR:wght@100;300;400;500;700;900&display=swap rel=stylesheet>
        <style>div, span, table, p, input, textarea, button, select, h1, h2, h3, a { font-family:'Noto Sans KR' !important; }</style>
    ";
}