import axios from "axios";


export default function Login() {
    const handleLogin = () => {
        axios.post('/api/test', { username: "phamquan", password: "1234" })
            .then((response) => {
                // Xử lý kết quả ở đây nếu yêu cầu thành công
                console.log(response.data);
            })
            .catch((error) => {
                // Xử lý lỗi nếu yêu cầu thất bại
                console.error(error);
            });
    }
    return (<>

        <h1>LoginPage</h1>
        <p>This is login page</p>
        <form>
            {/* <input type="text" name="username" onChange={(e) => {
                setUsername(e.target.value)
            }} value={username} id="" />
            <input type="password" name="pasword" id="" onChange={(e) => {
                setPassword(e.target.value)
            }} value={password} /> */}
            <input type="button" value="login" onClick={handleLogin} />
        </form>
    </>)
}
