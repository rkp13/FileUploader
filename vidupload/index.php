<?php
	if(session_id() == '') 
	{
		session_start();
	}
	else
	{
		session_destroy();
		session_start();
	}
	$_SESSION['mode']=null;
?>
<html>
	<head>
	<title>File Sharing</title>
	<style>
		body{
			background-color: #eeeeee;
		}
		.button {
			display: inline-block;
			border-radius: 100%;
			background-color: #f4511e;
			  border: none;
			  color: #FFFFFF;
			  text-align: center;
			  font-size: 28px;
			  padding: 20px;
			  width: 250px;
			  height: 250px;
			  transition: all 0.5s;
			  cursor: pointer;
			  margin:10px;	
			  margin-top:12.5%;
			  margin-left:25%;
			}

		.button span {
		  cursor: pointer;
		  display: inline-block;
		  position: relative;
		  transition: 0.5s;
		}

		.button span:after {
		  content: '»';
		  position: absolute;
		  opacity: 0;
		  top: 0;
		  right: -20px;
		  transition: 0.5s;
		}

		.button:hover span {
		  padding-right: 25px;
		  
		}
		.button:hover{
			box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.6), 0 6px 20px 0 rgba(0, 0, 0, 0.57);
		}

		.button:hover span:after {
		  opacity: 1;
		  right: 0;
		}
</style>
	</style>
	</head>
	<body>
	
		<a href="dashboard.php?v=1">
			<button class="button" style="margin-right:50px"><span>Upload </span></button>
		</a>
		<a href="dashboard.php?v=0">
			<button class="button" style="margin-left:30px"><span>Watch/Recieve </span></button>
		</a>	
	
	</body>
</html>
<?php

?>