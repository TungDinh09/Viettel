import axios from "axios"
import { useState } from "react";
const api = axios.create({
    baseURL: `/api`
})
export default function Register(){
    const [color, setColor] = useState();
    api.get("/test").then(res=>{
        console.log(res.data);
        setColor(res.data);
    })
    return(<>
    <h1>RegisterPage</h1>
    <p>This is Register page {color} </p>
    </>)
}
