import axios from "axios";
import "./formularioCadastro.css"
import { Link, useNavigate } from 'react-router-dom';
import { useState } from "react";
import Swal from "sweetalert2";


function FormularioCadastro() {

	const [username, setUsername] = useState<string>("")
	const [password, setPassword] = useState<string>("")
	const [name, setName] = useState<string>("")
	const [email, setEmail] = useState<string>("")
	const [cpf, setCpf] = useState<string>("")
	const [phone, setPhone] = useState<string>("")

	const navigate = useNavigate();

	const handleRegister = async (event: any) => {
		event.preventDefault()

		axios.post('http://localhost:8000/api/register', {
			username,
			password,
			name,
			email,
			cpf,
			phone
		})
			.then(res => {
				console.log(res)
				navigate("/user");
			})
			.catch(error => {
				if (error.status == 400) {
					Swal.fire({
						title: "Erro",
						text: "Preencha todos os campos!",
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
		<div className="containerCadastro">
			<form onSubmit={handleRegister} className="formGridCadastro">
				<h1 className="titleCadastro">Cadastrar</h1>

				<label htmlFor="username" className="visuallyHidden">Username</label>
				<input required onChange={(e: any) => { setUsername(e.target.value) }} type="text" id="username" placeholder="Username:" className="inputUsername" />

				<label htmlFor="password" className="visuallyHidden">Senha</label>
				<input required onChange={(e: any) => { setPassword(e.target.value) }} type="password" id="password" placeholder="Senha:" className="inputSenha" />

				<label htmlFor="name" className="visuallyHidden">Nome Completo</label>
				<input required onChange={(e: any) => { setName(e.target.value) }} type="text" id="name" placeholder="Nome Completo:" className="inputNomeCompleto" />

				<label htmlFor="email" className="visuallyHidden">Email</label>
				<input required onChange={(e: any) => { setEmail(e.target.value) }} type="email" id="email" placeholder="Email:" className="inputEmail" />

				<label htmlFor="cpf" className="visuallyHidden">CPF</label>
				<input required onChange={(e: any) => { setCpf(e.target.value) }} type="text" id="cpf" placeholder="CPF:" className="inputCpf" />

				<label htmlFor="phone" className="visuallyHidden">Celular</label>
				<input required onChange={(e: any) => { setPhone(e.target.value) }} type="tel" id="phone" placeholder="Celular:" className="inputCelular" />

				<input type="submit" className="actionButtonPrimaryC" value="Cadastrar" />
				<Link to="/login" className="linkButton"> <input type="button" className="actionButtonSecondaryC" value="Login" /></Link>

			</form>
		</div>
	);
}

export default FormularioCadastro;
