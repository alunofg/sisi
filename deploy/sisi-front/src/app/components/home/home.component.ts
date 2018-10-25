import { Component, OnInit } from '@angular/core';
import {Router} from '@angular/router';
import { AuthService } from '../../services/auth/auth.service';
import { AclService } from 'ng2-acl';

@Component({
  selector: 'app-home',
  templateUrl: './home.component.html',
  styleUrls: ['./home.component.scss']
})

export class HomeComponent implements OnInit {

  lat  = -8.05225025;
  lng  = -34.9450490084884;
  locationChosen = false;

  onChoseLocation(event) {
    this.lat = event.coords.lat;
    this.lng = event.coords.lng;
    this.locationChosen = true;
  }


  constructor(
    private router: Router,
    private authService: AuthService,
    public aclService: AclService
    ) { }

  ngOnInit() {
    if (this.authService.isLoggedIn() !== true ) {
      this.router.navigate(['']);
      return;
    }
 }
  exit() {
      this.authService.logout();
  }
}
