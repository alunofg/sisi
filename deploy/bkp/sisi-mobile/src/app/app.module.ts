
import { NgModule, ErrorHandler } from '@angular/core';
import { BrowserModule }          from '@angular/platform-browser';
import { HttpClientModule }  from '@angular/common/http';
import { IonicStorageModule }     from '@ionic/storage';
import { MyApp }                  from './app.component';
import { IonicApp, IonicModule, IonicErrorHandler } from 'ionic-angular';

import { StatusBar }          from '@ionic-native/status-bar';
import { SplashScreen }       from '@ionic-native/splash-screen';

import { Geolocation } from '@ionic-native/geolocation';

import { AboutPage }          from '../pages/about/about';
import { ContactPage }        from '../pages/contact/contact';
import { HomePage }           from '../pages/home/home';
import { TabsPage }           from '../pages/tabs/tabs';

import { LoginPage }          from '../pages/login/login';
import { RegisterPage }       from '../pages/register/register';
import { OccurrenceCardPage } from '../pages/occurrenceCard/occurrenceCard';
import { OccurrencePage }     from '../pages/occurrence/occurrence';

import { RegisterProvider }   from '../providers/register/register';
import { AuthProvider }       from '../providers/auth/auth';
import { UserProvider }       from '../providers/user/user';
// import { TokenInterceptor }   from "../providers/auth/token-interceptor";
import { OccurrenceProvider } from '../providers/occurrence/occurrence';
import { HttpService } from "../http-service/http.service";


@NgModule({
  declarations: [
    MyApp,
    AboutPage,
    ContactPage,
    HomePage,
    TabsPage,
    LoginPage,
    RegisterPage,
    OccurrenceCardPage,
    OccurrencePage
  ],
  imports: [
    BrowserModule,
    IonicModule.forRoot(MyApp),
    HttpClientModule,
    IonicStorageModule.forRoot()
  ],
  bootstrap: [IonicApp],
  entryComponents: [
    MyApp,
    AboutPage,
    ContactPage,
    HomePage,
    TabsPage,
    LoginPage,
    RegisterPage,
    OccurrenceCardPage,
    OccurrencePage
  ],
  providers: [
    { provide: ErrorHandler, useClass: IonicErrorHandler },
    HttpService,
    StatusBar,
    SplashScreen,
    Geolocation,
    RegisterProvider,
    AuthProvider,
    UserProvider,
    OccurrenceProvider
  ]
})
export class AppModule { }
