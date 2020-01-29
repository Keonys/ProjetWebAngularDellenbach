import { Component, OnInit } from '@angular/core';
import { Store } from '@ngxs/store';


@Component({
  selector: 'app-tetiere',
  templateUrl: './tetiere.component.html',
  styleUrls: ['./tetiere.component.css']
})
export class TetiereComponent implements OnInit {

  nbProduct:number;
  
  constructor( private store : Store) { 
    this.store.select(state => state.product.panier).subscribe (u => this.nbProduct = u.length);
  }

  ngOnInit() {
  }

}
