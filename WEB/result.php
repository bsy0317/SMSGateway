<html xmlns="https://www.w3.org/1999/xhtml">
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
	
	<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
	<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
	<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/materialize/0.97.6/css/materialize.min.css">
	<script src="//cdnjs.cloudflare.com/ajax/libs/materialize/0.97.6/js/materialize.min.js"></script>
	<script type="text/javascript" src="//code.jquery.com/jquery-3.5.1.min.js"></script>
	<link href="//fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
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
			src: url('//cdn.jsdelivr.net/gh/projectnoonnu/noonfonts_2106@1.1/IM_Hyemin-Bold.woff2') format('woff');
			font-weight: normal;
			font-style: normal;
		}
		*{
			font-family: 'IM_Hyemin-Bold';
		}
    </style>
</head>
<body>


<?php
	$output = json_decode($_POST["DATA"]);
	if ($output != null){ #서버가 응답코드를 반환한 경우
		if($output->{'status'} == 0){ #ajax에서 오류코드를 반환한 경우
			echo '
				<div class="center text-center">
					<h4> 오류가 발생했습니다. </h4>
					<p>서버로부터 응답코드를 수신하지 못했습니다.<br>API 서버가 Online 상태인지 확인이 필요합니다.</p>
					<a href="index.php" class="waves-effect waves-orange waves-ripple btn-large red">메인페이지</a>
				</div>';
			return -1;
		}
        else if ($output->{'status'} != 202){ #서버의 응답코드가 정상이 아닌경우
            echo '
            <div class="center text-center">
                <h4> 오류가 발생했습니다. </h4>
                <p>' . $output->{'message'} . '</p>
                <a href="index.php" class="waves-effect waves-orange waves-ripple btn-large red">메인페이지</a>
            </div>';
            return -1;
        }
    }
    else{  #서버가 응답코드를 안내놓은 경우
        echo '
            <div class="center text-center">
                <h4> 오류가 발생했습니다. </h4>
                <p>서버로부터 응답코드를 수신하지 못했습니다.<br>API 서버가 Online 상태인지 확인이 필요합니다.</p>
                <a href="index.php" class="waves-effect waves-orange waves-ripple btn-large red">메인페이지</a>
            </div>';
        return -1;
    }
	
	#서버 정상응답
    echo '
        <div class="center text-center">
            <h4>'.$count.'건 발송요청 성공.</h4>
            <p>전체 발송완료시까지 시간이 소요됩니다.</p>
            <a href="index.php" class="waves-effect waves-light btn-large">메인페이지</a>
        </div>';
?>


</body>
</html>