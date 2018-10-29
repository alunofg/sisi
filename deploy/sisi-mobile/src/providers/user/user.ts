import { HttpClient } from '@angular/common/http';
import { Injectable } from '@angular/core';

import { IUser } from '../../interfaces/IUser';


@Injectable()
export class UserProvider {

  url:string= "http://209.97.147.27:81/";
  headers:any;

  constructor(public http: HttpClient) {
    console.log('Hello UserProvider Provider');

    }


  addUser(data:IUser) {
    return this.http.post<IUser>(this.url + 'api/mobile/users', data)
  }

  getUser(){

  }

  }

