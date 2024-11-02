import "./formularioLogin.css"
import { Link } from 'react-router-dom';

function FormularioLogin() {
  return (
    <>
      <div className="containerLogin">
        <form action="submit">
          <h1>Login</h1>

          <label htmlFor="username">Username</label>
          <input type="text" placeholder="Username:"/>

          <label htmlFor="">Senha</label>
          <input type="password" placeholder="Senha:"/>


          <input type="submit" className="actionButtonPrimary" value={"Acessar"}/>
          <Link to ="/cadastro" className="linkCadastro"><input type="button" className="actionButtonSecondary" value={"Cadastrar"}/></Link>
        </form>
      </div>
    </>
  )
}

export default FormularioLogin