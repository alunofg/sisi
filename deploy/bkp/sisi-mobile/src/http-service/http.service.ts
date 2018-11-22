
import { HttpClient } from '@angular/common/http';
import { Storage } from '@ionic/storage';
import * as _ from 'lodash';
import {Observable} from "rxjs/Observable";
import {Injectable} from "@angular/core";

@Injectable()
export class HttpService {

    private token: string;

    constructor(
        private http: HttpClient,
        private storage: Storage
    ) {
        this.getToken();

    }


    private getToken() {
        this.storage.get("token").then((token) => this.token = token);
    }


    private setHeader() {
        this.getToken();

        return {
            'headers': {
              'authorization': `Bearer ${this.token}`
            }
        }
    }

    
    private createOptionsUrl(options: object) {
        let url = '?';

        _.forEach(options, (value, key) => {
            url += `${key === 'pageSize' ? 'limit' : key}=${value}&`;
        });

        return url;
    }


    /**
     * 
     * @param url 
     * @param options 
     */
    public get(url: string, options: object = null): Observable<any> {

        const optionsUrl = this.createOptionsUrl(options);

        return this.http.get(`${url}${optionsUrl}`, this.setHeader());

    }


    
    /**
     * 
     * @param url 
     * @param data 
     */
    public post(url: string, data: object): Observable<any> {

        return this.http.post(`${url}`, data, this.setHeader());

    }


    /**
     * 
     * @param url 
     * @param data 
     */
    public put(url: string, data: object): Observable<any> {

        return this.http.put(`${url}`, data, this.setHeader());

    }


    /**
     * 
     * @param url 
     * @param id 
     */
    public delete(url: string, id: any): Observable<any> {

        return this.http.delete(`${url}${id}`, this.setHeader());

    }

}