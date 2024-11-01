import "./formularioLogin.css"

function FormularioLogin() {
  return (
    <>
      <div className="containerLogin">
        <form action="submit">
          <h1>Login</h1>

          <label htmlFor="">Nome</label>
          <input type="text" placeholder="Nome:"/>

          <label htmlFor="">Sobrenome</label>
          <input type="text" placeholder="Sobrenome:"/>

          <label htmlFor="">Senha</label>
          <input type="password" placeholder="Senha:"/>

          <label htmlFor="">Repita a senha:</label>
          <input type="password" placeholder="Repita a senha:"/>
        </form>
      </div>
    </>
  )
}

export default FormularioLogin