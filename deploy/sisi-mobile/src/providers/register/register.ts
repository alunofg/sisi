import { HttpClient, HttpHeaders } from '@angular/common/http';
import { Injectable } from '@angular/core';

@Injectable()
export class RegisterProvider {
  url:string = 'http://104.131.99.239:5050/';

  constructor(public http: HttpClient) {

  }

  registerUser(user) {
    let headers = new HttpHeaders()
    headers.set("Accept", 'application/json')
    headers.set('Content-Type', 'application/json')
    // const requestOptions = new HttpParams()

    this.http.post(this.url + 'api/mobile/users', user, { "headers": headers })
      .subscribe(data => {
        console.log(data);
      }, error => {
        console.log(error);
      })
  }
}
