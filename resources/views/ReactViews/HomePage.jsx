import Dropdown from 'react-bootstrap/Dropdown';
import "tailwindcss/dist/taiwind.css"
export default function HomePage(){
    return(<>
    <h1>HomePage</h1>
    <img src="/image.jpg" width={100} alt="My Image" />
    <a href="/" className="text-blue-400">Home</a> |
    <a href="/login" className="text-blue-400">Login</a> |
    <a href="/register" className="text-blue-400">Register</a> |
    <a href="/forgot" className="text-blue-400">Forgot</a> |
    <a href="/about" className="text-blue-400">About</a> |
    <Dropdown>
      <Dropdown.Toggle variant="success" id="dropdown-basic">
        Dropdown Button
      </Dropdown.Toggle>

      <Dropdown.Menu>
        <Dropdown.Item href="#/action-1">Action</Dropdown.Item>
        <Dropdown.Item href="#/action-2">Another action</Dropdown.Item>
        <Dropdown.Item href="#/action-3">Something else</Dropdown.Item>
      </Dropdown.Menu>
    </Dropdown>
    </>)
}