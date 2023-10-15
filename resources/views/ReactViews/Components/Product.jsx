import Card from "react-bootstrap/Card";
import "../assets/CSS/product.css";
import Button from "react-bootstrap/Button";
import { useState } from "react";
export default function Product(props) {
    console.log(props.title);
    const [productItem,setProductItem] = useState({
        title:props.title,
        description:props.description
    });
    return(
        <Card className="product-card-img position-relative">
            {/* Card content */}
                <Card.Title className="text-light text-center uppercase position-absolute product-name w-100 py-1">
                    {productItem.title}
                </Card.Title>
            <Card.Body className="justify-content-center align-items-center d-flex flex-column">
            <Card.Text className="text-light text-center">
                {productItem.description}
            </Card.Text>
            <Button  className="mx-auto button-62 mt-2 ">Chi tiết</Button>
            </Card.Body>
        </Card>
    )
}