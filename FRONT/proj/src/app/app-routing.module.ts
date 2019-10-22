import { NgModule } from '@angular/core';
import { Routes , RouterModule } from '@angular/router';

import { AuthGuard } from './auth/auth.guard';
import { LoginComponent } from './login/login.component';
import { HomeComponent } from './home/home.component';
import { StudentComponent } from './student/student.component';
import {ProjectComponent} from "./project/project.component";
import {ProjectsComponent} from "./projects/projects.component";
import {SubjectsComponent} from "./subjects/subjects.component";

const routes: Routes = [
    { path : '' , component : HomeComponent , canActivate : [ AuthGuard ] } ,
    { path : 'login' , component : LoginComponent } ,
    { path : 'student' , component : StudentComponent } ,
    { path : 'project/:id' , component : ProjectComponent } ,
    { path : 'subject/:id' , component : SubjectsComponent } ,
    { path : 'projects' , component : ProjectsComponent } ,
    { path : '**' , redirectTo : '' }
];

@NgModule( {
    imports : [ RouterModule.forRoot( routes ) ] ,
    exports : [ RouterModule ]
} )
export class AppRoutingModule {
}
