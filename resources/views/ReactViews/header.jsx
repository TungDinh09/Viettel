import Container from 'react-bootstrap/Container';
import Nav from 'react-bootstrap/Nav';
import Navbar from 'react-bootstrap/Navbar';
import "./assets/CSS/Customheader.css"

function Header() {
  return (
   <div>
    
    <Navbar expand="lg" className="bg-nav">
      <Container>
        <Navbar.Brand href="#home">
          <img src="/viettel-logo.png" height="60px" width="60px" alt="" />
        </Navbar.Brand>
        <Navbar.Toggle aria-controls="basic-navbar-nav" />
        <Navbar.Collapse id="basic-navbar-nav">
          <Nav className="mx-auto">
            <Nav.Link href="#home" className='nav-text-red text-custom-header'>Trang chủ</Nav.Link>
            <Nav.Link href="#link" className='nav-text-red text-custom-header'>Sản phẩm</Nav.Link>
            <Nav.Link href="#link" className='nav-text-red text-custom-header'>Dịch vụ</Nav.Link>
            <Nav.Link href="#link" className='nav-text-red text-custom-header'>Hỗ trợ</Nav.Link>
          </Nav>
        </Navbar.Collapse>
      </Container>
    </Navbar>
 
   </div>
  );
}

export default Header;