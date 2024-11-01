import Home from "./pages/home"
import User from "./pages/user"
import Login from "./pages/login"
import App from "./App"

import Error from "./pages/error"

import { createBrowserRouter } from 'react-router-dom'
import Cadastro from "./pages/cadastro"

const Router = createBrowserRouter([
  {
    path: "/",
    element: <App />,
    errorElement: <Error />,
    children: [
      {
        path: "/",
        element: <Home />
      },
      {
        path: "user",
        element: <User />,
      },
      {
        path: "login",
        element: <Login />
      },
      {
        path: "cadastro",
        element: <Cadastro/>
      }
    ]
  },
])

export default Router