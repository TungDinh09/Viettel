import React from 'react';
import ReactDOM from 'react-dom/client';
import {RouterProvider } from 'react-router-dom';
import router from '../views/ReactRouters/Routers';
import { Provider } from 'react-redux';
import 'bootstrap/dist/css/bootstrap.min.css'
import "../css/main.css";
import store from './app/store';

const root = ReactDOM.createRoot(document.getElementById('root'));
root.render(
    <Provider store={store}>
        <RouterProvider router={router} />
    </Provider>    
)