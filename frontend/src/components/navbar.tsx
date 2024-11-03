import './navbar.css'
import AccountCircleIcon from '@mui/icons-material/AccountCircle';
import ShoppingCartIcon from '@mui/icons-material/ShoppingCart';
import SearchIcon from '@mui/icons-material/Search';

import { Link, useLocation } from 'react-router-dom';

function Navbar() {

  const location = useLocation()
  const isUserPage = location.pathname === "/login"

  return (
    <>
      <div className="containerNavbar">
        <nav>
          <ul>
            {isUserPage ?
              (
                <>
                  <li className='home'><Link to="/">Home</Link></li>
                </>
              ) :
              (
                <>
                  <div className='buscar'>
                    <input type="text" placeholder='buscar' name='buscar' />
                    <SearchIcon />
                  </div>
                  <li className='home'><Link to="/">Home</Link></li>
                  <li className='login'><Link to="/login">Login</Link></li>
                  <li className='cadastro'><Link to="/cadastro">Cadastrar</Link></li>
                  <li className='carrinho'><Link to="/carrinho"><ShoppingCartIcon fontSize='large' /></Link></li>
                  <li className='user'><Link to="/user"><AccountCircleIcon fontSize='large' /></Link></li>
                </>)}
          </ul>
        </nav>
      </div>
    </>
  )
}

export default Navbar