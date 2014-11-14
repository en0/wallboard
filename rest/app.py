from flask import Flask
from flask.ext import restful

### Great Example: https://github.com/miguelgrinberg/REST-tutorial/blob/master/rest-server-v2.py

app = Flask(__name__)
api = restful.Api(app)


class Authorities(restful.Resource):
    def post(self):
        ## You should create the sessionID (token) and create a token checksum bassed on
        ## the hash from the password and token and a secret salt for token validation.
        ## That checksum should be sent to the user and verified on each transaction.
        return {
            'ident' : { 'displayName' : 'Ian Laird', 'roles' : [ 'admin', 'user' ] },
            'token' : 1234,
            'checksum' : 4321,
            'isAuthenticated' : True
        }


class Authority(restful.Resource):
    def get(self, ticket, checksum):
        if ticket != "1234": restful.abort(404);
        if checksum != "4321": restful.abort(404);

        return {
            'ident' : { 'displayName' : 'Ian Laird', 'roles' : [ 'admin', 'user' ] },
            'token' : 1234,
            'checksum' : 4321,
            'isAuthenticated' : True
        }


api.add_resource(Authorities, "/rest/authority")
api.add_resource(Authority, "/rest/authority/<ticket>/<checksum>")


print('hello, world')

