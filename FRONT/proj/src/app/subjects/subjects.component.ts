import { Component, OnInit } from '@angular/core';
import { ActivatedRoute } from '@angular/router';
import { SubjectsProvider } from '../providers/subjects/subjects';


@Component({
  selector: 'app-subjects',
  templateUrl: './subjects.component.html',
  styleUrls: ['./subjects.component.scss']
})
export class SubjectsComponent implements OnInit {

  subject: any = null;
  constructor(
    private route: ActivatedRoute,
    private subjectsProvider: SubjectsProvider
  ) { }

  ngOnInit() {
    this.route.params.subscribe( params => {
      console.log( +params[ 'id' ] );
      this.getSubject( +params[ 'id' ] );
    } );

  }

  getSubject ( id: number ) {
    this.subjectsProvider.get( { id : id } )
      .then( ( items: any ) => {
        console.log( items );
        this.subject = items;
      } ).catch( error => {
      console.log( error );
    } );
  }

}
