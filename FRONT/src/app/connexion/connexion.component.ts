import { Component, OnInit } from '@angular/core';
import { FormGroup, FormBuilder, Validators } from '@angular/forms';
import { AuthentificationService } from '../service/authentification.service';
import { Router } from '@angular/router';
import { ApiService } from '../service/api.service';
import { User } from '../models/user';

@Component({
  selector: 'app-connexion',
  templateUrl: './connexion.component.html',
  styleUrls: ['./connexion.component.css']
})
export class ConnexionComponent implements OnInit {

  loginForm: FormGroup;
  submited = false;
  errors ="";

  login: any;
  password: any;

  clients : User[];

  constructor(
    private formBuilder: FormBuilder,
    private authentificationService: AuthentificationService,
    private router: Router,
    private apiService : ApiService
  ) { }

  ngOnInit() {
    this.apiService.getClients().subscribe(
      clients => {
        this.clients = clients as User[]
      }
    );
  }


  connect() {
    console.log(this.login);
    console.log(this.password);

    
    
    // this.authentificationService.login(this.login, this.password).subscribe(success => {
    //   localStorage.setItem('token', success.token);
    // });
  }

}
