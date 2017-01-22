<?php
if (session_status() == PHP_SESSION_NONE)
{
    session_start();
}
?>
<html>
	<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />	
	<style type="text/css">
	body
	{
		background:#fff;
	}
	video
	{
		width:100%;				
	}
	.image
	{
		 width:auto;
		 box-shadow:0px 0px 20px #cecece;
		 -moz-transform: scale(0.7);
		 -moz-transition-duration: 0.4s; 
		 -webkit-transition-duration: 0.4s;
		 -webkit-transform: scale(0.7);
		 
		 -ms-transform: scale(0.7);
		 -ms-transition-duration: 0.4s; 
	}
	.image:hover
	{
		  box-shadow: 20px 20px 20px #dcdcdc;
		 -moz-transform: scale(0.8);
		 -moz-transition-duration: 0.4s;
		 -webkit-transition-duration: 0.4s;
		 -webkit-transform: scale(0.8);		 
		 -ms-transform: scale(0.8);
		 -ms-transition-duration: 0.4s;
	}	
	
	
	</style>
	</head>
	<body>
		<?php
		$folder_path = 'upload/'; //image's folder path

		$num_files = glob($folder_path . "*.{JPG,jpg,gif,png,mp3,wav,ogg,bmp,mp4,avi,wmv,mpg,mov,mkv,flv}", GLOB_BRACE);

		$folder = opendir($folder_path);
		 
		if($num_files > 0)
		{
			while(false !== ($file = readdir($folder))) 
			{
				$file_path = $folder_path.$file;
				$extension = strtolower(pathinfo($file ,PATHINFO_EXTENSION));
				if($extension=='jpg' || $extension =='png' || $extension == 'gif' || $extension == 'bmp') 
				{
				?>
					<div class="image" style="position: relative; float: left; ">
					<a href="<?php echo $file_path; ?>">					
					<img src="<?php echo $file_path; ?>"  height="250" />					
					</a>
					<a href="?del=<?php echo $file_path?>">
					<img src="bclose.png" style="position: absolute; top: 4px; right: 5px">
					</a>
					</div>
				<?php
				}
				if($extension=='mp4' || $extension =='wmv' || $extension == 'avi' || $extension == 'mpg' || $extension == 'mov' || $extension == 'mkv' || $extension == 'flv') 
				{
				?>
					<!-- <a href="<?php echo $file_path; ?>"-->
					<div class ="image" style="position: relative; float: left; ">
						<video  height="250" preload controls>
							<source src = "<?php echo $file_path; ?>" type="video/mp4">
						</video>
						<a href="?del=<?php echo $file_path?>">
						<img src="bclose.png" style="position: absolute; top: 4px; right: 5px">
						</a>
					</div>
				<?php
				}
				if($extension=='mp3' || $extension =='wav' || $extension == 'ogg') 
				{
				?>
					
					<div class ="image" style="position: relative; float: left; ">
						<audio preload controls>
							<source src = "<?php echo $file_path; ?>">
						</audio>
						<a href="?del=<?php echo trim($file_path)?>">
						<img src="bclose.png" style="position: absolute;  top: -25px; right: -15px">
						</a>
					</div>
				<?php
				}
			}
		}
		else
		{
		 echo "the folder was empty !";
		}
		closedir($folder);
		?>
	</body>
</html>
<?php
if(isset($_GET['del']))
{		
	$del = $_GET['del'];
	//$replace = array("\\","/","(",")");
	//$del = str_replace($replace,"",$del);
	//$del = iconv("UTF-8","Windows-1250",$del);
	unlink($del);
	$v=$_SESSION['mode'];
		
	header('Location: dashboard.php?v='.$v);
}
?>