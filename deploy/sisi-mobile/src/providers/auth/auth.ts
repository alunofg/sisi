import {Injectable} from '@angular/core';
import {Storage} from '@ionic/storage';
import {HttpService} from "../../http-service/http.service";

@Injectable()
export class AuthProvider {
    url: string = "http://104.131.99.239:5050/";
    headers: any;

    constructor(
        public http: HttpService,
        private storage: Storage
    ) {
        // this.headers = {"headers": {"authorization": "Bearer "}};
    }

    setToken(token) {
        this.storage.set("token", token.access_token);
        localStorage.setItem('token', token.access_token);
    }

    getToken() {
        return this.storage.get("token");
    }

    login(username, password) {
        return this.http.post(this.url + 'oauth/token', {
            username: username,
            password: password,
            grant_type: 'password',
            client_id: 2,
            client_secret: 'g422Ugg1VaW9UcXaqrUKe6hJNb7tETtViB9AtY4X'
        });
    }

    userAuthenticated() {
        return this.http.get(this.url + 'api/user/authenticated');
    }
}
