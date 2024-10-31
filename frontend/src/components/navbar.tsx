import './navbar.css'
import AccountCircleIcon from '@mui/icons-material/AccountCircle';
import ShoppingCartIcon from '@mui/icons-material/ShoppingCart';

function Navbar() {
  return (
    <>
      <div className="containerNavbar">
        <div className="navbar">
          <ul>
            <li><a href="">Login</a></li>
            <li><a href="">Cadastrar</a></li>
            <li><a href=""><ShoppingCartIcon fontSize='large'/></a></li>
            <li><a href=""><AccountCircleIcon fontSize='large'/></a></li>
          </ul>
        </div>
      </div>
    </>
  )
}

export default Navbar