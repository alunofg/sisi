import { NgModule } from '@angular/core';
import { IonicPageModule } from 'ionic-angular';
import { OccurrenceCardPage } from './occurrenceCard';

@NgModule({
  declarations: [
    OccurrenceCardPage,
  ],
  imports: [
    IonicPageModule.forChild(OccurrenceCardPage),
  ],
})
export class OccurrenceCardPageModule {}
