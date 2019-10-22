import { Component , OnInit , Inject } from '@angular/core';
import { MatDialog , MAT_DIALOG_DATA , MatDialogRef } from '@angular/material';

import { FormControl , FormGroup , Validators } from '@angular/forms';

import { Student } from './student';
import { Students } from './mock-students';

import { HttpClient , HttpHeaders } from '@angular/common/http';

@Component( {
    selector : 'app-students' ,
    templateUrl : './student.component.html' ,
    styleUrls : [ './student.component.scss' ]
} )

export class StudentComponent implements OnInit {
    constructor (
        public dialog: MatDialog ,
        private http: HttpClient
    ) {
    }
    
    // ------------------------------
    
    myfriends = Students;
    
    selectedStudent: Student;
    
    onSelect ( student: Student ): void {
        this.selectedStudent = student;
    }
    
    // ------------------------------
    
    roles = [
        {
            value : 0 ,
            viewValue : 'étudiant'
        } ,
        {
            value : 1 ,
            viewValue : 'intervenant'
        } ,
        {
            value : 2 ,
            viewValue : 'responsable pédaguogique'
        }
    ];
    
    // ------------------------------
    
    /*openNewSubjectDialog () {
        this.dialog.open( NewSubjectDialog );
    }
    
    openEditTeamDialog () {
        this.dialog.open( NewTeamDialog , {
            data : {
                update : true ,
                
                studentsList : this.myfriends ,
                
                subjectid : 1 ,
                
                name : "chorizo" ,
                
                leader : 1 ,
                
                memberone : 2 ,
                
                membertwo : 3
            }
        } );
    }
    
    openNewTeamDialog () {
        this.dialog.open( NewTeamDialog , {
            data : {
                create : true ,
                
                studentsList : this.myfriends ,
                
                projectid : 1
            }
        } );
    }*/
    
    // ------------------------------
    
    ngOnInit () {
        
        /*this.http
            .get( 'http://127.0.0.1:8000/api/team/all' , {
                headers : new HttpHeaders( {
                    'Access-Control-Allow-Origin' : '*' ,
                    'Content-Type' : 'application/json' ,
                    'withCredentials' : 'true'
                } )
            } )
            .subscribe(
                // success
                resp => {
                    console.log( resp );
                } ,
                
                // error
                err => {
                    console.error( err );
                }
            );*/
        
    }
    
}
/*

// CREER UN NOUVEAU SUJET
// -------------------------------------------------------
// -------------------------------------------------------

@Component( {
    selector : 'new-subject-dialog' ,
    templateUrl : 'new-subject-dialog.html' ,
    styleUrls : [ './student.component.scss' ]
} )

export class NewSubjectDialog implements OnInit {
    constructor (
        public dialog: MatDialog
    ) {
    }
    
    // ------------------------------
    
    subjectForm: FormGroup;
    
    onSubmit () {
        
        // status : 'VALID' / 'INVALID'
        if ( this.subjectForm.status == 'INVALID' ) {
            return this.dialog.open( AlertDialog , {
                data : {
                    content : "Le formulaire contient des erreurs"
                }
            } );
        }
        
        // value : { name , description }
        console.log( this.subjectForm );
        
    }
    
    ngOnInit () {
        
        // données par défaut et validation du formulaire
        this.subjectForm = new FormGroup( {
            
            name : new FormControl( null , [
                Validators.maxLength( 45 ) ,
                Validators.required
            ] ) ,
            
            description : new FormControl()
            
        } );
        
    }
}

// CREER / EDITER UNE EQUIPE
// -------------------------------------------------------
// -------------------------------------------------------

@Component( {
    selector : 'new-team-dialog' ,
    templateUrl : 'push-user-team-dialog.html' ,
    styleUrls : [ './student.component.scss' ]
} )

export class NewTeamDialog implements OnInit {
    constructor (
        @Inject( MAT_DIALOG_DATA ) public data: any ,
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
        
        if ( this.data.update ) {
            // TODO update ajax request with subjectid data
            console.log( 'UPDATE' );
        }
        
        if ( this.data.create ) {
            // TODO create ajax request with projectid data
            console.log( 'CREATE' );
        }
        
    }
    
    ngOnInit () {
        
        // données par défaut et validation du formulaire
        this.teamForm = new FormGroup( {
            
            subjectid : new FormControl( this.data.subjectid ) ,
            
            projectid : new FormControl( this.data.projectid ) ,
            
            name : new FormControl( this.data.name || null , [ Validators.required ] ) ,
            
            leader : new FormControl( this.data.leader || null , [ Validators.required ] ) ,
            
            memberone : new FormControl( this.data.memberone || null ) ,
            
            membertwo : new FormControl( this.data.membertwo || null ) ,
            
            memberthree : new FormControl( this.data.memberthree || null )
            
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
}*/
