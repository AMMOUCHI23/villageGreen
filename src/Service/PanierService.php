<?php

namespace App\Service;

use Symfony\Component\HttpFoundation\RequestStack;

class PanierService {

    public function __construct(private RequestStack $requestStack){
        $this->requestStack =$requestStack;
    }
       //fonction qui ajoute un produit dans le panier
        public function ajouterProduit(int $id)
        {
          
          $panier=$this->requestStack->getSession()->get('panier',[]);
          if (!empty($panier[$id])) {
            $panier[$id]++;
          }else {
            $panier[$id]=1;
          }
          $this->requestStack->getSession()->set('panier', $panier);
          return $panier;
        }

         //fonction pouir modifier le panier
         public function modifierPanier(int $id)
         {
           
           $panier=$this->requestStack->getSession()->get('panier');
           if ($panier[$id]>1) {
             $panier[$id]--;
           }else {
             $panier[$id]=1;
           }
           $this->requestStack->getSession()->set('panier', $panier);
           return $panier;
         }
      //fonction qui supprime un produit dans le panier
      public function supprimerProduit(int $id)
      {
        $panier=$this->requestStack->getSession()->get('panier');
        if ($panier[$id]) {
          unset($panier[$id]);
          $this->requestStack->getSession()->set('panier', $panier);
        
        }
        return $panier;
      }
  

}