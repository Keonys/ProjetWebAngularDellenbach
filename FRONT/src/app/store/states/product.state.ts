import { AddProduct, DelProduct, DetailProduct, DelAllProduct } from '../actions/product.action';
import { State, Action, StateContext, Selector } from '@ngxs/store';
import { Product } from 'src/app/models/product';

export interface ProductStateModel {
    panier: Product[];
    products: Product[];
    detail: Product;
}

@State<ProductStateModel>({
    name: 'product',
    defaults: {
      panier: [],
      products: [],
      detail: new Product()
    }
  })

  export class ProductState {

    @Selector()
      static getPanier(state: ProductStateModel) {
          return state.panier;
      }
  
  @Action(AddProduct)
      add({getState, patchState }: StateContext<ProductStateModel>, { product }: AddProduct) {
          const state = getState();
          patchState({
              panier: [...state.panier, product]
        });
    }

  
   @Action(DelProduct)
      del ({getState, patchState }: StateContext<ProductStateModel>, { product }: DelProduct) {
          const state = getState();
          
          patchState({
              panier: [...(state.panier.slice(0,-1))]
        });
    }
    
    @Action(DelAllProduct)
      delAll ({getState, patchState }: StateContext<ProductStateModel>, {}: DelAllProduct) {
          
          patchState({
              panier: []
        });
    }
    
    @Action(DetailProduct)
        detail({getState, patchState }: StateContext<ProductStateModel>, { product }: DetailProduct) {
            patchState({
                detail: product
            });
    }
  }
  