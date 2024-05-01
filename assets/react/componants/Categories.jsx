import React, { useEffect, useState } from 'react';
//import { Container, Row, Col, Image } from 'react-bootstrap'; // Assurez-vous que vous avez installé react-bootstrap et que vous importez correctement les composants nécessaires

const Categories = () => {
  const [categories, setCategories] = useState([]);

  useEffect(() => {
    const fetchData = async () => {
      try {
        const response = await fetch('https://127.0.0.1:8000/api/categories');
        if (response.ok) { // Vérifiez si la réponse est ok avant de traiter les données
          const data = await response.json(); // Convertissez la réponse en JSON
          setCategories(data['hydra:member']);
        } else {
          throw new Error('Failed to fetch categories');
        }
      } catch (error) {
        console.error('Error fetching data:', error);
      }
    };

    fetchData();
  }, []);

  return (
    <Container className="categories text-center text-primary my-4">
      <h1 className="my-4">Nos Catégories des plats</h1>
      <Row className="justify-content-center">
        {categories.map((category) => (
          <Col key={category['@id']} sm={6} md={3} className="categories custom-div m-3">
            <a href="#">
              <Image
                src={`assets/img/category/${category.image}`}
                alt={category.libelle}
                thumbnail
                width={400}
                height={400}
              />
            </a>
            <h3 className="nomCategorie my-2">{category.libelle}</h3>
          </Col>
        ))}
      </Row>
    </Container>
  );
};

export default Categories;
