import { Injectable } from '@angular/core';
import { HttpClient, HttpHeaders } from '@angular/common/http';


import { Observable } from 'rxjs';
import { Product } from '../models/product';
import { User } from '../models/user';
import { environment } from '../../environments/environment';

import { tap,map } from 'rxjs/operators';
// import { cpus } from 'os';

@Injectable({
  providedIn: 'root'
})
export class ApiService {

  constructor(private http:HttpClient) { }
    public getProducts () : Observable<Product[]> {
        return this.http.get<Product[]>(environment.backendProduct);
    }

    getProduct () : Observable<Product[]> {
      return this.http.get<Product[]> ( environment.backendProduct).pipe(tap((value) => console.log(value)) );
    }

    public getOneProduct(name:String) : Observable<Product[]> {
      return  this.http.get<Product[]> (environment.backendProduct).pipe(map(p => p.filter(p=>p.name == name)));
    }

    public getClients () : Observable<User[]> {
      return this.http.get<User[]>(environment.backendAllClients);
  }

    public postClient(user:User): Observable<any> {
      const modelclient = {
        name : user.name, 
        firstname: user.firstName,
        adress: user.adress,
        cp: user.cp,
        ville: user.ville,
        tel: user.tel,
        email: user.email,
        civilite: user.civilite,
        login: user.login,
        password: user.password,
        passwordVerif: user.passwordVerif
      };
      console.log(modelclient);
      console.log(environment.backendClient);
      let httpOptions = {
        headers : new HttpHeaders({
          'Content-Type' : 'application/json',
        })
      }

      return this.http.post(environment.backendClient, modelclient);
    }
}
