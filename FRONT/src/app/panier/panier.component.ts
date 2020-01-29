import { Component, OnInit } from '@angular/core';
import { Store } from '@ngxs/store';
import { ApiService } from '../service/api.service';
import { Observable } from 'rxjs';
import { Product } from '../models/product';
import { DelProduct, DelAllProduct } from '../store/actions/product.action';


@Component({
  selector: 'app-panier',
  templateUrl: './panier.component.html',
  styleUrls: ['./panier.component.css']
})
export class PanierComponent implements OnInit {

  catalogue: Observable<Product[]>

  constructor(private store : Store) {
    this.catalogue = this.store.select(state => state.product.panier);
   }

  ngOnInit() {
  }

  onClick(product) {
    this.deletProduct (product);
  }

  onClickDelCata() {
    this.store.dispatch(new DelAllProduct());
  }

  deletProduct(product) { this.store.dispatch(new DelProduct(product)); }

  // deletCata(catalogue) {
  //   catalogue.forEach(product => {
  //     console.log(product);
  //     this.store.dispatch(new DelProduct(product));
  //   });
  // }
}

