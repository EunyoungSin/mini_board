INSERT INTO board_info (
	board_title
	, board_contents
	, board_write_date
)

VALUES ('제목1','내용1',NOW())
('제목2','내용2',NOW())
('제목3','내용3',NOW())
('제목4','내용4',NOW())
('제목5','내용5',NOW())
('제목6','내용6',NOW())
('제목7','내용7',NOW())
('제목8','내용8',NOW())
('제목9','내용9',NOW())
('제목10','내용10',NOW())
('제목11','내용11',NOW())
('제목12','내용12',NOW())
('제목13','내용13',NOW())
('제목14','내용14',NOW())
('제목15','내용15',NOW())
('제목16','내용16',NOW())
('제목17','내용17',NOW())
('제목18','내용18',NOW())
('제목19','내용19',NOW())
('제목20','내용20',NOW());

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