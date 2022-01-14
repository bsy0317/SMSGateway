from ppadb.client import Client as AdbClient
import time

class MSG_Sender:
    def __init__(self):
        self.__receiverList = list()
        self.__message_body = "None"
        self.__connect = False
        self.__retCode = 0
        return None
    
    def connectADB(self,host,port):
        try:
            self.__client = AdbClient(host, port)
            if len(self.__client.devices()) < 1:
                self.__connect = False
                return 1 #ADB Device Not Connected.
            self.__device = self.__client.devices()[0]
            self.__connect = True
        except RuntimeError:
            return 2 #ADB Server Not Started.
        except Exception:
            return 3 #Unknown Error
        return 0
        
    def setMessageBody(self,body):
        self.__message_body = body
        return 0
        
    def setReceiverList(self,phone_number_array):
        self.__receiverList = phone_number_array
        return 0
        
    def addReceiverNumber(self,phone_number):
        if str(type(phone_number)) != "<class 'str'>":
            self.__retCode = self.__retCode + 1
            return 1
        else:
            self.__receiverList.append(phone_number)
        return 0
        
    def getReceiverList(self):
        return self.__receiverList
        
    def sendMessage(self):
        if self.__connect != True:
            print("ADB is not connected.\n")
            print("Please enter \"adb start-server\" or \"adb kill-server\".\n")
            self.__retCode = self.__retCode + 1
            return 1
        else:
            for listdata in self.__receiverList:
                self.__device.shell(f"service call isms 5 i32 0 s16 \"com.android.mms\" s16 \"null\" s16 \"{listdata}\" s16 \"null\" s16 \"{self.__message_body}\" s16 \"null\"")
                print("[LOG] SMS SEND = " + listdata);
                time.sleep(0.5) #딜레이 0.5초
            self.__receiverList.clear()
            print("[LOG] SMS Send is complete.");
        return 0
        
    def checkError(self):
        return self.__retCode
    def clearError(self):
        self.__retCode = 0
        return 0