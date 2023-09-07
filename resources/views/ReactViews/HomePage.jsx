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
    </>)
}