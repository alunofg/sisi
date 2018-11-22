import {Injectable} from '@angular/core';
import {Storage} from '@ionic/storage';
import {HttpService} from "../../http-service/http.service";

@Injectable()
export class AuthProvider {
    url: string = "http://209.97.147.27:81/";
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
            client_secret: 'j2N63IeAWEQme4FHcx7z9eQVX5ljVTBO27mp5nbe'
        });
    }

    userAuthenticated() {
        return this.http.get(this.url + 'api/user/authenticated');
    }
}
