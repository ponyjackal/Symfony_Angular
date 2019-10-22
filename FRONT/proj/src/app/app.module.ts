import { BrowserModule } from '@angular/platform-browser';
import { NgModule } from '@angular/core';

import { AppRoutingModule } from './app-routing.module';

import { AppComponent } from './app.component';
import { AuthService } from './auth/auth.service';
import { AuthGuard } from './auth/auth.guard';
import { HeaderComponent } from './header/header.component';
import { HomeComponent , SendTokenDialog } from './home/home.component';
import { LoginComponent } from './login/login.component';

import {
    MatAutocompleteModule ,
    MatButtonModule ,
    MatButtonToggleModule ,
    MatCardModule ,
    MatCheckboxModule ,
    MatChipsModule ,
    MatDatepickerModule ,
    MatDialogModule ,
    MatDividerModule ,
    MatExpansionModule ,
    MatGridListModule ,
    MatIconModule ,
    MatInputModule ,
    MatListModule ,
    MatMenuModule ,
    MatNativeDateModule ,
    MatPaginatorModule ,
    MatProgressBarModule ,
    MatProgressSpinnerModule ,
    MatRadioModule ,
    MatRippleModule ,
    MatSelectModule ,
    MatSidenavModule ,
    MatSliderModule ,
    MatSlideToggleModule ,
    MatSnackBarModule ,
    MatSortModule ,
    MatStepperModule ,
    MatTableModule ,
    MatTabsModule ,
    MatToolbarModule ,
    MatTooltipModule ,
    MatFormFieldModule
} from '@angular/material';


import { BrowserAnimationsModule } from '@angular/platform-browser/animations';
import { ReactiveFormsModule } from '@angular/forms';

import { AppMaterialModule } from './app-material/app-material.module';
import { HttpClientModule } from '@angular/common/http';

import { ProjectsProvider } from './providers/projects/projects';
import { SubjectsProvider } from './providers/subjects/subjects';

import './rxjs-operators';
import { PushUserTeam , AlertDialog , NewProjectDialog } from './home/home.component';
import { StudentComponent } from './student/student.component';
import { NewSubjectDialog , ProjectComponent } from './project/project.component';

import { ProjectsComponent } from './projects/projects.component';
import { StudentsComponent } from './students/students.component';
import { TeamsProvider } from './providers/teams/teams';
import { TokensProvider } from './providers/tokens/tokens';
import { SubjectsComponent } from './subjects/subjects.component';


@NgModule( {
    declarations : [
        AppComponent ,
        HeaderComponent ,
        HomeComponent ,
        LoginComponent ,
        StudentComponent ,
        PushUserTeam ,
        AlertDialog ,
        SendTokenDialog ,
        NewSubjectDialog ,
        ProjectComponent ,
        ProjectsComponent ,
        StudentsComponent ,
        NewProjectDialog ,
        SubjectsComponent
    ] ,
    
    entryComponents : [
        PushUserTeam ,
        AlertDialog ,
        SendTokenDialog ,
        NewSubjectDialog ,
        NewProjectDialog
    ] ,
    
    imports : [
        BrowserModule ,
        AppRoutingModule ,
        ReactiveFormsModule ,
        BrowserAnimationsModule ,
        AppMaterialModule ,
        HttpClientModule ,
        MatAutocompleteModule ,
        MatButtonModule ,
        MatButtonToggleModule ,
        MatCardModule ,
        MatCheckboxModule ,
        MatChipsModule ,
        MatDatepickerModule ,
        MatDialogModule ,
        MatDividerModule ,
        MatExpansionModule ,
        MatGridListModule ,
        MatIconModule ,
        MatInputModule ,
        MatListModule ,
        MatMenuModule ,
        MatNativeDateModule ,
        MatPaginatorModule ,
        MatProgressBarModule ,
        MatProgressSpinnerModule ,
        MatRadioModule ,
        MatRippleModule ,
        MatSelectModule ,
        MatSidenavModule ,
        MatSliderModule ,
        MatSlideToggleModule ,
        MatSnackBarModule ,
        MatSortModule ,
        MatStepperModule ,
        MatTableModule ,
        MatTabsModule ,
        MatToolbarModule ,
        MatTooltipModule ,
        MatFormFieldModule
    ] ,
    exports : [
        MatAutocompleteModule ,
        MatButtonModule ,
        MatButtonToggleModule ,
        MatCardModule ,
        MatCheckboxModule ,
        MatChipsModule ,
        MatDatepickerModule ,
        MatDialogModule ,
        MatDividerModule ,
        MatExpansionModule ,
        MatGridListModule ,
        MatIconModule ,
        MatInputModule ,
        MatListModule ,
        MatMenuModule ,
        MatNativeDateModule ,
        MatPaginatorModule ,
        MatProgressBarModule ,
        MatProgressSpinnerModule ,
        MatRadioModule ,
        MatRippleModule ,
        MatSelectModule ,
        MatSidenavModule ,
        MatSliderModule ,
        MatSlideToggleModule ,
        MatSnackBarModule ,
        MatSortModule ,
        MatStepperModule ,
        MatTableModule ,
        MatTabsModule ,
        MatToolbarModule ,
        MatTooltipModule ,
        MatFormFieldModule
    ] ,
    providers : [ AuthService , AuthGuard , ProjectsProvider , SubjectsProvider , TeamsProvider , TokensProvider ] ,
    bootstrap : [ AppComponent ]
} )
export class AppModule {
}

