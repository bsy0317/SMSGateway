@echo off

echo ____________________________________________
echo Now connecting the device access
echo Please wait...
echo ____________________________________________

adb kill-server 2>NUL
adb start-server
adb devices
echo:
echo:
echo:

:9
echo ____________________________________________
echo              ::::: Menu :::::
echo              0. Device List
echo              1. Server Shutdown
echo ____________________________________________
set /p code= Please input the Number:
if %code%==0 GOTO 0
if %code%==1 GOTO 1

:0
cls
echo ____________________________________________
echo           ::::: Devices List :::::
echo ____________________________________________
adb devices
echo:
echo:
echo:
GOTO 9

:1
adb kill-server
exit