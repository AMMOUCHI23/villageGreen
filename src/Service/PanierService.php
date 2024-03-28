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
      //fonction qui supprime un produit dans le panier
      public function supprimeProduit(int $id)
      {
        $panier=$this->requestStack->getSession()->get('panier',[]);
        if (empty($panier[$id])) {
          unset($panier[$id]);
          $this->requestStack->getSession()->set('panier', $panier);
        
        }
        
      }
  

}