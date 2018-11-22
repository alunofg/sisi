import { Component, ViewChild, ElementRef }                                                         from '@angular/core';
import { IonicPage, NavController, NavParams, LoadingController, AlertController, ToastController } from 'ionic-angular';
import { Geolocation }                                                                              from '@ionic-native/geolocation';
import { OccurrenceCardPage }                                                                       from '../occurrenceCard/occurrenceCard';
import { TabsPage }                                                                                 from '../tabs/tabs';
import { OccurrenceProvider }                                                                       from '../../providers/occurrence/occurrence';
import { FormBuilder, Validators }                                                                  from "@angular/forms";

declare let google: any;

@IonicPage()
@Component({
  selector: 'page-occurrence',
  templateUrl: 'occurrence.html',
})
export class OccurrencePage {

  @ViewChild('map') map: ElementRef;

  private marker: any;
  private lat: number;
  private lng: number;
  public occurrence_id: number;
  public occurrenceForm: any;

  constructor(
    public loadingCtrl: LoadingController,
    private toastCtrl: ToastController,
    public alertCtrl: AlertController,
    public navCtrl: NavController,
    public navParams: NavParams,
    public geolocation: Geolocation,
    public occurrenceProvider: OccurrenceProvider,
    private formBuilder: FormBuilder,

  ) {

    this.occurrence_id = navParams.get('occurrence_id');
    this.occurrenceForm = this.formBuilder.group({
      title: ['', Validators.compose([Validators.required, Validators.maxLength(250)])],
      story: [null, Validators.required],
      occurrence_date: ['', Validators.compose([Validators.required, Validators.email])],
      occurrence_time: ['', Validators.required],
    })
  }

  getPosition() {
    let result = '';
    if (this.marker) {
      const coordinate = this.marker.getPosition();
      const lat = coordinate.lat();
      const lng = coordinate.lng();

      this.lat = lat;
      this.lng = lng;
      result = `lat: ${lat.toFixed(5)}, lng: ${lng.toFixed(5)}`;
    }
    return result;
  }

  registerOccurrence() {
    let loading = this.loadingCtrl.create({
      content: 'Aguarde, por favor...'
    });

    const toast = this.toastCtrl.create({
      message: 'Não foi possível registrar a ocorrência, verifique os dados informados!',
      position: 'top',
      duration: 5000
    });

    const success = this.toastCtrl.create({
      message: 'Ocorrência cadastrada com sucesso!',
      position: 'top',
      duration: 5000
    });


    let occurrence = {
      title: this.occurrenceForm.controls.title.value,
      story: this.occurrenceForm.controls.story.value,
      occurrence_date: this.occurrenceForm.controls.occurrence_date.value,
      occurrence_time: this.occurrenceForm.controls.occurrence_time.value,
      coordinates: `${this.lat}, ${this.lng}`,
      police_report: false,
      occurrence_type_id: this.occurrence_id,
      zone_id: 1,
    };

    loading.present();

    this.occurrenceProvider.registerOccurrence(occurrence).subscribe(res => {
      loading.dismissAll();
      success.present();
      this.navCtrl.setRoot(TabsPage);
    }, error => {
      console.log("Erro" + error.message);
      loading.dismissAll();
      toast.present();
    });
  }

  goToFeed() {
    this.navCtrl.setRoot(OccurrenceCardPage);
  }

  ionViewDidLoad() {
    console.log('ionViewDidLoad OcorrenciaPage');
    this.geolocation.getCurrentPosition().then(pos => {
      const position = new google.maps.LatLng(pos.coords.latitude, pos.coords.longitude);

      const options = {
        center: position,
        zoom: 18,
        myTipyId: 'roadmap'
      };
      this.lat = pos.coords.latitude
      this.lng = pos.coords.longitude
      const map = new google.maps.Map(this.map.nativeElement, options);
      this.marker = new google.maps.Marker({
        animation: google.maps.Animation.DROP,
        draggable: true,
        position: position,
        map: map,
        title: 'Você está aqui!'
      });


    }).catch(err => console.log(err));

  }

}
