import{ createBrowserRouter } from "react-router-dom"
import App from "./App"
import Login from "./login"
import Header from "./header"
import Home from "./home"
import Detail from "./Detail"
import Sidebar from "./admin/adminheader"
import Adminhome from "./admin/admin"
const router =createBrowserRouter([
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
        path: '/',
        element: <Home />
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
path:'/Admin',
element:<Adminhome/>
    }

])
export default router 