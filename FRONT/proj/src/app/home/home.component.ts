import { Component , Inject , OnInit } from '@angular/core';

import { ProjectsProvider } from '../providers/projects/projects';
import { TeamsProvider } from '../providers/teams/teams';
import { FormControl , FormGroup , Validators } from '@angular/forms';
import { MAT_DIALOG_DATA , MatDialog , MatDialogRef } from '@angular/material';
import { AuthService } from './../auth/auth.service';
import { TokensProvider } from '../providers/tokens/tokens';


@Component( {
    selector : 'app-home' ,
    templateUrl : './home.component.html' ,
    styleUrls : [ './home.component.scss' ]
    
} )
export class HomeComponent implements OnInit {
    
    teams: any = [];
    projects: any = [];
    
    constructor (
        private projectsProvider: ProjectsProvider ,
        private teamsProvider: TeamsProvider ,
        private authService: AuthService ,
        public dialog: MatDialog
    ) {}
    
    ngOnInit () {
        this.getAllTeam();
        this.getAllProjects();
    }
    
    getAllProjects () {
        this.projectsProvider.getAll()
            .then( ( items: any ) => {
                console.log( items );
                this.projects = items;
            } ).catch( error => {
            console.log( error );
        } );
    }
    
    getAllTeam () {
        this.teamsProvider.getByUser( this.authService.getUser() )
            .then( ( items: any ) => {
                console.log( items );
                this.teams = items;
            } ).catch( error => {
            console.log( error );
        } );
    }
    
    getTeamDetail ( team: any ) {
        this.teamsProvider.getTeamUsers( team )
            .then( ( items: any ) => {
                console.log( items );
                team.users = items;
            } ).catch( error => {
            console.log( error );
        } );
        
        this.teamsProvider.getSubjectTeam( team )
            .then( ( items: any ) => {
                console.log( items );
                team.subject = items[ 0 ] || null;
            } ).catch( error => {
            console.log( error );
        } );
    }
    
    pushUser ( team: any ) {
        
        this.teamsProvider.getAvailableUsers( team )
            .then( ( items: any ) => {
                
                this.dialog.open( PushUserTeam , {
                    data : {
                        
                        teamid : team.id ,
                        
                        studentsList : items
                        
                    }
                } );
                
            } ).catch( error => {
            console.log( error );
        } );
    }
    
    sendToken ( team: any ) {
        this.teamsProvider.getCoachSubject( team.subject )
            .then( ( items: any ) => {
                console.log( items );
                
                this.dialog.open( SendTokenDialog , {
                    data : {
                        
                        team : team ,
                        
                        teamid : team.id ,
                        
                        subjectid : team.subject.id ,
                        
                        solde : team.tokens_credit ,
                        
                        coachslist : items
                        
                    }
                } );
                
                
            } ).catch( error => {
            console.log( error );
        } );
    }
    
    createProject () {
        
        this.dialog.open( NewProjectDialog , {
            data : {
                userid : this.authService.getUser().id
            }
        } );
        
    }
}

// CONSOMMER UN JETON
// -------------------------------------------------------
// -------------------------------------------------------

@Component( {
    selector : 'send-token-dialog' ,
    templateUrl : 'send-token-dialog.html' ,
    styleUrls : [ '../app.component.scss' ]
} )

export class SendTokenDialog implements OnInit {
    constructor (
        @Inject( MAT_DIALOG_DATA ) public data: any ,
        public dialog: MatDialog ,
        public self: MatDialogRef<AlertDialog> ,
        private tokensProvider: TokensProvider
    ) {
    }
    
    tokenForm: FormGroup;
    
    // ------------------------------
    
    onSubmit () {
        
        // status : 'VALID' / 'INVALID'
        if ( this.tokenForm.status == 'INVALID' ) {
            return this.dialog.open( AlertDialog , {
                data : {
                    content : "Le formulaire contient des erreurs"
                }
            } );
        }
        
        if ( this.tokenForm.value.token > this.data.tokens_credit ) {
            return this.dialog.open( AlertDialog , {
                data : {
                    content : "Le nombre de jeton est supérieur au solde disponible"
                }
            } );
        }
        
        if ( this.tokenForm.value.token <= 0 ) {
            return this.dialog.open( AlertDialog , {
                data : {
                    content : "Le nombre de jeton doit être supérieur à 0"
                }
            } );
        }
        
        this.tokensProvider.create( {
            team_id : this.tokenForm.value.teamid ,
            subject_id : this.tokenForm.value.subjectid ,
            coatch_id : this.tokenForm.value.coach ,
            howmany : this.tokenForm.value.token
        } ).then( ( items: any ) => {
            
            this.data.team.tokens_credit -= this.tokenForm.value.token;
            
            this.self.close();
            
        } ).catch( error => {
            this.dialog.open( AlertDialog , {
                data : {
                    content : error
                }
            } );
        } );
    }
    
    ngOnInit () {
        
        // données par défaut et validation du formulaire
        this.tokenForm = new FormGroup( {
            
            subjectid : new FormControl( this.data.subjectid ) ,
            
            teamid : new FormControl( this.data.team.id ) ,
            
            coach : new FormControl( null , [ Validators.required ] ) ,
            
            token : new FormControl( 1 , [ Validators.required ] )
            
        } );
        
    }
}

// CREER UN NOUVEAU PROJET
// -------------------------------------------------------
// -------------------------------------------------------

@Component( {
    selector : 'new-project-dialog' ,
    templateUrl : 'new-project-dialog.html' ,
    styleUrls : [ '../app.component.scss' ]
} )

export class NewProjectDialog implements OnInit {
    constructor (
        @Inject( MAT_DIALOG_DATA ) public data: any ,
        private projectsProvider: ProjectsProvider ,
        public dialog: MatDialog
    ) {
    }
    
    // ------------------------------
    
    projectForm: FormGroup;
    
    onSubmit () {
        
        // status : 'VALID' / 'INVALID'
        if ( this.projectForm.status == 'INVALID' ) {
            return this.dialog.open( AlertDialog , {
                data : {
                    content : "Le formulaire contient des erreurs"
                }
            } );
        }
        
        // value : { name , description }
        console.log( this.projectForm );
        
        this.projectsProvider.create( {
            created_by : this.projectForm.value.userid ,
            name : this.projectForm.value.name ,
            description : this.projectForm.value.description ,
            begin_at : this.projectForm.value.beginat ,
            end_at : this.projectForm.value.endat
        } ).then( ( items: any ) => {
            window.location.reload();
            //console.log( 'sucess' );
        } ).catch( error => {
            this.dialog.open( AlertDialog , {
                data : {
                    content : error
                }
            } );
        } );
        
    }
    
    ngOnInit () {
        
        // données par défaut et validation du formulaire
        this.projectForm = new FormGroup( {
            
            userid : new FormControl( this.data.userid , [
                Validators.required
            ] ) ,
            
            name : new FormControl( null , [
                Validators.maxLength( 45 ) ,
                Validators.required
            ] ) ,
            
            description : new FormControl() ,
            
            beginat : new FormControl( null , Validators.required ) ,
            
            endat : new FormControl( null , Validators.required )
            
        } );
        
    }
}

// CREER / EDITER UNE EQUIPE
// -------------------------------------------------------
// -------------------------------------------------------

@Component( {
    selector : 'push-user-team-dialog' ,
    templateUrl : 'push-user-team-dialog.html' ,
    styleUrls : [ '../app.component.scss' ]
} )

export class PushUserTeam implements OnInit {
    constructor (
        @Inject( MAT_DIALOG_DATA ) public data: any ,
        private teamsProvider: TeamsProvider ,
        public dialog: MatDialog
    ) {
    }
    
    teamForm: FormGroup;
    
    user: any = localStorage.getItem( 'user' );
    
    // ------------------------------
    
    onSubmit () {
        
        // status : 'VALID' / 'INVALID'
        if ( this.teamForm.status == 'INVALID' ) {
            return this.dialog.open( AlertDialog , {
                data : {
                    content : "Le formulaire contient des erreurs"
                }
            } );
        }
        
        // value : { subjectid , name , leader , memberone , membertwo , memberthree }
        console.log( this.teamForm );
        
        this.teamsProvider.pushNewMember( {
            team_id : this.teamForm.value.teamid ,
            user_id : this.teamForm.value.user
        } ).then( ( items: any ) => {
            
            window.location.reload();
            
        } ).catch( error => {
            console.log( error );
        } );
        
    }
    
    ngOnInit () {
        
        // données par défaut et validation du formulaire
        this.teamForm = new FormGroup( {
            
            teamid : new FormControl( this.data.teamid ) ,
            
            user : new FormControl( null , [ Validators.required ] )
            
        } );
        
    }
}

// AFFICHER UN MESSAGE LIBRE
// -------------------------------------------------------
// -------------------------------------------------------

@Component( {
    selector : 'alert-dialog' ,
    templateUrl : 'alert-dialog.html'
} )

export class AlertDialog implements OnInit {
    constructor (
        @Inject( MAT_DIALOG_DATA ) public data: any ,
        public dialog: MatDialogRef<AlertDialog>
    ) {
    }
    
    close () {
        this.dialog.close();
    }
    
    // ------------------------------
    
    ngOnInit () {
    
    
    }
}
