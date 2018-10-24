import {Injectable} from '@angular/core';
import {HttpService} from "../../http-service/http.service";


@Injectable()
export class OccurrenceProvider {
    url: string = 'http://104.131.99.239:5050/';

    constructor(public http: HttpService) {

    }

    registerOccurrence(occurrence) {
        return this.http.post(this.url + 'api/occurrence-reports', occurrence);
    }
}
