// App.js
import React from "react";
import { Route, Routes } from "react-router-dom";
import Categories from "./Categories";
import SousCategories from "./SousCategories";
import Produits from "./Produits";
import DetailsProduit from "./DetailsProduit";

const App = () => {
   
    return (
        
        <Routes>
            <Route path="/react" element={<Categories />} />
            <Route path="/react/categorie/:id" element={<SousCategories />} />
            <Route path="/react/produits/:id" element={<Produits />} />
            <Route path="react/details/:id" element={<DetailsProduit />} />
        </Routes>
    
    
    );
};
export default App;
