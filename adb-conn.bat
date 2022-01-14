@echo off

echo ____________________________________________
echo Now connecting the device access
echo Please wait...
echo ____________________________________________

adb kill-server 2>NUL
adb start-server
adb devices

echo ____________________________________________
echo 0. Server Shutdown
echo ____________________________________________
set /p code= Please input the Number:
if %code%==0 GOTO 0

:0
adb kill-server
exit