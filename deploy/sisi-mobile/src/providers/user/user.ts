import { HttpClient } from '@angular/common/http';
import { Injectable } from '@angular/core';

import { IUser } from '../../interfaces/IUser';


@Injectable()
export class UserProvider {

  url:string= 'http://104.131.99.239:5050/';
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

