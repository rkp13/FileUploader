<?php
	if(session_id() == '') 
	{
		session_start();
	}
	if(isset($_GET['v']))
	{
		$v=$_GET['v'];
		$_SESSION['mode']=$v;			
	}			
	if (!is_dir('upload/'))
	{
		mkdir('upload/');
	}
 ?>
<html>	
	<head>
		<link rel="stylesheet" type="text/css" href="css/dropzone.css" />
		<title>File Sharing</title>		
		<script type="text/javascript" src="dropzone.js"></script>
		<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>				
	</head>
	<body>
		<?php
		if($_SESSION['mode'])
		{
		?>
			<div>
			<form action="upload.php" class="dropzone" id="my-awesome-dropzone"></form>		
			</div>		
		<?php
		}		
		include('show.php');		
		?>
	</body>
</html>