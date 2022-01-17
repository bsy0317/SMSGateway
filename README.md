# SMSGateway API
안드로이드 휴대폰에서 SMS를 전송할 수 있는 API 입니다.   
ADB를 통해 접속하는 방법이기 때문에 사전에 ADB 환경변수 설정과 USB 드라이버 설치가 필요합니다.  

## 정보
배서연 – talk@kakao.one  
GPL 3.0 라이센스를 준수하며 ``LICENSE``에서 자세한 정보를 확인할 수 있습니다.  
[https://opensource.org/licenses/gpl-3.0.html]

## 실행방법
1. `pip install -r requirements.txt 를 입력하여 필요한 패키지 설치`  
2. `adb-conn.bat 을 실행하여 adb server를 실행`  
3. `flask run 을 입력하여 API 서버 실행`  

## Custom 설정
.flaskenv 파일 내 변수를 수정하여 서버설정이 가능합니다. 
1. (`FLASK_DEBUG=True`) 디버깅 설정(True,False)
2. (`FLASK_ENV=development`) 개발서버or배포서버 설정(development,production)
3. (`FLASK_RUN_HOST=127.0.0.1`) 서버 IP설정(0.0.0.0 설정시 모든 호스트에서 접속가능) 
4. (`FLASK_RUN_PORT=8088`) 서버 PORT 설정  
5. (`FLASK_RUN_RELOAD=True`) 오류 발생시 자동 새로고침(True,False)  

## WEB GUI
![WEB](https://user-images.githubusercontent.com/6503979/149710870-7ee06528-5098-4f67-9dd5-0f5fd6720856.PNG)
웹에서 단체문자를 발송할 수 있는 플랫폼 입니다.
1. WEB 폴더에 있는 PHP 파일을 웹서버에 업로드 합니다.
2. WEB 폴더 내 ``DB.sql``을 실 서버에 import 합니다.
3. ``setting.php`` 내 각 설정을 환경에 맞게 설정합니다.

## 기여 방법
1. (<https://github.com/bsy0317/SMSGateway/fork>)을 포크합니다.
2. (`git checkout -b feature/fooBar`) 명령어로 새 브랜치를 만드세요.
3. (`git commit -am 'Add some fooBar'`) 명령어로 커밋하세요.
4. (`git push origin feature/fooBar`) 명령어로 브랜치에 푸시하세요. 
5. 풀리퀘스트를 보내주세요.
