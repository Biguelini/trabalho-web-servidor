import './carrinho.css';

function Carrinho() {
  return (
    <>
      <div className='carrinho-container'>
        <div className="carrinho-titulo">
          <h1>Carrinho</h1>
        </div>
        <div>
          <ul className="selecionar">
            <li className='passo'>Carrinho</li>
            <li className='passo'>Identificação</li>
            <li className='passo'>Pagamento</li>
          </ul>
        </div>
      </div>
    </>
  )
}

export default Carrinho