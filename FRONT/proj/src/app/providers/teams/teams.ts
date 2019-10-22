import { HttpClient } from '@angular/common/http';
import { Injectable } from '@angular/core';
import { Configs } from '../../shared/configs';

/*
  Generated class for the ProjectsProvider provider.

  See https://angular.io/guide/dependency-injection for more info on providers
  and Angular DI.
*/
@Injectable()
export class TeamsProvider {
    
    
    private items: Array<any> = [];
    
    constructor (
        public http: HttpClient
    ) {
    }
    
    getAll ( params: any = null ): Promise<any> {
        return this.http.get( Configs.urlApi + 'teams/all' )
            .toPromise()
            .then( ( response: any ) => {
                return response;
            } )
            .catch( reason => {
                console.error( 'error ' + reason.message );
            } );
        // return Promise.resolve(this.items);
    }
    
    getByUser ( params: any = null ): Promise<any> {
        return this.http.get( Configs.urlApi + 'user/team/' + params.id )
            .toPromise()
            .then( ( response: any ) => {
                return response;
            } )
            .catch( reason => {
                return [ { name : "aucune équipe" } ];
            } );
        // return Promise.resolve(this.items);
    }
    
    getTeamUsers ( params: any = null ): Promise<any> {
        return this.http.get( Configs.urlApi + 'team/users/' + params.id )
            .toPromise()
            .then( ( response: any ) => {
                return response;
            } )
            .catch( reason => {
                console.error( 'error ' + reason.message );
            } );
        // return Promise.resolve(this.items);
    }
    
    getSubjectTeam ( params: any = null ): Promise<any> {
        return this.http.get( Configs.urlApi + 'subject/team/' + params.id )
            .toPromise()
            .then( ( response: any ) => {
                return response;
            } )
            .catch( reason => {
                console.error( 'error ' + reason.message );
            } );
        // return Promise.resolve(this.items);
    }
    
    getAvailableUsers ( params: any = null ): Promise<any> {
        return this.http.get( Configs.urlApi + 'user/not/team/' + params.id )
            .toPromise()
            .then( ( response: any ) => {
                return response;
            } )
            .catch( reason => {
                console.error( 'error ' + reason.message );
            } );
        // return Promise.resolve(this.items);
    }
    
    getCoachSubject ( params: any = null ): Promise<any> {
        return this.http.get( Configs.urlApi + 'subject/coatchs/' + params.id )
            .toPromise()
            .then( ( response: any ) => {
                return response;
            } )
            .catch( reason => {
                console.error( 'error ' + reason.message );
            } );
        // return Promise.resolve(this.items);
    }
    
    create ( params: any = null ): Promise<any> {
        return this.http.post( Configs.urlApi + 'team/add' , params )
            .toPromise()
            .then( ( response: any ) => {
                return response.result;
            } )
            .catch( reason => {
                console.error( 'error ' + reason.message );
            } );
    }
    
    pushNewMember ( params: any = null ): Promise<any> {
        return this.http.put( Configs.urlApi + 'add/to/team' , params )
            .toPromise()
            .then( ( response: any ) => {
                return response.result;
            } )
            .catch( reason => {
                console.error( 'error ' + reason.message );
            } );
    }
    
    get ( params: any = null ): Promise<any> {
        return this.http.get( Configs.urlApi + 'team/' + params.id )
            .toPromise()
            .then( ( response: any ) => {
                return response.result;
            } )
            .catch( reason => {
                console.error( 'error ' + reason.message );
            } );
    }
    
}
