<?php

/**
 *      [Discuz!] (C)2001-2099 Comsenz Inc.
 *      This is NOT a freeware, use is subject to license terms
 *
 *	$Id: lang_exif.php by Valery Votintsev at sources.ru
 *	Translated to Spanish by jhoxi, discuzhispano.com
 */

$lang = array(

	'unknown'		=> 'Desconocido',//'未知',
	'resolutionunit'	=> array('', '', 'pulgada', 'cm'),//array('', '', '英寸', '厘米'),
	'exposureprogram'	=> array('Indefinido', 'Manual', 'Procedimiento estándar', 'Prioridad de Apertura', 'Prioridad de obturación', 'Profundidad de pre-campo', 'Modo de deportes', 'Modo retrato', 'Modo paisaje'),//array('未定义', '手动', '标准程序', '光圈先决', '快门先决', '景深先决', '运动模式', '肖像模式', '风景模式'),
	'meteringmode'	=> array(
		'0'		=> 'Desconocido',//'未知',
		'1'		=> 'Promedio',//'平均',
		'2'		=> 'El foco central del promedio de la medición',//'中央重点平均测光',
		'3'		=> 'Puntos de medición',//'点测',
		'4'		=> 'Zonificación',//'分区',
		'5'		=> 'Acceso',//'评估',
		'6'		=> 'Parte',//'局部',
		'255'		=> 'Otro'//'其他'
		),
	'lightsource'	=> array(
		'0'		=> 'Desconocido',//'未知',
		'1'		=> 'Luz del sol',//'日光',
		'2'		=> 'Fluorescente',//'荧光灯',
		'3'		=> 'Tungsteno',//'钨丝灯',
		'10'		=> 'Flash',//'闪光灯',
		'17'		=> 'Luz estándar A',//'标准灯光A',
		'18'		=> 'Luz estándar B',//'标准灯光B',
		'19'		=> 'Luz estándar C',//'标准灯光C',
		'20'		=> 'D55',//'D55',
		'21'		=> 'D65',//'D65',
		'22'		=> 'D75',//'D75',
		'255'		=> 'Otro'//'其他'
		),
	'img_info'	=> array ('Información del archivo'	=> 'No hay imagen EXIF información'),//array ('文件信息'	=> '没有图片EXIF信息'),
	
	'FileName'		=> 'Nombre de archivo',//'文件名',
	'FileType'		=> 'Tipo de Archivo',//'文件类型',
	'MimeType'		=> 'Tipo Mime',//'文件格式',
	'FileSize'		=> 'Tamaño del archivo',//'文件大小',
	'FileDateTime'		=> 'Tiempo del archivo',//'时间戳',
	'ImageDescription'	=> 'Descripción de la imagen',//'图片说明',
	'auto'			=> 'Auto',//'自动',
	'Make'			=> 'Fabricante',//'制造商',
	'Model'			=> 'Modelo',//'型号',
	'Orientation'		=> 'Orientación',//'方向',
	'XResolution'		=> 'Resolución horizontal',//'水平分辨率',
	'YResolution'		=> 'Resolución vertical',//'垂直分辨率',
	'Software'		=> 'Software',//'创建软件',
	'DateTime'		=> 'Hora de modificación',//'修改时间',
	'Artist'		=> 'Autor',//'作者',
	'YCbCrPositioning'	=> 'YCbCr Posicionamiento',//'YCbCr位置控制',
	'Copyright'		=> 'Derechos de autor',//'版权',
	'Photographer'		=> 'Fotógrafo',//'摄影版权',
	'Editor'		=> 'Editor',//'编辑版权',
	'ExifVersion'		=> 'Versión Exif',//'Exif版本',
	'FlashPixVersion'	=> 'Versión FlashPix',//'FlashPix版本',
	'DateTimeOriginal'	=> 'Tiempo de captura',//'拍摄时间',
	'DateTimeDigitized'	=> 'Tiempo digitalizado',//'数字化时间',
	'Height'		=> 'Resolución de altura de captura',//'拍摄分辨率高',
	'Width'			=> 'Resolución de ancho de captura',//'拍摄分辨率宽',
	'ApertureValue'		=> 'Abertura',//'光圈',
	'ShutterSpeedValue'	=> 'Velocidad de obturación',//'快门速度',
	'ApertureFNumber'	=> 'Abertura de obturación',//'快门光圈',
	'MaxApertureValue'	=> 'Valor máximo de la apertura',//'最大光圈值',
	'ExposureTime'		=> 'Tiempo de exposición',//'曝光时间',
	'FNumber'		=> 'F-Número',//'F-Number',
	'MeteringMode'		=> 'Modo de medición',//'测光模式',
	'LightSource'		=> 'Fuente de luz',//'光源',
	'Flash'			=> 'Flash',//'闪光灯',
	'ExposureMode'		=> 'Modo de exposición',//'曝光模式',
	'manual'		=> 'Manual',//'手动',
	'WhiteBalance'		=> 'Balance de blancos',//'白平衡',
	'ExposureProgram'	=> 'Exposición del Programa',//'曝光程序',
	'ExposureBiasValue'	=> 'Compensación de la exposición',//'曝光补偿',
	'ISOSpeedRatings'	=> 'ISO sensibilidad',//'ISO感光度',
	'ComponentsConfiguration'	=> 'Configuración de componentes',//'分量配置',
	'CompressedBitsPerPixel'	=> 'Relación de compresión de imagen',//'图像压缩率',
	'FocusDistance'		=> 'Distancia de enfoque',//'对焦距离',
	'FocalLength'		=> 'Longitud focal',//'焦距',
	'FocalLengthIn35mmFilm'	=> 'Equivalente 35mm longitud focal',//'等价35mm焦距',
	'UserCommentEncoding'	=> 'Usuario configuración de comentario',//'用户注释编码',
	'UserComment'		=> 'Usuario Comentario',//'用户注释',
	'ColorSpace'		=> 'Color de Espacio',//'色彩空间',
	'ExifImageLength'	=> 'Ancho de imagen Exif',//'Exif图像宽度',
	'ExifImageWidth'	=> 'Alto de imagen Exif',//'Exif图像高度',
	'FileSource'		=> 'Archivo de origen',//'文件来源',
	'SceneType'		=> 'Escena de tipo',//'场景类型',
	'ThumbFileType'		=> 'Formato de archivo en miniatura',//'缩略图文件格式',
	'ThumbMimeType'		=> 'Tipo de miniatura Mime',//'缩略图Mime格式'
);

?>