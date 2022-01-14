<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="title" content="SMS 통합전송 관리">
	
	<meta name="author" content="BaeSeoyeon">
	<meta name="publisher" content="bsy0317@kakao.one">
	<meta name="copyright" content="bsy0317@kakao.one">
	<link rel="shortcut icon" href="assets/img/favicon.png">
	
	<title>SMSGateway 전송 관리 플랫폼</title>
	
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.6/css/materialize.min.css">
	<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.6/js/materialize.min.js"></script>
	<link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <style>		
		.center {
		  position: absolute;
		  top: 35%;
		  left:50%;
		  transform: translateY(-35%);
		  transform: translateX(-50%);
		}
    	@font-face {
			font-family: 'IM_Hyemin-Bold';
			src: url('https://cdn.jsdelivr.net/gh/projectnoonnu/noonfonts_2106@1.1/IM_Hyemin-Bold.woff2') format('woff');
			font-weight: normal;
			font-style: normal;
		}
		*{
			font-family: 'IM_Hyemin-Bold';
		}
    </style>
</head>
<?php
	include "setting.php";
	include "connection.php";
	include "func.php";

	$sql = "SELECT ID, PASS FROM data";
	$result = mysqli_query($link, $sql);

	$row = mysqli_fetch_assoc($result);
	$user = $row['ID'];
	$pass = $row['PASS'];

	$username = $_POST["username"];
	$password = $_POST["password"];
	$data = $_POST["data"];

	if ($user === $username && $pass === md5($password))
	{
		$numbers = null;
		$numbers = array();
		$count = 0;
		if (is_uploaded_file($_FILES['filename']['tmp_name']))
		{
			//Import uploaded file to Database
			$handle = fopen($_FILES['filename']['tmp_name'], "r");
			while (($datacsv = fgetcsv($handle, 1000, ",")) !== false)
			{
				array_push($numbers, $datacsv[0]);
				$count++;
			}
			fclose($handle);
		}
		mysqli_close($link);
		$message = $data;

		$json = json_encode(array(
			'phone' => $numbers,
			'body' => $message
		));

		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $API_URL);
		curl_setopt($ch, CURLOPT_HTTPHEADER, array(
			'Accept: application/json',
			'Content-Type: application/json'
		));
		curl_setopt($ch, CURLOPT_VERBOSE, false);
		curl_setopt($ch, CURLOPT_POST, true);
		curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $json);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		$output = json_decode(curl_exec($ch));
		curl_close($ch);

		if ($output != null)
		{ #서버가 응답코드를 반환한 정상응답
			if ($output->{'status'} != 202)
			{ #서버의 응답코드가 정상이 아닌경우
				echo '
				<div class="center text-center">
					<h4> 오류가 발생했습니다. </h4>
					<p>' . $output->{'message'} . '</p>
					<a href="index.php" class="waves-effect waves-orange waves-ripple btn-large red">메인페이지</a>
				</div>';
				return -1;
			}
		}
		else
		{
			echo '
				<div class="center text-center">
					<h4> 오류가 발생했습니다. </h4>
					<p>서버로부터 응답코드를 수신하지 못했습니다.</p>
					<a href="index.php" class="waves-effect waves-orange waves-ripple btn-large red">메인페이지</a>
				</div>';
			return -1;
		}

		echo '
			<div class="center text-center">
				<h4>'.$count.'건 발송요청 성공.</h4>
				<p>전체 발송완료시까지 시간이 소요됩니다.</p>
				<a href="index.php" class="waves-effect waves-light btn-large">메인페이지</a>
			</div>';
	}
	else{
		echo '
		<div class="center text-center">
			<h4> 오류가 발생했습니다. </h4>
			<p>관리자 로그인 실패</p>
			<a href="index.php" class="waves-effect waves-orange waves-ripple btn-large red">메인페이지</a>
		</div>';
	}
?>


<body>

</body>
</html>
