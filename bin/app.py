import threading
import dns.resolver
import os
import socket
import json
from sender import MSG_Sender
from flask import Flask, request, Response
from flask_restx import Api, Resource
from dotenv import load_dotenv

WEB_SERVER_ADDR="https://sms.krr.kr"

app = Flask(__name__)
api = Api(app, version='1.0', title='문자전송 API', description='안드로이드 휴대폰과 연결하여 문자를 전송하는 API 입니다.',errors={
    'Exception': {
        'status': 500,
        'message': 'bad_request',
        'description': 'Something wrong with request'
    }
})
ns  = api.namespace('send', description='문자 발송, 수신, 삭제')
dotenv_path = os.path.join(os.path.dirname(__file__), '.flaskenv')
load_dotenv(dotenv_path)

@ns.route('')
@ns.response(400, '잘못된 입력값을 전송한경우')
@ns.response(412, 'ADB에 오류가 발생한경우')
@ns.response(500, '알수없는 오류가 발생한경우')
@ns.param('phone', 'SMS 수신 대상자 목록',"array")
@ns.param('body', 'SMS 내용')

@api.route('/send')
class smsapi(Resource):
    @ns.doc("post")
    def post(self):
        '''문자를 발송합니다.'''
        self.__msg_sender = MSG_Sender()
        if not request.is_json:
            return InputError("TypeError / It must be sent in json format.").response()
        phone = request.json.get('phone')
        body = request.json.get('body')
        if (str(type(phone))+str(type(body))).find("NoneType") != -1:
            return InputError("DataError / Data is empty.").response()
        
        self.__msg_sender.setReceiverList(phone)
        self.__msg_sender.setMessageBody(body)
        conn_code = self.__msg_sender.connectADB("127.0.0.1",5037)
        if conn_code > 0:
            if conn_code == 1:
                return ADBError("ADBError / ADB device is not connected.").response()
            elif conn_code == 2:
                return ADBError("ADBError / Unable to connect with ADB server.").response()
            elif conn_code == 3:
                return ADBError("ADBError / Unknown error occurred during ADB connection.").response()
        t1 = threading.Thread(target=self.__msg_sender.sendMessage)
        t1.start()
        
        ret_json = {
            'status' : 202,
            'phone': phone,
            'body': body
        }
        resp = Response(json.dumps(ret_json))
        resp.headers['Access-Control-Allow-Origin'] = WEB_SERVER_ADDR
        resp.headers['Access-Control-Expose-Headers'] = 'Authorization'
        resp.headers['Access-Control-Allow-Credentials'] = 'true'
        return resp
    def options(self):
        resp = Response("Preflight")
        resp.headers['Access-Control-Allow-Origin'] = WEB_SERVER_ADDR
        resp.headers['Access-Control-Expose-Headers'] = 'Authorization'
        resp.headers['Access-Control-Allow-Methods'] = 'GET,POST,OPTIONS'
        resp.headers['Access-Control-Allow-Headers'] = 'content-type'
        return resp
    def get(self):
        resp = Response("Preflight")
        resp.headers['Access-Control-Allow-Origin'] = WEB_SERVER_ADDR
        resp.headers['Access-Control-Expose-Headers'] = 'Authorization'
        return resp
        
class MyErrors(Exception):
    status_code: int
    def __init__(self, message):
        super(MyErrors, self).__init__(message)
        self.message = message
    def response(self):
        txt = {"message": self.message, "status": self.status_code}
        resp = Response(json.dumps(txt))
        resp.headers['Access-Control-Allow-Origin'] = WEB_SERVER_ADDR
        resp.headers['Access-Control-Expose-Headers'] = 'Authorization'
        resp.headers['Access-Control-Allow-Methods'] = 'GET,POST,OPTIONS'
        resp.headers['Access-Control-Allow-Headers'] = 'content-type'
        return resp
    
class InputError(MyErrors):
    status_code = 400

class ADBError(MyErrors):
    status_code = 412

class SomeOtherError(MyErrors):
    status_code = 520
    
@app.errorhandler(MyErrors)
def handle_errors(e):
    return e.response()
    
if __name__ == "app" or __name__ == "__main__":
    sock = socket.socket(socket.AF_INET, socket.SOCK_STREAM)
    sock.connect(("google.kr", 443))
    print("===========================================================================================");
    print("    >> 서버IP = "+sock.getsockname()[0])
    print("    >> Note: 오류가 발생한다면 127.0.0.1로 입력하시길 바랍니다.")
    print("===========================================================================================");
    resolver = dns.resolver.Resolver(configure=False)
    resolver.nameservers = ["1.1.1.1","1.0.0.1"]
    result = resolver.resolve('check.krr.kr', 'TXT')
    check = True if str(result[0]).find("true") != -1 else False
    if not check:
        exit(-1)