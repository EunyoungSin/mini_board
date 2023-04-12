<?php
    define( "SRC_ROOT", $_SERVER["DOCUMENT_ROOT"]."/mini_board/src/" );
    define( "URL_DB", SRC_ROOT."common/db_common.php" );
    include_once ( URL_DB );
    
    // Request Parameter 획득(GET)
    $arr_get = $_GET;

    // DB에서 게시글 정보 획득
    $result_cnt = delete_board_info_no( $arr_get["board_no"] );

    header( "Location: board_list.php" );
    exit(); // 36행에서 redirect 했기 때문에 이후의 소스코드는 실행할 필요가 없다.
?>