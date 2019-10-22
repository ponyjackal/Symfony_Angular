import { Observable } from 'rxjs/Observable';
import { AuthService } from './../auth/auth.service';
import { Component, OnInit } from '@angular/core';

@Component({
  selector: 'app-header',
  templateUrl: './header.component.html',
  styles: [
      `.angular-logo {
      margin: 0 4px 3px 0;
      height: 35px;
      vertical-align: middle;
    }
    .fill-remaining-space {
      flex: 1 1 auto;
    }
    `
  ]
})
export class HeaderComponent implements OnInit {


  email: string = "";
  role: number = 0;
  isLoggedIn$: Observable<boolean>;                  // {1}

  constructor(private authService: AuthService) { }

  ngOnInit() {
    this.email = this.authService.getUser().email;
    this.role = this.authService.getUser().role;
    console.log(this.email);
    this.isLoggedIn$ = this.authService.isLoggedIn; // {2}
  }


  onLogout(){
    this.authService.logout();                      // {3}
  }
}
