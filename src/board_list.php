<?php
    define( "DOC_ROOT", $_SERVER["DOCUMENT_ROOT"]."/" ); // $_SERVER : 슈퍼글로벌 변수 ($_대문자) / 현재 사이트가 위치한 서버상의 위치
    define( "URL_DB", DOC_ROOT."mini_board/src/common/db_common.php" );
    define( "URL_HEADER", DOC_ROOT."mini_board/src/board_header.php" );
    include_once ( URL_DB );

	// GET 체크
	if( array_key_exists( "page_num", $_GET ) )
	{
		$page_num = $_GET["page_num"];
	}
	else
	{
		$page_num = 1;
	}

    $limit_num = 5;

	// 게시판 정보 테이블 전체 카운트 획득
	$result_cnt = select_board_info_cnt();

	// max page number
	$max_page_num = ceil( (int)$result_cnt[0]["cnt"] / $limit_num );

    $prev_page_num = $page_num - 1 > 0? $page_num - 1 : 1;
    $next_page_num = $page_num + 1 > $max_page_num ? $max_page_num : $page_num + 1;

	// offset : 1페이지일때 게시글번호 0번 부터 시작, 2페이지일때 게시글번호 5번 부터 시작, 3페이지일때 10... 
	$offset = ( $page_num * $limit_num ) - $limit_num;

	$arr_prepare =
		array(
			"limit_num"	=> $limit_num
			,"offset"	=> $offset
		);

	// 페이징용 데이터 검색
	$result_paging = select_board_info_paging( $arr_prepare );
?>


<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <title>게시판</title>
    <link href="./css/css.css" rel="stylesheet" type="text/css">
</head>
<body>
    <?php include_once( URL_HEADER ) ?>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>게시글 번호</th>
                <th>게시글 제목</th>
                <th>작성일자</th>
            </tr>
        </thead>
        <tbody>
            <?php
                foreach( $result_paging as $recode )
                {
            ?>
                <tr>
                <td id="first"><?php echo $recode["board_no"] ?></td>
                <td id="second"><a href="board_detail.php?board_no=<?php echo $recode["board_no"] ?>" id="title_link"><?php echo $recode["board_title"] ?></a></td>
                <td id="third"><?php echo $recode["board_write_date"] ?></td>
                </tr>
            <?php
                }
            ?>
        </tbody>
    </table>

    <div class="d-flex justify-content-center">
    <button type="button" onclick="location.href='board_list.php?page_num=1'" class="btn btn-default">처음</button>
    <button type="button" onclick="location.href='board_list.php?page_num=<?php echo $prev_page_num ?>'" class="btn btn-default">◀</button>
    <!-- 페이징 번호 -->
    <?php
        for( $i = 1; $i <= $max_page_num; $i++ )
        {
    ?>
        <a href='board_list.php?page_num=<?php echo $i ?>' class='btn btn-default'><?php echo $i ?></a>
    <?php
        }
    ?>
    <button type="button" onclick="location.href='board_list.php?page_num=<?php echo $next_page_num ?>'" class="btn btn-default">▶</button>
    <button type="button" onclick="location.href='board_list.php?page_num=<?php echo $max_page_num ?>'" class="btn btn-default">끝</button>
    </div>

    <button type="button" onclick="location.href='board_insert.php'" class="btn btn-dark" id="write">글쓰기</a></button>
</body>
</html>