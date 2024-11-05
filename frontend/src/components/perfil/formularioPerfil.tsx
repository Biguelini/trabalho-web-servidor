import axios from "axios";
import "./formularioPerfil.css"
import { Link, useNavigate } from 'react-router-dom';
import { useEffect, useState } from "react";
import Swal from "sweetalert2";


function FormularioPerfil() {

	const [username, setUsername] = useState<string>("")
	const [password, setPassword] = useState<string>("")
	const [name, setName] = useState<string>("")
	const [email, setEmail] = useState<string>("")
	const [cpf, setCpf] = useState<string>("")
	const [phone, setPhone] = useState<string>("")

	const loadUsers = async () => {
		axios.get('http://localhost:8000/api/perfil/1')
			.then(res => {
				const data = res.data;
				setUsername(data.username)
				setPassword(data.password)
				setName(data.name)
				setEmail(data.email)
				setCpf(data.cpf)
				setPhone(data.phone)
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

	useEffect(() => {
		loadUsers();
	}, [])


	const handleUpdate = () => {

	}

	return (
		<div className="containerPerfil">
			<form onSubmit={handleUpdate} className="formGridPerfil">
				<h1 className="titlePerfil">Cadastrar</h1>

				<label htmlFor="username" className="visuallyHidden">Username</label>
				<input required onChange={(e: any) => { setUsername(e.target.value) }} type="text" id="username" placeholder="Username:" className="inputUsername" value={username}/>

				<label htmlFor="password" className="visuallyHidden">Senha</label>
				<input required onChange={(e: any) => { setPassword(e.target.value) }} type="password" id="password" placeholder="Senha:" className="inputSenha" value={password}/>

				<label htmlFor="name" className="visuallyHidden">Nome Completo</label>
				<input required onChange={(e: any) => { setName(e.target.value) }} type="text" id="name" placeholder="Nome Completo:" className="inputNomeCompleto" value={name}/>

				<label htmlFor="email" className="visuallyHidden">Email</label>
				<input required onChange={(e: any) => { setEmail(e.target.value) }} type="email" id="email" placeholder="Email:" className="inputEmail" value={email}/>

				<label htmlFor="cpf" className="visuallyHidden">CPF</label>
				<input required onChange={(e: any) => { setCpf(e.target.value) }} type="text" id="cpf" placeholder="CPF:" className="inputCpf" value={cpf}/>

				<label htmlFor="phone" className="visuallyHidden">Celular</label>
				<input required onChange={(e: any) => { setPhone(e.target.value) }} type="tel" id="phone" placeholder="Celular:" className="inputCelular" value={phone}/>

				<input type="submit" className="actionButtonPrimaryC" value="Atualizar Perfil" />
			</form>
		</div>
	);
}

export default FormularioPerfil;
