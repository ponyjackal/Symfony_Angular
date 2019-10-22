import { HttpClient } from '@angular/common/http';
import { Injectable } from '@angular/core';
import { Configs } from '../../shared/configs';

/*
  Generated class for the ProjectsProvider provider.

  See https://angular.io/guide/dependency-injection for more info on providers
  and Angular DI.
*/
@Injectable()
export class ProjectsProvider {
    
    
    private items: Array<any> = [];
    
    constructor (
        public http: HttpClient
    ) {
    }
    
    getAll ( params: any = null ): Promise<any> {
        return this.http.get( Configs.urlApi + 'projects/all' )
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
        return this.http.put( Configs.urlApi + 'project/add' , params )
            .toPromise()
            .then( ( response: any ) => {
                return response.result;
            } )
            .catch( reason => {
                console.error( 'error ' + reason.message );
            } );
    }
    
    get ( params: any = null ): Promise<any> {
        return this.http.get( Configs.urlApi + 'project/' + params.id  )
            .toPromise()
            .then( ( response: any ) => {
                return response;
            } )
            .catch( reason => {
                console.error( 'error ' + reason.message );
                return reason.message;
            } );
    }
    
    me ( params: any = null ): Promise<any> {
        return this.http.get( Configs.urlApi + 'user/project/' + params.id  )
            .toPromise()
            .then( ( response: any ) => {
                return response.result;
            } )
            .catch( reason => {
                console.error( 'error ' + reason.message );
            } );
    }
    
    
}
