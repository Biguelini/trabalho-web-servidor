import "./formularioCadastro.css"
import { Link } from 'react-router-dom';


function FormularioCadastro() {
  return (
    <div className="containerCadastro">
      <form action="submit" className="formGridCadastro">
        <h1 className="titleCadastro">Cadastrar</h1>

        <label htmlFor="username" className="visuallyHidden">Username</label>
        <input type="text" id="username" placeholder="Username:" className="inputUsername" />

        <label htmlFor="password" className="visuallyHidden">Senha</label>
        <input type="password" id="password" placeholder="Senha:" className="inputSenha" />

        <label htmlFor="name" className="visuallyHidden">Nome Completo</label>
        <input type="text" id="name" placeholder="Nome Completo:" className="inputNomeCompleto" />

        <label htmlFor="email" className="visuallyHidden">Email</label>
        <input type="text" id="email" placeholder="Email:" className="inputEmail" />

        <label htmlFor="cpf" className="visuallyHidden">CPF</label>
        <input type="text" id="cpf" placeholder="CPF:" className="inputCpf" />

        <label htmlFor="phone" className="visuallyHidden">Celular</label>
        <input type="text" id="phone" placeholder="Celular:" className="inputCelular" />

        <input type="submit" className="actionButtonPrimaryC" value="Cadastrar" />
        <Link to="/login" className="linkButton"> <input type="button" className="actionButtonSecondaryC" value="Login" /></Link>

      </form>
    </div>
  );
}

export default FormularioCadastro;
