import { NgModule } from '@angular/core';
import { Routes, RouterModule } from '@angular/router';
import { AccueilComponent } from './accueil/accueil.component';

const routes: Routes = [
  { path: 'catalogue', loadChildren: './catalogue/catalogue.module#CatalogueModule' },
  { path: 'compte', loadChildren: './compte/compte.module#CompteModule' },
  { path: 'accueil', component: AccueilComponent },
  { path: 'panier', loadChildren: './panier/panier.module#PanierModule' },
  { path: 'connexion', loadChildren: './connexion/connexion.module#ConnexionModule' },
  { path: '',
    redirectTo: '/accueil',
    pathMatch: 'full'
  }
];

@NgModule({
  imports: [RouterModule.forRoot(routes)],
  exports: [RouterModule]
})
export class AppRoutingModule { }
