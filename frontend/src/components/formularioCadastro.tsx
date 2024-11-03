import axios from "axios";
import "./formularioCadastro.css"
import { Link } from 'react-router-dom';
import { useState } from "react";


function FormularioCadastro() {

  const [username, setUsername] = useState()
  const [password, setPassword] = useState()
  const [fullName, setFullName] = useState()
  const [email, setEmail] = useState()
  const [cpf, setCpf] = useState()
  const [phone, setPhone] = useState()

  const handleRegister = async(event:any) => {
    event.preventDefault()

    try {
      const response = await axios.post('http://localhost:8000/api/register', {
        username:username,
        password:password,
        fullName:fullName,
        email:email,
        cpf:cpf,
        phone:phone
      })
      console.log("Cadastro criado com sucesso!!", response.data) 
    }
    catch(error) {
      console.log(error)
    }
  }

  return (
    <div className="containerCadastro">
      <form onSubmit={handleRegister} className="formGridCadastro">
        <h1 className="titleCadastro">Cadastrar</h1>

        <label htmlFor="username" className="visuallyHidden">Username</label>
        <input onChange={(e:any) => { setUsername(e.target.value)}} type="text" id="username" placeholder="Username:" className="inputUsername" />

        <label htmlFor="password" className="visuallyHidden">Senha</label>
        <input onChange={(e:any) => { setPassword(e.target.value)}} type="password" id="password" placeholder="Senha:" className="inputSenha" />

        <label htmlFor="fullName" className="visuallyHidden">Nome Completo</label>
        <input onChange={(e:any) => { setFullName(e.target.value)}} type="text" id="fullName" placeholder="Nome Completo:" className="inputNomeCompleto" />

        <label htmlFor="email" className="visuallyHidden">Email</label>
        <input onChange={(e:any) => { setEmail(e.target.value)}} type="text" id="email" placeholder="Email:" className="inputEmail" />

        <label htmlFor="cpf" className="visuallyHidden">CPF</label>
        <input onChange={(e:any) => { setCpf(e.target.value)}} type="text" id="cpf" placeholder="CPF:" className="inputCpf" />

        <label htmlFor="phone" className="visuallyHidden">Celular</label>
        <input onChange={(e:any) => { setPhone(e.target.value)}} type="text" id="phone" placeholder="Celular:" className="inputCelular" />

        <input type="submit" className="actionButtonPrimaryC" value="Cadastrar" />
        <Link to="/login" className="linkButton"> <input type="button" className="actionButtonSecondaryC" value="Login" /></Link>

      </form>
    </div>
  );
}

export default FormularioCadastro;
