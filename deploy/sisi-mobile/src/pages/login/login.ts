import { TabsPage } from './../tabs/tabs';
import { Component } from '@angular/core';
import { FormBuilder, Validators } from '@angular/forms';
import { AlertController, App, LoadingController, IonicPage, NavController, NavParams } from 'ionic-angular';
import { ToastController } from 'ionic-angular';
import { RegisterPage } from '../register/register';
import { AuthProvider } from '../../providers/auth/auth';
import { UserProvider } from '../../providers/user/user';
import { IUser } from '../../interfaces/IUser'

@IonicPage()
@Component({
  selector: 'page-login',
  templateUrl: 'login.html',
})
export class LoginPage {

  user:IUser = {email:'', password:''};

  public userForm: any
  public loginForm: any;
  public backgroundImage = '../assets/img/background/globalbackground.jpg';
  tabsPage = TabsPage;

  constructor(
    public loadingCtrl: LoadingController,
    private toastCtrl: ToastController,
    public alertCtrl: AlertController,
    public navCtrl: NavController,
    public navParams: NavParams,
    public app: App,
    private formBuilder: FormBuilder,

    public authProvider: AuthProvider,
    public userProvider: UserProvider
  ){
    this.userForm = this.formBuilder.group({
      email: ['', Validators.compose([Validators.required, Validators.email])],
      password: ['', Validators.required],
    });
  }

  login() {

    let loading = this.loadingCtrl.create({
      content: 'Aguarde, por favor...'
    });

    const toast = this.toastCtrl.create({
      message: 'Não foi possível realizar o login, verifique os dados informados!',
      position: 'bottom',
      duration: 5000
    });

    let email    = this.userForm.controls.email.value;
    let password = this.userForm.controls.password.value;

    loading.present();

    this.authProvider.login(email, password).subscribe(
      res => {
        loading.dismissAll();
        this.authProvider.setToken(res);
        this.navCtrl.setRoot(TabsPage);
      }, error => {
        console.log("Erro" + error.message);
        loading.dismissAll();
        toast.present();
      });
  }

  goToRegisterPage() {
    this.navCtrl.push(RegisterPage);
  }
}
