import React from 'react';
import ReactDOM from 'react-dom/client';
import App from './componants/app';
import { BrowserRouter } from 'react-router-dom';

 ReactDOM.createRoot(document.getElementById('react-app')).render(
  <BrowserRouter>
  <App />
</BrowserRouter>

);