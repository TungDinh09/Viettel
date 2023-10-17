import Header from "./header";
import Container from "react-bootstrap/Container";
import Row from "react-bootstrap/Row";
import Col from "react-bootstrap/Col";
import Button from "react-bootstrap/Button";

import Carousel from "react-bootstrap/Carousel";
import Product from "../ReactViews/Components/Product";
import "./assets/CSS/product.css";
import { useSelector, useDispatch } from "react-redux";
import { 
  decrement,
  increment,
  incrementByAmount,
  incrementAsync,
  selectCount
 } from "../../js/features/counter/counterSlice";


function Home() {
  const products = useSelector(selectCount)
  return (
    <div className="bg-red">
   <Header/>
   <Carousel className="">
  <Carousel.Item>
    <img
      className="d-block w-100 Carousel-home"
      src="carousel1.jpg"
      
      alt="First slide"
    />
    <Carousel.Caption>
      <h3>First slide label</h3>
      <p>Nulla vitae elit libero, a pharetra augue mollis interdum.</p>
    </Carousel.Caption>
  </Carousel.Item>
  <Carousel.Item>
    <img
      className="d-block w-100 Carousel-home"
      src="carousel2.jpg"
      alt="Second slide"
      
    />

    <Carousel.Caption>
      <h3>Second slide label</h3>
      <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
    </Carousel.Caption>
  </Carousel.Item>
  <Carousel.Item>
    <img
      className="d-block w-100 Carousel-home"
      src="carousel3.jpg"
      
      alt="Third slide"
    />

    <Carousel.Caption>
      <h3>Third slide label</h3>
      <p>Praesent commodo cursus magna, vel scelerisque nisl consectetur.</p>
    </Carousel.Caption>
  </Carousel.Item>
</Carousel>
      <Container fluid="md p-4 ">
        <Row>

          {/* Mobile-first design: Full width on small screens */}
          {products.map((item)=>(
           <Col xs={12} sm={6} md={6} lg={3} className="p-3 my-3">
            <Product title={item.title} description={item.description}/>
          </Col>))}
        </Row>
      </Container>

    </div>
  );
}

export default Home;
