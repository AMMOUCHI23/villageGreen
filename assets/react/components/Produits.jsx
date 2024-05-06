import React, { useEffect, useState } from 'react'
import { Container, Row } from 'react-bootstrap';
import { useNavigate, useParams } from 'react-router-dom'

const Produits = () => {
    const params= useParams();
    const sousCategorieId=params.id;

    const navigate=useNavigate();

    const [listeProduits, setListeProduits] = useState([]);
    const [nomSousCategorie, setNomSousCategorie] = useState('');
    useEffect(() => {
        const fetchProduits = async () => {
            try {
                const response = await fetch("/api/produits");
                if (!response.ok) {
                    throw new Error("erreur de chargement des produits");
                }
                const data = await response.json();
                setListeProduits(data.filter(produit => produit.Categorie === `/api/categories/${sousCategorieId}`));
            } catch (error) {
                console.error(error);
            }
        };

        fetchProduits();
    }, []);
    
  return (
    <Container className=" mt-3">
    <Row className=" justify-content-center">
     {/* <h1 className="text-center">{{ categorie.nomCategorie }}</h1>  */}
    </Row>
    
    <Row className=" justify-content-center">
        {
            listeProduits.map((produit)=>(
                <div className="card  col-sm-6 col-md-3 m-2"key={produit.id} onClick={()=>navigate(`/react/details/${ produit.id}`)}> 
                        <img src={`/assets/images/Séjour/Chaises/${produit.photo}`} className="card-img-top img-fluid" alt={ produit.libelle }/>
                        <div className="card-body">
                    <h5 className="card-title">{produit.libelle}</h5>
                    
                        <small className="card-text">Cliquer pour plus de détails</small>
                    
                    {/* afficher les prix en appliquant les le coefficient de vente pour les particuliers */}
                    <h4 className="prix">{ (produit.prix_achat * 1.6)  } €</h4>
                    <button className="btn btn-primary mt-3">Ajouter au panier</button>
                </div>
            </div>
            ))
        }
    </Row>
</Container>
   
  )
}

export default Produits