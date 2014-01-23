<?php

/**
 *      [Discuz!] (C)2001-2099 Comsenz Inc.
 *      This is NOT a freeware, use is subject to license terms
 *
 *	$Id: lang_exif.php by Valery Votintsev at sources.ru
 */

if(!defined('IN_DISCUZ')) {
	exit('Access Denied');
}

$lang = array(

	'unknown'		=> 'Unknown',//'未知',
	'resolutionunit'	=> array('', '', 'inch', 'cm'),//array('', '', '英寸', '厘米'),
	'exposureprogram'	=> array('Undefined', 'Manual', 'Standard procedure', 'Aperture Priority', 'Shutter Priority', 'Depth of pre-field', 'Sports mode', 'Portrait Mode', 'Landscape mode'),//array('未定义', '手动', '标准程序', '光圈先决', '快门先决', '景深先决', '运动模式', '肖像模式', '风景模式'),
	'meteringmode'	=> array(
		'0'		=> 'Unknown',//'未知',
		'1'		=> 'Average',//'平均',
		'2'		=> 'The central focus of the average metering',//'中央重点平均测光',
		'3'		=> 'Points measurement',//'点测',
		'4'		=> 'Zoning',//'分区',
		'5'		=> 'Access',//'评估',
		'6'		=> 'Part',//'局部',
		'255'		=> 'Other'//'其他'
		),
	'lightsource'	=> array(
		'0'		=> 'Unknown',//'未知',
		'1'		=> 'Sunlight',//'日光',
		'2'		=> 'Fluorescent',//'荧光灯',
		'3'		=> 'Tungsten',//'钨丝灯',
		'10'		=> 'Flash',//'闪光灯',
		'17'		=> 'Standard light A',//'标准灯光A',
		'18'		=> 'Standard light B',//'标准灯光B',
		'19'		=> 'Standard light C',//'标准灯光C',
		'20'		=> 'D55',//'D55',
		'21'		=> 'D65',//'D65',
		'22'		=> 'D75',//'D75',
		'255'		=> 'Other'//'其他'
		),
	'img_info'	=> array ('File information'	=> 'No EXIF information'),//array ('文件信息' => '没有图片EXIF信息'),
	
	'FileName'		=> 'File Name',//'文件名',
	'FileType'		=> 'File Type',//'文件类型',
	'MimeType'		=> 'Mime Type',//'文件格式',
	'FileSize'		=> 'File Size',//'文件大小',
	'FileDateTime'		=> 'File Time',//'时间戳',
	'ImageDescription'	=> 'Image Description',//'图片说明',
	'auto'			=> 'Auto',//'自动',
	'Make'			=> 'Manufacturer',//'制造商',
	'Model'			=> 'Model',//'型号',
	'Orientation'		=> 'Orientation',//'方向',
	'XResolution'		=> 'Horizontal resolution',//'水平分辨率',
	'YResolution'		=> 'Vertical Resolution',//'垂直分辨率',
	'Software'		=> 'Software',//'创建软件',
	'DateTime'		=> 'Modified Time',//'修改时间',
	'Artist'		=> 'Author',//'作者',
	'YCbCrPositioning'	=> 'YCbCr Positioning',//'YCbCr位置控制',
	'Copyright'		=> 'Copyright',//'版权',
	'Photographer'		=> 'Photographer',//'摄影版权',
	'Editor'		=> 'Editor',//'编辑版权',
	'ExifVersion'		=> 'Exif version',//'Exif版本',
	'FlashPixVersion'	=> 'FlashPix Version',//'FlashPix版本',
	'DateTimeOriginal'	=> 'Capture time',//'拍摄时间',
	'DateTimeDigitized'	=> 'Digitized time',//'数字化时间',
	'Height'		=> 'Capture height resolution',//'拍摄分辨率高',
	'Width'			=> 'Capture width resolution',//'拍摄分辨率宽',
	'ApertureValue'		=> 'Aperture',//'光圈',
	'ShutterSpeedValue'	=> 'Shutter speed',//'快门速度',
	'ApertureFNumber'	=> 'Shutter aperture',//'快门光圈',
	'MaxApertureValue'	=> 'Maximum aperture value',//'最大光圈值',
	'ExposureTime'		=> 'Exposure time',//'曝光时间',
	'FNumber'		=> 'F-Number',//'F-Number',
	'MeteringMode'		=> 'Metering Mode',//'测光模式',
	'LightSource'		=> 'Light Source',//'光源',
	'Flash'			=> 'Flash',//'闪光灯',
	'ExposureMode'		=> 'Exposure mode',//'曝光模式',
	'manual'		=> 'Manual',//'手动',
	'WhiteBalance'		=> 'White Balance',//'白平衡',
	'ExposureProgram'	=> 'Exposure Program',//'曝光程序',
	'ExposureBiasValue'	=> 'Exposure Compensation',//'曝光补偿',
	'ISOSpeedRatings'	=> 'ISO sensitivity',//'ISO感光度',
	'ComponentsConfiguration'	=> 'Components Configuration',//'分量配置',
	'CompressedBitsPerPixel'	=> 'Image compression ratio',//'图像压缩率',
	'FocusDistance'		=> 'Focus Distance',//'对焦距离',
	'FocalLength'		=> 'Focal Length',//'焦距',
	'FocalLengthIn35mmFilm'	=> 'Equivalent 35mm focal length',//'等价35mm焦距',
	'UserCommentEncoding'	=> 'User Comment Encoding',//'用户注释编码',
	'UserComment'		=> 'User Comment',//'用户注释',
	'ColorSpace'		=> 'Color Space',//'色彩空间',
	'ExifImageLength'	=> 'Exif Image Width',//'Exif图像宽度',
	'ExifImageWidth'	=> 'Exif Image Height',//'Exif图像高度',
	'FileSource'		=> 'File Source',//'文件来源',
	'SceneType'		=> 'Scene type',//'场景类型',
	'ThumbFileType'		=> 'Thumbnail file format',//'缩略图文件格式',
	'ThumbMimeType'		=> 'Thumbnail Mime type',//'缩略图Mime格式'
);

