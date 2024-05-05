import React, { useEffect, useState } from 'react'
import { Col, Container, Row } from 'react-bootstrap';
import { useParams } from 'react-router-dom'

 const DetailsProduit = () => {
    const params = useParams();
    const produitId = params.id;
    const [detailProduit, setDetailProduit] = useState([]);

    useEffect(() => {
        const fetchProduit = async () => {
            try {
                const response = await fetch("https://127.0.0.1:8000/api/produits");
                if (!response.ok) {
                    throw new Error("erreur de chargement des détails du produit");
                }
                const data = await response.json();
                setDetailProduit(data['hydra:member'].filter(produit => produit.id === parseInt(produitId)));
            } catch (error) {
                console.error(error);
            }
        };

        fetchProduit();
    }, []);

    return (


        <Container className="mt-5">
        <h1 className="text-center text-primary my-4">Détail du Produit</h1>
        <Row className="justify-content-center mt-4">
            {detailProduit.map(produit => (  
                <>
                    <Col md={4} className="mx-3">
                        <img src="/assets/images/cuisine.jpg" className="card-img-top mt-4" alt={produit.libelle} />
                    </Col>
                    <Col md={5} className="mx-3">
                        <h2 className="text">{produit.libelle}</h2>
                        <p>dimension: {produit.dimension}</p>
                        <p>coleur: {produit.coleur}</p>
                        <h4 className="prix py-3">{produit.prix_achat} €</h4>
                        <h5 className="text-primary mt-3">Description :</h5>
                        <p>{produit.description}</p>
                        <button className="btn btn-primary btn-lg mt-4" href="">
                            Ajouter au panier
                        </button>
                    </Col>
                </>
            ))}
        </Row>
    </Container>


    )
}
export default DetailsProduit;