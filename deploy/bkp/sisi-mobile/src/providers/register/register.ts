import { HttpClient, HttpHeaders } from '@angular/common/http';
import { Injectable } from '@angular/core';

@Injectable()
export class RegisterProvider {
  url:string = "http://209.97.147.27:81/";

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
