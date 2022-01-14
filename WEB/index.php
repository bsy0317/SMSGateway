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
	<script src="https://code.jquery.com/jquery-2.2.4.min.js" integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44=" crossorigin="anonymous"></script>
	<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
	<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
	<!--Import Google Icon Font-->
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<!--Import materialize.css-->
	<link type="text/css" rel="stylesheet" href="css/materialize.min.css" media="screen,projection" />
	<script type="text/javascript" src="js/materialize.js"></script>
	<!--Let browser know website is optimized for mobile-->
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<script src="https://materializecss.com/js/cash.js"></script>
	<script src="https://materializecss.com/js/characterCounter.js"></script>
	<style>
	@font-face {
		font-family: 'IM_Hyemin-Bold';
		src: url('https://cdn.jsdelivr.net/gh/projectnoonnu/noonfonts_2106@1.1/IM_Hyemin-Bold.woff2') format('woff');
		font-weight: normal;
		font-style: normal;
	}
	
	@font-face {
		font-family: '777Balsamtint';
		src: url('https://cdn.jsdelivr.net/gh/projectnoonnu/noonfonts_nine_@1.1/777Balsamtint.woff') format('woff');
		font-weight: normal;
		font-style: normal;
	}
	
	* {
		font-family: 'IM_Hyemin-Bold';
	}
	
	.small-font {
		font-family: '777Balsamtint';
		font-weight: normal;
	}
	</style>
	<script>
	$(document).ready(function() {
		$('input#input_text, textarea#textarea2').characterCounter();
	});
	</script>
</head>

<body>
	<nav>
		<div class="nav-wrapper teal lighten-2"> <a href="#" class="brand-logo center">e-SMS Panel</a> </div>
	</nav>
	<br>
	<div class="row">
		<div class="col-xs-6 col-sm-offset-3">
			<form enctype="multipart/form-data" name="myForm" action="sender.php" method="post" onsubmit="return validateUser()">
				<div class="form-group">
					<label class="small-font" style="font-size:1.4em;">아이디</label>
					<input type="text" class="validate" name="username" placeholder="관리자 ID"> </div>
				<div class="form-group">
					<label class="small-font" style="font-size:1.4em;">비밀번호</label>
					<input id="last_name" type="password" class="validate" name="password" placeholder="관리자 PW"> </div>
				<div class="form-group">
					<label class="small-font" style="font-size:1.4em;">번호데이터가 포함된 txt 파일 (각 줄에 전화번호만 있어야함): <a href="example.txt" style="font-size:0.7em;">예시파일 다운로드</a> </label>
					<input size="50" type="file" name="filename"> </div>
				<div class="form-group">
					<label class="small-font" style="font-size:1.4em;">메세지 발송 내용</label>
					<div class="row">
						<div class="input-field col s12">
							<textarea id="textarea2" class="materialize-textarea" data-length="2000" name="data" placeholder="메세지 내용"></textarea>
						</div>
					</div>
				</div>
				<button type="submit" name="submit" class="btn waves-effect waves-light btn-block"><i class="material-icons right">send</i>전송</button>
			</form>
			<br>
			<div class="row">
				<div class="card blue-grey darken-1 text-center">
					<div class="card-content white-text"> <span class="card-title">경고</span>
						<p>하루 최대 발송량 200건을 넘기지 않도록 주의하시기 바랍니다.
							<br> 통신사에 따라 발송한도가 다르니 사전에 확인이 필요합니다.</p>
					</div>
					<div class="card-action">
						<a href="https://m.blog.naver.com/bch4518/221461761792">간단히 알아보기</a>
						<a href="http://www.tworld.co.kr/poc/html/util/member_policy/UT2.1.2.1T.1T.html">SKT(제 61조)</a>
						<a href="https://www.uplus.co.kr/css/rfrm/prvs/RetrieveUbDnTermsIndi.hpi#">LGU(LTE,5G 이용약관 제 60조)</a>
						<a href="https://rdi.kt.com/corp/reportsfile/v1.0/download?fileNo=11003&bbsId=BS00000005&bno=10192">KT(제 52조)</a>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>

</html>