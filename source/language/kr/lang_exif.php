<?php

/**
 *      [Discuz!] (C)2001-2099 Comsenz Inc.
 *      This is NOT a freeware, use is subject to license terms
 *
 *	$Id: lang_exif.php by Valery Votintsev, codersclub.org
 */

$lang = array(

	'unknown'		=> 'Unknown',//'未知',
	'resolutionunit'	=> array('', '', '인치', '센티'),//array('', '', '英寸', '厘米'),
	'exposureprogram'	=> array('미정의', '수동', '표준 프로그램', '조리개 우선', '셔터 우선', '피사계 심도', '스포츠모드', '초상모드', '풍경모드'),//array('未定义', '手动', '标准程序', '光圈先决', '快门先决', '景深先决', '运动模式', '肖像模式', '风景模式'),
	'meteringmode'	=> array(
		'0'		=> '알수 없음.',//'未知',
		'1'		=> '평균',//'平均',
		'2'		=> '중앙중점 평균 측광',//'中央重点平均测光',
		'3'		=> '포인트 측정',//'点测',
		'4'		=> '분 구역',//'分区',
		'5'		=> '액세스',//'评估',
		'6'		=> '부분',//'局部',
		'255'		=> '기타'//'其他'
		),
	'lightsource'	=> array(
		'0'		=> '알수 없음',//'未知',
		'1'		=> '일광',//'日光',
		'2'		=> '형광등',//'荧光灯',
		'3'		=> '텅스텐',//'钨丝灯',
		'10'		=> '플래시',//'闪光灯',
		'17'		=> '표준광 A',//'标准灯光A',
		'18'		=> '표준광 B',//'标准灯光B',
		'19'		=> '표준광 C',//'标准灯光C',
		'20'		=> 'D55',//'D55',
		'21'		=> 'D65',//'D65',
		'22'		=> 'D75',//'D75',
		'255'		=> '기타'//'其他'
		),
	'img_info'	=> array ('파일정보'	=> 'EXIF정보가 없음.'),//array ('文件信息' => '没有图片EXIF信息'),
	
	'FileName'		=> '파일 명',//'文件名',
	'FileType'		=> '파일 유형',//'文件类型',
	'MimeType'		=> '파일 형식',//'文件格式',
	'FileSize'		=> '파일 크기',//'文件大小',
	'FileDateTime'		=> '파일 시간',//'时间戳',
	'ImageDescription'	=> '이미지 설명',//'图片说明',
	'auto'			=> '자동',//'自动',
	'Make'			=> '제조상',//'制造商',
	'Model'			=> '모델',//'型号',
	'Orientation'		=> '방향',//'方向',
	'XResolution'		=> '수평 해상도',//'水平分辨率',
	'YResolution'		=> '수직 해상도',//'垂直分辨率',
	'Software'		=> '소프트웨어',//'创建软件',
	'DateTime'		=> '수정시간',//'修改时间',
	'Artist'		=> '글쓴이',//'作者',
	'YCbCrPositioning'	=> 'YCbCr 위치',//'YCbCr位置控制',
	'Copyright'		=> '저작권',//'版权',
	'Photographer'		=> '촬영 저작권',//'摄影版权',
	'Editor'		=> '저작권 편집',//'编辑版权',
	'ExifVersion'		=> 'Exif 버전',//'Exif版本',
	'FlashPixVersion'	=> 'FlashPix 버전',//'FlashPix版本',
	'DateTimeOriginal'	=> '촬영시간',//'拍摄时间',
	'DateTimeDigitized'	=> '디지털화 시간',//'数字化时间',
	'Height'		=> '촬영 해상도 높이',//'拍摄分辨率高',
	'Width'			=> '촬영 해상도 폭',//'拍摄分辨率宽',
	'ApertureValue'		=> '조리개',//'光圈',
	'ShutterSpeedValue'	=> '셔터 스피드',//'快门速度',
	'ApertureFNumber'	=> '셔터 조리개',//'快门光圈',
	'MaxApertureValue'	=> '최대 조리개 값',//'最大光圈值',
	'ExposureTime'		=> '노출시간',//'曝光时间',
	'FNumber'		=> 'F-Number',//'F-Number',
	'MeteringMode'		=> '측광모드',//'测光模式',
	'LightSource'		=> '광원',//'光源',
	'Flash'			=> '플래시',//'闪光灯',
	'ExposureMode'		=> '노출모드',//'曝光模式',
	'manual'		=> '수동',//'手动',
	'WhiteBalance'		=> '화이트 밸런스',//'白平衡',
	'ExposureProgram'	=> '노출 프로그램',//'曝光程序',
	'ExposureBiasValue'	=> '노출보정',//'曝光补偿',
	'ISOSpeedRatings'	=> 'ISO감광도',//'ISO感光度',
	'ComponentsConfiguration'	=> '분량설정',//'分量配置',
	'CompressedBitsPerPixel'	=> '이미지 압축율',//'图像压缩率',
	'FocusDistance'		=> '초점거리 맞추기',//'对焦距离',
	'FocalLength'		=> '초점거리',//'焦距',
	'FocalLengthIn35mmFilm'	=> '등가 35mm 초점 거리',//'等价35mm焦距',
	'UserCommentEncoding'	=> '사용자 주석코드',//'用户注释编码',
	'UserComment'		=> '사용자 주석',//'用户注释',
	'ColorSpace'		=> '색상',//'色彩空间',
	'ExifImageLength'	=> 'Exif 이미지 넓이',//'Exif图像宽度',
	'ExifImageWidth'	=> 'Exif 이미지 높이',//'Exif图像高度',
	'FileSource'		=> '파일소스',//'文件来源',
	'SceneType'		=> '장면유형',//'场景类型',
	'ThumbFileType'		=> '썸네일 파일 형식',//'缩略图文件格式',
	'ThumbMimeType'		=> '썸네일Mime 형식',//'缩略图Mime格式'
);

