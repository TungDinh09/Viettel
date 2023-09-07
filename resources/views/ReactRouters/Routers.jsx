import React from 'react';
import { createBrowserRouter} from 'react-router-dom';
import HomePage from '../ReactViews/HomePage';
import About from '../ReactViews/About';
import Login from '../ReactViews/Auth/Login';
import Register from '../ReactViews/Auth/Register';
import ForgotPassword from '../ReactViews/Auth/ForgotPassword';


const router = createBrowserRouter([
    {
        path: "/",
        element: <HomePage/>,
    },
    {
        path: "/about",
        element: <About/>,
    },
    {
        path: "/login",
        element: <Login/>,
    },
    {
        path: "/register",
        element:  <Register/>
    },
    {
        path: "/forgot",
        element:  <ForgotPassword/>
    }
    
])
export default router;