SELECT *
FROM
	board_info
ORDER BY
	board_no ASC
LIMIT 5 OFFSET 10
;

SELECT
	board_no
	,board_title
	,board_write_date
FROM
	board_info
WHERE
	board_del_flg = '0'
ORDER BY
	board_no ASC
LIMIT 5 OFFSET 0
;

COMMIT;

SELECT COUNT(board_no) cnt
FROM board_info
WHERE board_del_flg = '0';

ROLLBACK;