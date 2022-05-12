@echo off
chcp 65001

echo =========================================================
echo 실행환경을 점검 합니다.
echo 잠시만 기다려주세요...
echo =========================================================
timeout /t 1
rem setx Path "%CD%\adb"
set "Path=%Path%;%CD%\adb;"
py --version 2>NUL
if errorlevel 1 goto errorNoPython
CLS
goto OK

:errorNoPython
CLS
echo.
echo Python 설치를 시작합니다.
echo.
echo.
echo Downloading Python 3.10.4...
IF EXIST "%CD%\python-3.10.4.exe" (
  echo Found Installer at "%CD%\python-3.10.4.exe"
) ELSE (
  powershell -Command "& {[Net.ServicePointManager]::SecurityProtocol = [Net.SecurityProtocolType]::Tls12, [Net.SecurityProtocolType]::Tls11, [Net.SecurityProtocolType]::Ssl3, [Net.SecurityProtocolType]::Tls; Invoke-WebRequest -Uri 'https://www.python.org/ftp/python/3.10.4/python-3.10.4.exe' -OutFile '%CD%\python-3.10.4.exe';}"
  echo Python 다운로드 완료.
)
echo Python 설치중...
powershell %CD%\python-3.10.4.exe /quiet InstallAllUsers=0 PrependPath=1 Include_test=0 TargetDir=c:\Python\Python3104
setx path "%PATH%;C:\Python\Python3104\"
set "path=%PATH%;C:\Python\Python3104\"
timeout /t 30 /nobreak > nul
echo Python 설치 성공.

:OK
CLS
echo =========================================================
echo 의존성 패키지를 점검 합니다.
echo 잠시만 기다려주세요...
echo =========================================================
python -m pip install -r requirements.txt > NUL 2>&1

:Retry
CLS
color F0
@echo =======================================================================
@echo              자세한 방법 : https://iteastory.com/189
@echo =======================================================================
@echo [1]. 휴대폰 내 설정→개발자옵션→USB디버깅 옵션을 활성화 해 주세요.
@echo [2]. 아무키나 누르면 다음 단계로 진행됩니다. 
@echo [Info]. 개발자옵션이 안보인다면, 상단 링크를 참조 해 주세요.
@echo =======================================================================
timeout /t 360

CLS
color E0
echo.
echo.
echo.
@echo                       #### 휴대폰에 접속중 입니다. ####
@echo ================================================================================
@echo [1]. 휴대폰 화면에 USB 디버깅 허용이 뜬다면 "항상 허용"을 눌러주세요.      
@echo [2]. 연결이 확인되면 다음 단계로 진행됩니다.                                     
@echo ================================================================================
@echo [Info]. 항상허용을 체크하지 않으면 권한 오류가 발생할 수 있습니다.
echo.
echo.
echo.

adb kill-server > NUL 2>&1
start /B /WAIT cmd.exe /c "del %UserProfile%\.android\adbkey"
start /B /WAIT cmd.exe /c "del %UserProfile%\.android\adbkey.pub"

adb start-server > NUL 2>&1
adb devices | findstr "unauthorized" > NUL
if errorlevel 1 (SET A="0") else (goto unauth)
adb get-state > NUL 2>&1 && goto Conn || echo [!] 휴대폰을 찾을 수 없습니다.
color C7
echo [!] 잠시후 재시도합니다.
timeout /t 20
goto Retry

:unauth
color C7
echo ===================[ERROR] 권한상승에 실패하였습니다.====================
echo [@] 다음 안내에 따라 휴대폰에서 진행 해 주세요.
echo [1]. 설정→개발자옵션→USB디버깅 권한 승인 취소를 클릭 해 주세요.
echo [2]. 설정→개발자옵션→USB디버깅 옵션을 껐다 켜주세요.
echo [3]. 재연결이 진행되는동안 화면이 꺼지지 않도록 유지 해 주세요.
echo =========================================================================
echo.
echo.
echo [Info] 잠시후 재시도합니다.
timeout /t 60
goto Retry

:Conn
CLS
color A0
@echo =========================================================
@echo SMS API Server를 자동으로 시작합니다.                                          
@echo 휴대폰과의 연결을 분리하지 마세요.                                         
@echo Ctrl+C를 눌러 종료 가능합니다.
@echo =========================================================
echo ____________________________________________
echo Now Starting Server
echo Please wait...
echo ____________________________________________
timeout /t 5 /nobreak > NUL
start https://sms.krr.kr
flask run
