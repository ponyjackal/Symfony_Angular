import { HttpClient } from '@angular/common/http';
import { Injectable } from '@angular/core';
import { Configs } from '../../shared/configs';

/*
  Generated class for the ProjectsProvider provider.

  See https://angular.io/guide/dependency-injection for more info on providers
  and Angular DI.
*/
@Injectable()
export class TokensProvider {
    
    
    private items: Array<any> = [];
    
    constructor (
        public http: HttpClient
    ) {
    }
    
    create ( params: any = null ): Promise<any> {
        return this.http.put( Configs.urlApi + 'tokens/transaction' , params )
            .toPromise()
            .then( ( response: any ) => {
                return response.result;
            } )
            .catch( reason => {
                console.error( 'error ' + reason.message );
            } );
    }
    
}
