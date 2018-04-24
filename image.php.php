<?php
if(isset($_POST["submit"]))
{
	if(!empty($_FILES["fileToUpload"])&&!empty($_POST["text"]))
	{
		switch(strtolower(pathinfo($_FILES["fileToUpload"]["name"], PATHINFO_EXTENSION)))//to get extension of the file
				{
						
						case "jpg":
							header("Content-type:image/jpeg");
							$image=imagecreatefromjpeg($_FILES["fileToUpload"]["tmp_name"]);
							break;
						case "jpeg":
							header("Content-type:image/jpeg");
							$image=imagecreatefromjpeg($_FILES["fileToUpload"]["tmp_name"]);
							break;
						
						default:
							trigger_error("Invalid Image file format"); 
							exit();
							break;
				}
		
		$fontpath="font.TTF";//font type path 
		if(!empty($_POST['x']))
		{
			$x=$_POST['x'];
		}else
		{
			$x=10;
		}
		if(!empty($_POST['y']))
		{
			$y=$_POST['y'];
		}else
		{
			$y=100;
		}
		if(!empty($_POST['fontsize']))
		{
			$fontsize=$_POST['fontsize'];
		}else
		{
			$fontsize=15;
		}
		if(!empty($_POST['angle']))
		{
			$angle=$_POST['angle'];
		}else
		{
			$angle=0;
		}
		if(!empty($_POST['text']))
		{
			$text=$_POST['text'];
		}else
		{
			$text="Default Text";
		}
		if(!empty($_POST['color']))
		{
			$color=$_POST['color'];
			switch($color)
			{
					case "Green":
						$color=imagecolorallocate($image,0,255,0);
						break;
					case "Blue":
						$color=imagecolorallocate($image,0,0,255);
						break;
					default:
						$color=imagecolorallocate($image,255,0,0);
						break;
			}
		}
		else
		{
			$color=imagecolorallocate($image,255,0,0);
		}
		
		
		imagettftext($image,$fontsize,$angle,$x,$y,$color,$fontpath,$_POST["text"]);
		
		switch(strtolower(pathinfo($_FILES["fileToUpload"]["name"], PATHINFO_EXTENSION))) 
				{
						
						case "jpg":
							imagejpeg($image);
							break;
						case "jpeg":
							imagejpeg($image);
							break;
						default:
							trigger_error("Invalid Image file format");
							exit();
							break;
				}
		imagedestroy($image);
	}else
	{
			echo "fill the fiels";
	}
}
?>
