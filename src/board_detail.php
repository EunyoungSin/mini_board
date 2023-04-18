<?php
    define( "SRC_ROOT", $_SERVER["DOCUMENT_ROOT"]."/mini_board/src/" );
    define( "URL_DB", SRC_ROOT."common/db_common.php" );
    define( "URL_HEADER", SRC_ROOT."board_header.php" );
    include_once ( URL_DB );
    
    // Request Parameter 획득(GET)
    $arr_get = $_GET;

    // DB에서 게시글 정보 획득
    $result_info = select_board_info_no( $arr_get["board_no"] );

?>


<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <title>게시글 상세페이지</title>
    <link href="./css/css.css" rel="stylesheet" type="text/css">
</head>
<body>
    <?php include_once( URL_HEADER ) ?>
    <div class="bno">
        <label for="bno">게시글 번호 : </label>
        <input type="text" value="<?php echo $result_info["board_no"] ?>" id="bno" name="board_no" readonly>
    </div>
    <div class="date">
        <label for="date">게시된 일자 : </label>
        <input type="text" value="<?php echo $result_info["board_write_date"] ?>" id="date" name="board_title" readonly>
    </div>
    <div class="title">
        <label for="title">게시글 제목 : </label>
        <input type="text" value="<?php echo $result_info["board_title"] ?>" id="title" name="board_title" readonly>
    </div>
    <div class="cont">
        <label for="contents">게시글 내용 : </label>
        <input type="text" value="<?php echo $result_info["board_contents"] ?>" id="contents" name="board_contents" readonly>
    </div>
        <button type="button" onclick="location.href='board_update.php?board_no=<?php echo $result_info['board_no'] ?>'" class='btn btn-dark btn'>수정</button>
        <button type="button" onclick="location.href='board_delete.php?board_no=<?php echo $result_info['board_no'] ?>'" class='btn btn-dark btn'>삭제</button>
        <button type="button" onclick="location.href='board_list.php'" class='btn btn-dark'>목록</button>

</body>
</html>