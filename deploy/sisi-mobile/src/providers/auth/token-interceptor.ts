import {Injectable} from '@angular/core';
import {HttpRequest, HttpHandler, HttpEvent, HttpInterceptor, HttpResponse, HttpErrorResponse} from '@angular/common/http';
// import {AuthService} from './auth/auth.service';
import {Observable} from 'rxjs';
import { tap, retry } from 'rxjs/operators';
import {AuthProvider} from "./auth";
import {timer} from "rxjs/observable/timer";
// import {HandlerErrorHelpers} from '../helpers/handler-error/handler-error.helper';

@Injectable()
export class TokenInterceptor implements HttpInterceptor {
    // protected handlerErrorHelper;

    constructor(
        public auth: AuthProvider,
        // private handler: HandlerErrorHelpers
    ) {
        // this.handlerErrorHelper = handler;

    }

    intercept(request: HttpRequest<any>, next: HttpHandler): Observable<HttpEvent<any>> {
        let token = '';

        this.auth.getToken().then( ($token) => {
            token = $token;
        });


        // token.subscribe( () => {
        //
        // });


        request = request.clone({
            setHeaders: {
                Authorization: `Bearer ${token}`
            }
        });


        console.log(request.headers);


        return next.handle(request).pipe(tap((event: HttpEvent<any>) => {
                console.log('foi4');

                if (event instanceof HttpResponse) {
                    // if (event.body.error) { this.handlerErrorHelper.handle(event); }

                }

            },
            (error: any) => {
                if (error instanceof HttpErrorResponse) {
                    // this.handlerErrorHelper.handle(error);

                }
            })
        );


        // return new Observable( (observer) => {


        // this.auth.getToken().then((token) => {
        //

        //convert the Promise to an Observable
        // let storageObservable = Observable.fromPromise(this.auth.getToken());

        // storageObservable.flatMap( (token: any) => {


        // return token;
        // }, err => {
        //     // throw some error
        // })




        // });



        // });

    }
}