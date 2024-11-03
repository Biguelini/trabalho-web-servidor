import "./formularioLogin.css"
import { Link } from 'react-router-dom';
import axios from "axios"
import { useState } from "react";

function FormularioLogin() {

  const [username, setUsername] = useState('')
  const [password, setPassword] = useState('')

  const handleLogin = async (event: any) => {
    event.preventDefault();

    console.log(username)

    try {
      const response = await axios.post('http://localhost:8000/api/login', {
        username: username,
        password: password,
      });
      console.log('Resposta:', response.data)
    } catch (error) {
      console.error('Erro ao fazer login:', error)
    }
  }

  return (
    <>
      <div className="containerLogin">
        <form onSubmit={handleLogin}>
          <h1>Login</h1>

          <label htmlFor="username">Username</label>
          <input type="text" placeholder="Username:" onChange={(e) => { setUsername(e.target.value) }} />

          <label htmlFor="">Senha</label>
          <input type="password" placeholder="Senha:" onChange={(e) => { setPassword(e.target.value) }} />


          <input type="submit" className="actionButtonPrimary" value={"Acessar"} />
          <Link to="/cadastro" className="linkCadastro"><input type="button" className="actionButtonSecondary" value={"Cadastrar"} /></Link>
        </form>
      </div>
    </>
  )
}

export default FormularioLogin