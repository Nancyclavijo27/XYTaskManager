// En el archivo axios.js

import axios from 'axios';

const axiosInstance = axios.create({
    baseURL: 'http://127.0.0.1:8000/api', // Reemplaza esto con la URL base de tu API Laravel
  // Otros ajustes opcionales, como encabezados personalizados
});

export default axiosInstance;
