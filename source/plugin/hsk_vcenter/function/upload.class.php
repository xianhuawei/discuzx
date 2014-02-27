<?php
class resizeimage
{
        //图片类型
        var $type;
        //实际宽度
        var $width;
        //实际高度
        var $height;
        //改变后的宽度
        var $resize_width;
        //改变后的高度
        var $resize_height;
        //是否裁图
        var $cut;
        //源图象
        var $srcimg;
        //目标图象地址
        var $dstimg;
        //临时创建的图象
        var $im;

        function resizeimage($img, $wid, $hei, $c)
        {
                //echo $img.$wid.$hei.$c;
                $this->srcimg = $img;
                $this->resize_width = $wid;
                $this->resize_height = $hei;
                $this->cut = $c;
                //图片的类型
                $this->type = substr(strrchr($this->srcimg,"."),1);
                //初始化图象
                $this->initi_img();
                //目标图象地址
                $this -> dst_img();
                //imagesx imagesy 取得图像 宽、高
                $this->width = imagesx($this->im);
                $this->height = imagesy($this->im);
                //生成图象
                $this->newimg();
                ImageDestroy ($this->im);
        }
        function newimg()
        {

                //改变后的图象的比例
                $resize_ratio = ($this->resize_width)/($this->resize_height);
                //实际图象的比例
                $ratio = ($this->width)/($this->height);
                if(($this->cut)=="1")
                //裁图
                {
                        if($ratio>=$resize_ratio)
                        //高度优先
                        {
                                //imagecreatetruecolor — 新建一个真彩色图像
                                $newimg = imagecreatetruecolor($this->resize_width,$this->resize_height);
                                //imagecopyresampled — 重采样拷贝部分图像并调整大小
                                imagecopyresampled($newimg, $this->im, 0, 0, 0, 0, $this->resize_width,$this->resize_height, (($this->height)*$resize_ratio), $this->height);

                                ImageJpeg ($newimg,$this->dstimg);
                        }
                        if($ratio<$resize_ratio)
                        //宽度优先
                        {
                                $newimg = imagecreatetruecolor($this->resize_width,$this->resize_height);
                                imagecopyresampled($newimg, $this->im, 0, 0, 0, 0, $this->resize_width, $this->resize_height, $this->width, (($this->width)/$resize_ratio));

                                ImageJpeg ($newimg,$this->dstimg);
                        }

                }
                else
                //不裁图
                {
                        if($ratio>=$resize_ratio)
                        {
                                $newimg = imagecreatetruecolor($this->resize_width,($this->resize_width)/$ratio);
                                imagecopyresampled($newimg, $this->im, 0, 0, 0, 0, $this->resize_width, ($this->resize_width)/$ratio, $this->width, $this->height);

                                ImageJpeg ($newimg,$this->dstimg);
                        }
                        if($ratio<$resize_ratio)
                        {
                                $newimg = imagecreatetruecolor(($this->resize_height)*$ratio,$this->resize_height);
                                imagecopyresampled($newimg, $this->im, 0, 0, 0, 0, ($this->resize_height)*$ratio, $this->resize_height, $this->width, $this->height);

                                ImageJpeg ($newimg,$this->dstimg);
                        }
                }
        }
        //初始化图象
        
        function initi_img()
        {
                if($this->type=="jpg")
                {
                        $this->im = imagecreatefromjpeg($this->srcimg);
                }
                if($this->type=="gif")
                {
                        $this->im = imagecreatefromgif($this->srcimg);
                }
                if($this->type=="png")
                {
                        $this->im = imagecreatefrompng($this->srcimg);
                }
        }
        function dst_img()
        {
				$full_length  = strlen($this->srcimg);
                $type_length  = strlen($this->type);
                $name_length  = $full_length-$type_length;
				$length_1	  = strrpos($this->srcimg, "/");
				$length_2	  = substr($this->srcimg, 0, $length_1);
				$length_3	  = substr($this->srcimg, $length_1+1);
				$length_3	  = substr($length_3, 0, strrpos($length_3, "."));
				$this->dstimg = $length_2.'/'.$length_3."_.".$this->type;
				@unlink($this->srcimg);
        }
}
?>