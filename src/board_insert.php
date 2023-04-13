<?php
    define( "SRC_ROOT", $_SERVER["DOCUMENT_ROOT"]."/mini_board/src/" );
    define( "URL_DB", SRC_ROOT."common/db_common.php" );
    define( "URL_HEADER", SRC_ROOT."board_header.php" );
    include_once ( URL_DB );
    
    // Request Method를 획득
    $http_method = $_SERVER["REQUEST_METHOD"];

    // POST 일 때
    if ( $http_method === "POST" )
    {
        $arr_post = $_POST;

        $result_cnt = insert_board_info( $arr_post );

        header( "Location: board_list.php" );
        exit(); // 16행에서 redirect 했기 때문에 이후의 소스코드는 실행할 필요가 없다.
    }
    
?>


<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <title>게시글 작성</title>
    <link href="./css/css.css" rel="stylesheet" type="text/css">
</head>
<body>
    <?php include_once( URL_HEADER ) ?>
    <form method="post" action="board_insert.php" id="form">
    <div class="title">
        <label for="title">게시글 제목 : </label>
        <input type="text" id="title" name="board_title">
    </div>
    <div class="cont">
        <label for="contents">게시글 내용 : </label>
        <input type="text" id="contents" name="board_contents">
    </div>
        <button type="submit" class="btn btn-dark">완료</button>
        <button type="button" onclick="location.href='board_list.php'" class='btn btn-dark'>취소</button>
    </form>
</body>
</html>