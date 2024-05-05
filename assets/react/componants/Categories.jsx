import { useEffect, useState } from "react";
import { Col, Container, Row } from "react-bootstrap";
import {  Outlet, useNavigate } from "react-router-dom";

const Categories = () => {
    const [listeCategories, setlisteCategories] = useState([]);
    const navigate=useNavigate();
    
    useEffect(() => {
        const fetchCategories = async () => {
            try {
                const response = await fetch("https://127.0.0.1:8000/api/categories?_limit=3");
                if (!response.ok) {
                    throw new Error("erreur de chargement des catégories");
                }
                const data = await response.json();
                setlisteCategories(data['hydra:member'].filter(categorie => !categorie.parent));
            } catch (error) {
                console.error(error);
            }
        };

        fetchCategories();
    }, []);
    // fetch("https://127.0.0.1:8000/api/categories")
    //     .then((response) => {
    //         return response.json();
    //     })
    //     .then((data) => {
    //         setlisteCategories(data['hydra:member'
    //         ].filter(categorie => !categorie.parent));
    //     })
    //     .catch(function (error) {
    //         console.log(error);
    //     });
    return (
        <Container className=" text-center text-primary my-5">
            <h1 className="text-center">Nos Catégories</h1>
            <Row className="justify-content-center d-flex">
                {listeCategories.map((categorie) => (
                    <Col sm={6} md={3} className="my-4 survol" key={categorie.id} onClick={()=>navigate(`/react/categorie/${categorie.id}`)}>
<img className="img-thumbnail rounded-circle" src={`./assets/images/${categorie.photo}`} alt={categorie.nom_categorie} />
                        <h3 className="nomCategorie my-2">{categorie.nom_categorie}</h3>
                        <Outlet/>
                    </Col>
                ))}
            </Row>
          
        </Container>
        
    );
}

export default Categories;