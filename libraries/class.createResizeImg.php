<?php
class ResizeImage
{
	protected $new_width;
	protected $new_height;	
	protected $filename;
	protected $percent;
	
	function resize1($filename,$per){
		$this->filename = $filename;

		$this->percent = $per;

		list($width, $height) = getimagesize($filename);
		$this->new_width = $width * $percent;
		$this->new_height = $height * $percent;
		$image_p = imagecreatetruecolor($this->new_width, $this->new_height);
		$image = imagecreatefromjpeg($filename);
		imagecopyresampled($image_p, $image, 0, 0, 0, 0, $this->new_width, $this->new_height, $width, $height);
		imagejpeg($image_p, null, 100);
		//Khi show hình ra thì <img src="resize1.php?f=hinh.jpg&p=0.2" />
		//Trong đó f: tên hình, p: % mình muốn giảm kích thước width, height đi (0.5 là giảm 1/2 lần, 0.2 là giảm đi 1/5 lần)
	}
	
	function resize2($filename,$width,$height){
		
		$this->filename = $filename;
		header('Content-type: image/jpeg');
		list($width_orig, $height_orig) = getimagesize($this->filename);
		$ratio_orig = $width_orig/$height_orig;
		if ($width/$height > $ratio_orig) {
		   $width = $height*$ratio_orig;
		} else {
		   $height = $width/$ratio_orig;
		}

		$image_p = imagecreatetruecolor($width, $height);
		$image = imagecreatefromjpeg($filename);
		imagecopyresampled($image_p, $image, 0, 0, 0, 0, $width, $height, $width_orig, $height_orig);
		imagejpeg($image_p, null, 100);
		//Khi show hình ra thì <img src="resize2.php?f=hinh.jpg&h=100&w=100" />
	}
}
?>