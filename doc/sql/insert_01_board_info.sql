INSERT INTO board_info (
	board_title
	, board_contents
	, board_write_date
)

VALUES ('제목21','내용21',NOW()),
('제목22','내용22',NOW()),
('제목23','내용23',NOW()),
('제목24','내용24',NOW()),
('제목25','내용25',NOW())
;

INSERT INTO board_info (
	board_title
	, board_contents
	, board_write_date
)

VALUES (
	'제목20'
	,'내용20'
	,NOW()
);

ALTER TABLE board_info AUTO_INCREMENT = 2;

DELETE FROM board_info WHERE board_no = 2;

SELECT * FROM board_info;

COMMIT;