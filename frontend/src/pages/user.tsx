import axios from "axios"
import { useEffect, useState } from "react"

function User() {

  const [users, setUsers] = useState<any[]>([])
  const [error, setError] = useState<string | null>(null)

  useEffect(() => {

    const fetchUsers = async () => {
      try {
        const response = await axios.get('http://localhost:8000/api/perfil')
        setUsers(response.data) 
      } catch (error: any) {
        console.error("Erro ao buscar usuários:", error)
        setError("Erro ao buscar usuários.") 
      }
    }

    fetchUsers()
  }, []) 

return (
  <>
    {users.map (user => {
          <h1>Olá {user.name}</h1>
    })}

  </>
)
}

export default User