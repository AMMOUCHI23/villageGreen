import { useEffect, useState } from "react";
import { Col, Container, Row } from "react-bootstrap";
import { useNavigate, useParams } from "react-router-dom";

const SousCategories = () => {
    const params = useParams();
    const categorieId = params.id;
    const [listeSousCategories, setListeSousCategories] = useState([]);
    const navigate=useNavigate();
    useEffect(() => {
        const fetchCategories = async () => {
            try {
                const response = await fetch("https://127.0.0.1:8000/api/categories");
                if (!response.ok) {
                    throw new Error("Erreur lors du chargement des catégories");
                }
                const data = await response.json();
                // Filtre des sous-catégories en fonction de l'ID de la catégorie parente

                setListeSousCategories(data['hydra:member'].filter(categorie => categorie.parent && categorie.parent.id === parseInt(categorieId)));
            } catch (error) {
                console.error(error);
            }
        };

        fetchCategories();
    }, []); // Ajout de categorieId comme dépendance pour déclencher useEffect lorsqu'il change



    return (
        <Container className=" text-center my-5">
            {/* <h1 class="text-center text-primary">{{ categorie.nomCategorie }}</h1>  */}
            <Row className="justify-content-center">
                {listeSousCategories.map(sousCategorie => (


                    <Col sm={3} md={2} className=" my-4 survol" key={sousCategorie.id} onClick={()=>navigate(`/react/produits/${sousCategorie.id}`)}>

<img className="img-thumbnail rounded-circle" src={`/assets/images/${sousCategorie.nom_categorie}/${sousCategorie.photo}`} alt={sousCategorie.nom_categorie} />

                        <h6 className="nomCategorie my-2">{sousCategorie.nom_categorie}</h6>
                    </Col>
                ))}
            </Row>
           
        </Container>
    );
};
export default SousCategories;