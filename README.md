<p align="center"><img src="https://capsule-render.vercel.app/api?type=transparent&color=black&height=300&section=header&text=SMS%20Gateway&fontSize=90" /></p>

# 📟 SMSGateway API
[![Hits](https://hits.seeyoufarm.com/api/count/incr/badge.svg?url=https%3A%2F%2Fgithub.com%2Fbsy0317%2FSMSGateway%2F&count_bg=%2379C83D&title_bg=%23555555&icon=&icon_color=%23E7E7E7&title=hits&edge_flat=false)](https://hits.seeyoufarm.com)
![Flask](https://img.shields.io/badge/flask-%23000.svg?style=for-the-badge&logo=flask&logoColor=white) ![Python](https://img.shields.io/badge/python-3670A0?style=for-the-badge&logo=python&logoColor=ffdd54) ![Android](https://img.shields.io/badge/Android-3DDC84?style=for-the-badge&logo=android&logoColor=white) ![Windows](https://img.shields.io/badge/Windows-0078D6?style=for-the-badge&logo=windows&logoColor=white) ![Linux](https://img.shields.io/badge/Linux-FCC624?style=for-the-badge&logo=linux&logoColor=black)  
안드로이드 휴대폰에서 SMS를 전송할 수 있는 API 입니다.   
ADB를 통해 접속하는 방법이기 때문에 사전에 ``제조사 USB 드라이버``가 필요합니다.
| 제조사 | 다운로드 링크 |
| ------ | ------ |
| 삼성 통합 USB 드라이버 | [다운로드](https://downloadcenter.samsung.com/content/SW/202012/20201229125900126/SAMSUNG_USB_Driver_for_Mobile_Phones.exe) |
| LG USB 드라이버 | [다운로드](https://www.lge.co.kr/lgekor/download-center/downloadCenterList.do#cur) |
| Google USB 드라이버 | [다운로드](https://developer.android.com/studio/run/win-usb?hl=ko) |


## ℹ️ 정보
배서연 – [talk@kakao.one](mailto:talk@kakao.one)  
GPL 3.0 라이센스를 준수하며 [``LICENSE``](https://opensource.org/licenses/gpl-3.0.html)에서 자세한 정보를 확인할 수 있습니다.  

## 📥 다운로드
<p align="left">
  <a href="https://github.com/bsy0317/SMSGateway/archive/refs/heads/main.zip">
    <img src="https://custom-icon-badges.herokuapp.com/badge/-Download-blue?style=for-the-badge&logo=download&logoColor=white"/>
  </a>
</p>
  
## 😙 쉬운 실행방법(추천)
1. 파일 내 `run_server.bat`를 실행한다.  
2. 서버가 정상적으로 실행되면, 화면에 서버IP가 표시됩니다.
2. [e-SMS Panel](https://sms.krr.kr)로 접속하여 표시된 서버IP를 입력하고 문자를 보냅니다.  
  
## 🤔 어려운 실행방법
![2](https://user-images.githubusercontent.com/6503979/149714141-4d1d5811-cd15-4e5c-a297-06a52a0776ad.PNG)
 ```sh 
 1. 'pip install -r requirements.txt' 를 입력하여 필요한 패키지 설치 
 2. 'adb start-server' 를 입력하여 adb 서버를 실행
    >> 이미 서버가 실행중이라면 'adb kill-server' 를 입력
 3. 'flask run' 을 입력하여 API 서버를 실행
 4. 'https://sms.krr.kr' 로 접속하여 문자전송
``` 
  
## ✍️ Custom 설정(필수아님)
.flaskenv 파일 내 변수를 수정하여 서버설정이 가능합니다. 
1. (`FLASK_DEBUG=True`) 디버깅 설정(True,False)
2. (`FLASK_ENV=development`) 개발서버or배포서버 설정(development,production)
3. (`FLASK_RUN_HOST=127.0.0.1`) 서버 IP설정(0.0.0.0 설정시 모든 호스트에서 접속가능) 
4. (`FLASK_RUN_PORT=8088`) 서버 PORT 설정  
5. (`FLASK_RUN_RELOAD=True`) 오류 발생시 자동 새로고침(True,False)  
  
## 🌏 WEB GUI(필수아님)
> 직접 WEB 전송 플랫폼을 이용해야 하는 경우에 사용가능합니다.  
> WEB 폴더에 있는 PHP 파일을 웹서버에 업로드 합니다.  

![WEB](https://user-images.githubusercontent.com/6503979/149710870-7ee06528-5098-4f67-9dd5-0f5fd6720856.PNG)
  
## ❤️ 기여 방법
1. (<https://github.com/bsy0317/SMSGateway/fork>)을 포크합니다.
2. (`git checkout -b feature/fooBar`) 명령어로 새 브랜치를 만드세요.
3. (`git commit -am 'Add some fooBar'`) 명령어로 커밋하세요.
4. (`git push origin feature/fooBar`) 명령어로 브랜치에 푸시하세요. 
5. 풀리퀘스트를 보내주세요.
