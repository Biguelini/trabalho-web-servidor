import { RouterProvider } from 'react-router-dom'
import Router from './routes.tsx'

import { createRoot } from 'react-dom/client'
import './index.css'
import { StrictMode } from 'react'

createRoot(document.getElementById('root')!).render(
	<StrictMode>
		<RouterProvider router={Router} />
	</StrictMode>,
)