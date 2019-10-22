import { Component , Inject , OnInit } from '@angular/core';
import { ProjectsProvider } from '../providers/projects/projects';
import { ActivatedRoute } from '@angular/router';
import { MAT_DIALOG_DATA , MatDialog } from '@angular/material';
import { FormControl , FormGroup , Validators } from '@angular/forms';
import { AlertDialog } from '../home/home.component';
import { AuthService } from '../auth/auth.service';
import { SubjectsProvider } from '../providers/subjects/subjects';

@Component( {
    selector : 'app-project' ,
    templateUrl : './project.component.html' ,
    styleUrls : [ './project.component.scss' ]
} )
export class ProjectComponent implements OnInit {
    
    project: any = null;
    subjects: any = [];
    
    constructor (
        private projectsProvider: ProjectsProvider ,
        private authService: AuthService ,
        private route: ActivatedRoute ,
        public dialog: MatDialog
    ) { }
    
    ngOnInit () {
        this.route.params.subscribe( params => {
            console.log( +params[ 'id' ] );
            this.getProject( +params[ 'id' ] );
        } );
    }
    
    getProject ( id: number ) {
        this.projectsProvider.get( { id : id } )
            .then( ( items: any ) => {
                console.log( items );
                this.project = items.project;
                this.subjects = items.subjects;
            } ).catch( error => {
            console.log( error );
        } );
    }
    
    createSubject () {
        this.dialog.open( NewSubjectDialog , {
            data : {
                
                userid : this.authService.getUser().id ,
                
                projectid : this.project.id
                
            }
        } );
    }
    
}


// CREER UN NOUVEAU SUJET
// -------------------------------------------------------
// -------------------------------------------------------

@Component( {
    selector : 'new-subject-dialog' ,
    templateUrl : '../home/new-subject-dialog.html' ,
    styleUrls : [ '../app.component.scss' ]
} )

export class NewSubjectDialog implements OnInit {
    constructor (
        @Inject( MAT_DIALOG_DATA ) public data: any ,
        private subjectProvider: SubjectsProvider ,
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
    
        this.subjectProvider.create( {
            created_by : this.subjectForm.value.userid ,
            project_id : this.subjectForm.value.projectid ,
            name : this.subjectForm.value.name ,
            description : this.subjectForm.value.description
        } ).then( ( items: any ) => {
            window.location.reload();
        } ).catch( error => {
            this.dialog.open( AlertDialog , {
                data : {
                    content :error
                }
            } );
        } );
        
    }
    
    ngOnInit () {
        
        // données par défaut et validation du formulaire
        this.subjectForm = new FormGroup( {
            
            userid : new FormControl( this.data.userid , Validators.required ) ,
            
            projectid : new FormControl( this.data.projectid , Validators.required ) ,
            
            name : new FormControl( null , [
                Validators.maxLength( 45 ) ,
                Validators.required
            ] ) ,
            
            description : new FormControl()
            
        } );
        
    }
}