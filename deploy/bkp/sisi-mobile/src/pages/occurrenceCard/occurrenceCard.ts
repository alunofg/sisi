import { Component }                           from '@angular/core';
import { IonicPage, NavController, NavParams } from 'ionic-angular';
import { OccurrencePage }                      from '../occurrence/occurrence';

@IonicPage()
@Component({
  selector: 'page-occurrenceCard',
  templateUrl: 'occurrenceCard.html',
})
export class OccurrenceCardPage {

  constructor(public navCtrl: NavController, public navParams: NavParams) {
  }

  ionViewDidLoad() {
    console.log('ionViewDidLoad OccurrenceCardPage');
  }

  goToOcorrencia(id) {

    if(id) {
      this.navCtrl.push(OccurrencePage, {
        occurrence_id: id
      });
    }
  }
}
