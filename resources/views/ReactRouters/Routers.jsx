import React from 'react';
import { createBrowserRouter} from 'react-router-dom';
import Home from '../ReactViews/home';
import About from '../ReactViews/About';
import Login from '../ReactViews/login';
import Register from '../ReactViews/Auth/Register';
import ForgotPassword from '../ReactViews/Auth/ForgotPassword';
import Detail from '../ReactViews/Detail';
import Sidebar from '../ReactViews/admin/adminheader';
import Header from '../ReactViews/header';
import App from '../ReactViews/App';
import Adminhome from '../ReactViews/admin/admin';
import Post from '../ReactViews/Components/Post';
const router = createBrowserRouter([
    {
        path: "/test",
        element: <Post/>,
    },
    {
        path: "/",
        element: <Home/>,
    },
    {
        path: "/about",
        element: <About/>,
    },
    {
        path: "/register",
        element:  <Register/>
    },
    {
        path: "/forgot",
        element:  <ForgotPassword/>
    },
    {
        path: '/app',
        element: <App />
    },
    {
        path: '/login',
        element: <Login />
    },
    {
        path: '/header',
        element: <Header />
    },
    {
        path: '/Detail',
        element: <Detail />
    },
    {
        path:'/Sidebar',
        element: <Sidebar />
    },
    {
        path:'/admin',
        element: <Adminhome />
    },

])
export default router;