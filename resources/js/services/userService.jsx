import axios from "./customize_axios";
// const fetchAllUser = (page) => {
//     return axios.get(`/api/users?page=${page}`);
// }

const postCreateUser = (username, password) => {
    return axios.get("http://127.0.0.1:8000/api/test", { username, password })
}
// const putUpdateUser = (name, job) => {

//     return axios.put(`/api/users/${name}`, { name, job })
// }
export { postCreateUser }
