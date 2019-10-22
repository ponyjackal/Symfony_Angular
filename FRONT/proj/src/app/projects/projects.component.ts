import { Component, OnInit } from '@angular/core';
import {ProjectsProvider} from "../providers/projects/projects";

@Component({
  selector: 'app-projects',
  templateUrl: './projects.component.html',
  styleUrls: ['./projects.component.scss']
})
export class ProjectsComponent implements OnInit {


  projects: any = [];

  constructor(private projectsProvider: ProjectsProvider) {}

  ngOnInit() {
    this.getAllProjects();
  }

  getAllProjects() {
    this.projectsProvider.getAll()
      .then((items: any) => {
        console.log(items);
        this.projects = items;
      }).catch(error => {
      console.log(error);
    });
  }
}
