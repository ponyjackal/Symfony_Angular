import { Injectable, NgZone } from '@angular/core';
import { Router } from '@angular/router';
import { BehaviorSubject } from 'rxjs/BehaviorSubject';
import { User } from './user';

import * as hello from 'hellojs/dist/hello.all.js';

import { Configs } from '../shared/configs';
import { HttpClient } from '@angular/common/http';

import * as MicrosoftGraph from "@microsoft/microsoft-graph-types"
import * as MicrosoftGraphClient from "@microsoft/microsoft-graph-client"
import { Observable } from 'rxjs/Observable';
import 'rxjs/add/operator/catch';
import 'rxjs/add/operator/map';
import 'rxjs/add/observable/fromPromise';


@Injectable()
export class AuthService {
    private loggedIn = new BehaviorSubject<boolean>(this.tokenAvailable());

    get isLoggedIn() {
        return this.loggedIn.asObservable(); // {2}
    }

    initAuth() {
        hello.init({
                msft: {
                    id: Configs.appId,
                    oauth: {
                        version: 2,
                        auth: 'https://login.microsoftonline.com/common/oauth2/v2.0/authorize'
                    },
                    scope_delim: ' ',
                    form: false
                },
            },
            { redirect_uri: window.location.href }
        );
    }

    private tokenAvailable(): boolean {
        return !!localStorage.getItem('hello');
    }

    getUser() {
        return JSON.parse(localStorage.getItem('user'));
    }

    constructor(
        private router: Router,
        private zone: NgZone,
        public http: HttpClient

    ) {}

    getAccessToken() {
        const msft = hello('msft').getAuthResponse();
        const accessToken = msft.access_token;
        return accessToken;
    }

    getClient(): MicrosoftGraphClient.Client
    {
        const client = MicrosoftGraphClient.Client.init({
            authProvider: (done) => {
                done(null, this.getAccessToken()); //first parameter takes an error if you can't get an access token
            }
        });
        return client;
    }

    getMe(): Observable<MicrosoftGraph.User>
    {
        const client = this.getClient();
        return Observable.fromPromise(client
            .api('me')
            .select('displayName, mail, userPrincipalName, userType, responsibilities, jobTitle, state, department, userPrincipalName, givenName, surname')
            .get()
            .then ((res => {
                console.log(res);
                return res;
            } ) )
        );
    }

    login() {
        /*  if (user.userName !== '' && user.password != '' ) { // {3}
            this.loggedIn.next(true);
            this.router.navigate(['/']);
            localStorage.setItem('token', user.userName);
          }*/
        hello('msft').login({ scope: Configs.scope }).then(
            (r) => {
                this.zone.run(() => {

                    this.getMe().subscribe(me => {
                        /*return this.http.get(Configs.urlApi + "projects/all")
                          .toPromise()
                          .then((r:any) => {
                            console.log(r)
                        })
                        .catch((e:any) => {
                          console.log(e)
                        })*/
                        return this.http.post(Configs.urlApi  + 'user/connect', {firstname: me.givenName, lastname: me.surname, email: me.mail})
                            .toPromise()
                            .then((response:any) => {
                                console.log(response);
                                this.router.navigate(['/']);
                                this.router.navigateByUrl('/');
                                window.location.href = '/';
                                localStorage.setItem("user", JSON.stringify(response));
                            })
                            .catch((reason) => {
                                return Promise.reject({message: 'Problème de connectivité !'})
                            });
                    });


                });
            },
            e => console.error(e.error.message)
        );
    }

    logout() {                            // {4}
        this.loggedIn.next(false);
        this.router.navigate(['/login']);
        hello('msft').logout().then(
            () => window.location.href = '/login',
            e => console.error(e.error.message)
        );
        localStorage.clear();
    }
}
