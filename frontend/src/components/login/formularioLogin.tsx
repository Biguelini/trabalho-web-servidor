import "./formularioLogin.css"
import { Link, useNavigate } from 'react-router-dom';
import axios from "axios"
import { useState } from "react";
import Swal from "sweetalert2";

function FormularioLogin() {

	const [username, setUsername] = useState('')
	const [password, setPassword] = useState('')

	const navigate = useNavigate();

	const handleLogin = async (event: any) => {
		event.preventDefault();

		axios.post('http://localhost:8000/api/login', { username, password, })
			.then(res => {
				console.log(res)
				navigate("/user");
			})
			.catch(error => {
				if (error.status == 413) {
					Swal.fire({
						title: "Erro",
						text: "Login e/ou senha incorretos!",
						icon: "error"
					});
				} else {
					Swal.fire({
						title: "Erro",
						text: "Ocorreu um erro, entre em contato com o suporte!",
						icon: "error"
					});
				}
			})
	}

	return (
		<>
			<div className="containerLogin">
				<form onSubmit={handleLogin}>
					<h1>Login</h1>

					<label htmlFor="username">Username</label>
					<input required type="text" placeholder="Username:" onChange={(e) => { setUsername(e.target.value) }} />

					<label htmlFor="">Senha</label>
					<input required type="password" placeholder="Senha:" onChange={(e) => { setPassword(e.target.value) }} />

					<input type="submit" className="actionButtonPrimary" value={"Acessar"} />
					<Link to="/cadastro" className="linkCadastro"><input type="button" className="actionButtonSecondary" value={"Cadastrar"} /></Link>
				</form>
			</div>
		</>
	)
}

export default FormularioLogin