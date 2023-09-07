import React from 'react';
import ReactDOM from 'react-dom/client';
import "../css/app.css";
const root = ReactDOM.createRoot(document.getElementById('root'));
root.render(
    <React.StrictMode>
        <h1>Hello world</h1>
        <img src="/image.png" alt="My Image" />
    </React.StrictMode>
)