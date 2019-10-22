import { Component, OnInit } from '@angular/core';
import { FormGroup, FormBuilder, Validators } from '@angular/forms';
import { AuthService } from './../auth/auth.service';
import { HttpClient } from '@angular/common/http';

@Component({
  selector: 'app-login',
  templateUrl: './login.component.html',
  styleUrls: ['./login.component.scss']
})
export class LoginComponent implements OnInit {
  form: FormGroup;                    // {1}
  private formSubmitAttempt: boolean; // {2}

  constructor(
    private fb: FormBuilder,         // {3}
    private authService: AuthService, // {4}
    public http: HttpClient
  ) {}

  ngOnInit() {
    this.authService.initAuth();
    this.form = this.fb.group({});
  }

  isFieldInvalid(field: string) { // {6}
    return (
      (!this.form.get(field).valid && this.form.get(field).touched) ||
      (this.form.get(field).untouched && this.formSubmitAttempt)
    );
  }

  onSubmit() {
  /*  if (this.form.valid) {
      this.authService.login(this.form.value); // {7}
    }*/
    this.authService.login(); // {7}

    this.formSubmitAttempt = true;             // {8}
  }
}
