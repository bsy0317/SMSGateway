<script type="text/javascript" src="//code.jquery.com/jquery-3.5.1.min.js"></script>
<?php
	$API_PORT = "8088";
    $server_ip = $_POST["server-ip"];
	$data = $_POST["data"];
	
    $numbers = array();
    $count = 0;
    if (is_uploaded_file($_FILES['filename']['tmp_name']))
    {
        $handle = fopen($_FILES['filename']['tmp_name'], "r");
        while (($datacsv = fgetcsv($handle, 1000, ",")) !== false)
        {
            array_push($numbers, $datacsv[0]);
            $count++;
        }
        fclose($handle);
    }
    $message = $data;

    $json = json_encode(array(
        'phone' => $numbers,
        'body' => $message
    ));

    /*$ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, "http://".$server_ip.":".$API_PORT."/send");
    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
        'Accept: application/json',
        'Content-Type: application/json'
    ));
    curl_setopt($ch, CURLOPT_VERBOSE, false);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $json);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($ch, CURLOPT_TIMEOUT, 5); 
    $output = json_decode(curl_exec($ch));
    curl_close($ch);*/
	echo '<script>';
	echo '$(document).ready(function(){';
	echo "$.ajax({
		type: 'post',
		url : 'http://$server_ip:$API_PORT/send',
		data: '$json',
		async: false,
		timeout: 5000,
		contentType: 'application/json;',
		dataType: 'json', 
		crossDomain: true,
		success: function(result){
			restxt=JSON.stringify(result);
			var form = document.createElement('form');
			form.setAttribute('method', 'post'); //POST 메서드 적용
			form.setAttribute('action', 'result.php');	// 데이터를 전송할 url
			document.charset = 'utf-8';
			var hiddenField = document.createElement('input');
			hiddenField.setAttribute('type', 'hidden'); //값 입력
			hiddenField.setAttribute('name', 'DATA');
			hiddenField.setAttribute('value', restxt);
			form.appendChild(hiddenField);
			document.body.appendChild(form);
			form.submit();	// 전송~
		},
		error:function(result){
			restxt=JSON.stringify(result);
			var form = document.createElement('form');
			form.setAttribute('method', 'post'); //POST 메서드 적용
			form.setAttribute('action', 'result.php');	// 데이터를 전송할 url
			document.charset = 'utf-8';
			var hiddenField = document.createElement('input');
			hiddenField.setAttribute('type', 'hidden'); //값 입력
			hiddenField.setAttribute('name', 'DATA');
			hiddenField.setAttribute('value', restxt);
			form.appendChild(hiddenField);
			document.body.appendChild(form);
			form.submit();	// 전송~
		}
	})
	";
	
	echo '});</script>';
?>
