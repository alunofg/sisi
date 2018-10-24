import { Component } from '@angular/core';
import { HomePage }  from '../home/home';
import { FeedPage }  from '../feed/feed';
import {LoginPage} from "../login/login";
import {NavController} from "ionic-angular";

@Component({
  templateUrl: 'tabs.html'
})
export class TabsPage {

  tab1Root = HomePage;
  tab2Root = FeedPage;

  constructor(public navCtrl: NavController) {

  }

  logout() {
      this.navCtrl.setRoot(LoginPage);
  }
}
