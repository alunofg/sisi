import {Injectable} from '@angular/core';
import {HttpService} from "../../http-service/http.service";


@Injectable()
export class OccurrenceProvider {
    url: string = "http://209.97.147.27:81/";

    constructor(public http: HttpService) {

    }

    registerOccurrence(occurrence) {
        return this.http.post(this.url + 'api/occurrence-reports', occurrence);
    }
}
