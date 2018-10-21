import { NgModule } from '@angular/core';
import { Routes, RouterModule } from '@angular/router';
import { FormRegisterComponent } from './form-register/form-register.component';
import { LoginComponent } from './login/login.component';
import { HomeComponent } from './home/home.component';
import { FormOccurenceComponent } from './form-occurence/form-occurence.component';
import { ListUserComponent } from './list-user/list-user.component';
import { FormComplaintComponent } from './form-complaint/form-complaint.component';
import { ListOccurenceComponent } from './list-occurence/list-occurence.component';

const routes: Routes = [
  { path: '', component: LoginComponent },
  { path: 'register', component: FormRegisterComponent },
  { path: 'home', component: HomeComponent },
  { path: 'occurence', component: FormOccurenceComponent },
  { path: 'list-user', component: ListUserComponent },
  { path: 'form-complaint', component: FormComplaintComponent},
  { path: 'list-occurence', component: ListOccurenceComponent}
];

@NgModule({
  imports: [RouterModule.forRoot(routes)],
  exports: [RouterModule]
})
export class AppRoutingModule { }
