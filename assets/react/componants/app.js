import React from "react"

import { Route, Routes } from "react-router-dom";
import Categories from "./categories";
import SousCategories from "./SousCategories";
import Produits from "./Produits";
import DetailsProduit from "./DetailsProduit";





const App = () => {
    return (
        <>
            <Routes>
                <Route path="/" element={<Categories />} />
                <Route path="/react/categories/:id" element={<SousCategories />} />
                <Route path="/react/produits/:id" element={<Produits />} />
                <Route path="/details/:id" element={<DetailsProduit />} />
            </Routes>

           
        </>
    )
};
export default App;