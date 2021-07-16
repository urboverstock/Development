<!DOCTYPE html>
<html lang="en">

<head>
	<link href="https://cdnjs.cloudflare.com/ajax/libs/jquery-ui-bootstrap/0.5pre/assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
	<style>
		.box {
			border-width: 0px 5px 5px 5px;
			border-style: solid;
			border-color:#3D585F;
		}
		
		.btn_color{
			color: black;
			text-shadow: 0 -1px 0 rgba(0, 0, 0, 0.25);
			background-color: #FDDC74;
			background-image: -moz-linear-gradient(top, #0088cc, #0044cc);
			background-image: -webkit-gradient(linear, 0 0, 0 100%, from(#0088cc), to(#0044cc));
			background-image: -webkit-linear-gradient(top, #0088cc, #0044cc);
			background-image: -o-linear-gradient(top, #0088cc, #0044cc);
			background-image: linear-gradient(to bottom, #FDDC74, #FDDC74);
			background-repeat: repeat-x;
			filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#ff0088cc', endColorstr='#ff0044cc', GradientType=0);
			border-color: #0044cc #0044cc #002a80;
			border-color: rgba(0, 0, 0, 0.1) rgba(0, 0, 0, 0.1) rgba(0, 0, 0, 0.25);
			*background-color: #0044cc;
			filter: progid:DXImageTransform.Microsoft.gradient(enabled = false);
			padding: 4px 12px;
			margin-bottom: 0;
			font-size: 14px;
			line-height: 20px;
			text-align: center;
			vertical-align: middle;
			cursor: pointer;
			min-width:350px;
			height:50px;
			margin-top :20px;
		}
	</style>
</head>

<body style="background:#e9eeef;">
	<div id="beforeChange">
		<center>
			<div class="main_box" style="background:#fff; box-shadow:0px 0px 20px rgba(109, 109, 109, 0.15); max-width:570px; width:100%; border-radius:6px; margin-top:80px;">
				<div style="background: #fff; padding:30px 0; border-radius: 6px 6px 0 0px;">
					<img src="{{ asset('assets/images/logo.png') }}">
				</div>
				<hr style="color:#e9eeef; border:1px solid #e9eeef; margin:0px" />
				<div style="padding:15px 0 0 0">
					<h2 style="font-size:30px; color:#343c49; font-weight:600; margin-bottom:0px;">Password Reset Successfully</h2>
					<p style="font-size:18px; color: #343c49; line-height:28px;">Your password has been reset successfully. Your new password is {{ $new_password }}</p>
					<hr style="color:#e9eeef; border:1px solid #e9eeef; margin:0px" />	<span style="color: #343c49; padding:20px 15px 30px; display:inline-block;"> &copy; Copyright {{ date('Y') }}, All Rights Reserved. </span>
				</div>
		</center>
	</div>
</body>

</html>