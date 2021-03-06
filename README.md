<p align="center"><img src="https://capsule-render.vercel.app/api?type=transparent&color=black&height=300&section=header&text=SMS%20Gateway&fontSize=90" /></p>

# π SMSGateway API
[![Hits](https://hits.seeyoufarm.com/api/count/incr/badge.svg?url=https%3A%2F%2Fgithub.com%2Fbsy0317%2FSMSGateway%2F&count_bg=%2379C83D&title_bg=%23555555&icon=&icon_color=%23E7E7E7&title=hits&edge_flat=false)](https://hits.seeyoufarm.com)
![Flask](https://img.shields.io/badge/flask-%23000.svg?style=for-the-badge&logo=flask&logoColor=white) ![Python](https://img.shields.io/badge/python-3670A0?style=for-the-badge&logo=python&logoColor=ffdd54) ![Android](https://img.shields.io/badge/Android-3DDC84?style=for-the-badge&logo=android&logoColor=white) ![Windows](https://img.shields.io/badge/Windows-0078D6?style=for-the-badge&logo=windows&logoColor=white) ![Linux](https://img.shields.io/badge/Linux-FCC624?style=for-the-badge&logo=linux&logoColor=black)  
μλλ‘μ΄λ ν΄λν°μμ SMSλ₯Ό μ μ‘ν  μ μλ API μλλ€.   
ADBλ₯Ό ν΅ν΄ μ μνλ λ°©λ²μ΄κΈ° λλ¬Έμ μ¬μ μ ``μ μ‘°μ¬ USB λλΌμ΄λ²``κ° νμν©λλ€.
| μ μ‘°μ¬ | λ€μ΄λ‘λ λ§ν¬ |
| ------ | ------ |
| μΌμ± ν΅ν© USB λλΌμ΄λ² | [λ€μ΄λ‘λ](https://downloadcenter.samsung.com/content/SW/202012/20201229125900126/SAMSUNG_USB_Driver_for_Mobile_Phones.exe) |
| LG USB λλΌμ΄λ² | [λ€μ΄λ‘λ](https://www.lge.co.kr/lgekor/download-center/downloadCenterList.do#cur) |
| Google USB λλΌμ΄λ² | [λ€μ΄λ‘λ](https://developer.android.com/studio/run/win-usb?hl=ko) |


## βΉοΈ μ λ³΄
λ°°μμ° β [talk@kakao.one](mailto:talk@kakao.one)  
GPL 3.0 λΌμ΄μΌμ€λ₯Ό μ€μνλ©° [``LICENSE``](https://opensource.org/licenses/gpl-3.0.html)μμ μμΈν μ λ³΄λ₯Ό νμΈν  μ μμ΅λλ€.  

## π₯ λ€μ΄λ‘λ
<p align="left">
  <a href="https://github.com/bsy0317/SMSGateway/archive/refs/heads/main.zip">
    <img src="https://custom-icon-badges.herokuapp.com/badge/-Download-blue?style=for-the-badge&logo=download&logoColor=white"/>
  </a>
</p>
  
## π μ¬μ΄ μ€νλ°©λ²(μΆμ²)
1. νμΌ λ΄ `run_server.bat`λ₯Ό μ€ννλ€.  
2. μλ²κ° μ μμ μΌλ‘ μ€νλλ©΄, νλ©΄μ μλ²IPκ° νμλ©λλ€.
2. [e-SMS Panel](https://sms.krr.kr)λ‘ μ μνμ¬ νμλ μλ²IPλ₯Ό μλ ₯νκ³  λ¬Έμλ₯Ό λ³΄λλλ€.  
  
## π€ μ΄λ €μ΄ μ€νλ°©λ²
![2](https://user-images.githubusercontent.com/6503979/149714141-4d1d5811-cd15-4e5c-a297-06a52a0776ad.PNG)
 ```sh 
 1. 'pip install -r requirements.txt' λ₯Ό μλ ₯νμ¬ νμν ν¨ν€μ§ μ€μΉ 
 2. 'adb start-server' λ₯Ό μλ ₯νμ¬ adb μλ²λ₯Ό μ€ν
    >> μ΄λ―Έ μλ²κ° μ€νμ€μ΄λΌλ©΄ 'adb kill-server' λ₯Ό μλ ₯
 3. 'flask run' μ μλ ₯νμ¬ API μλ²λ₯Ό μ€ν
 4. 'https://sms.krr.kr' λ‘ μ μνμ¬ λ¬Έμμ μ‘
``` 
  
## βοΈ Custom μ€μ (νμμλ)
.flaskenv νμΌ λ΄ λ³μλ₯Ό μμ νμ¬ μλ²μ€μ μ΄ κ°λ₯ν©λλ€. 
1. (`FLASK_DEBUG=True`) λλ²κΉ μ€μ (True,False)
2. (`FLASK_ENV=development`) κ°λ°μλ²orλ°°ν¬μλ² μ€μ (development,production)
3. (`FLASK_RUN_HOST=127.0.0.1`) μλ² IPμ€μ (0.0.0.0 μ€μ μ λͺ¨λ  νΈμ€νΈμμ μ μκ°λ₯) 
4. (`FLASK_RUN_PORT=8088`) μλ² PORT μ€μ   
5. (`FLASK_RUN_RELOAD=True`) μ€λ₯ λ°μμ μλ μλ‘κ³ μΉ¨(True,False)  
  
## π WEB GUI(νμμλ)
> μ§μ  WEB μ μ‘ νλ«νΌμ μ΄μ©ν΄μΌ νλ κ²½μ°μ μ¬μ©κ°λ₯ν©λλ€.  
> WEB ν΄λμ μλ PHP νμΌμ μΉμλ²μ μλ‘λ ν©λλ€.  

![WEB](https://user-images.githubusercontent.com/6503979/149710870-7ee06528-5098-4f67-9dd5-0f5fd6720856.PNG)
  
## β€οΈ κΈ°μ¬ λ°©λ²
1. (<https://github.com/bsy0317/SMSGateway/fork>)μ ν¬ν¬ν©λλ€.
2. (`git checkout -b feature/fooBar`) λͺλ Ήμ΄λ‘ μ λΈλμΉλ₯Ό λ§λμΈμ.
3. (`git commit -am 'Add some fooBar'`) λͺλ Ήμ΄λ‘ μ»€λ°νμΈμ.
4. (`git push origin feature/fooBar`) λͺλ Ήμ΄λ‘ λΈλμΉμ νΈμνμΈμ. 
5. νλ¦¬νμ€νΈλ₯Ό λ³΄λ΄μ£ΌμΈμ.
