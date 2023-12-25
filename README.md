# DockerWebApp
# Introducción
Este proyecto se basa en el uso de Docker Compose para desplegar automáticamente dos contenedores, un Apache PHP 8.0.28 y un MySQL 8.0.34 que manejan una aplicación web que también hace uso de la librería Fpdf para generar un cuadrante de disponibilidad en base a fechas y sexo de los trabajadores. <br>
Esta aplicación web es una aplicación sencilla que usa Apache y MySql. Por motivos de privacidad y seguridad, la finalidad de la aplicación ha sido generalizada y tampoco incluye datos personales, imágenes o lugares geográficos reales. <br>
# Instalación y desinstalación

- Instalamos Docker y Docker Compose.
- Ejecutamos:  
  > docker-compose up
- Para detener el servicio: 
  > docker-compose down

# Uso de la Aplicación Web

Para la utilización básica de esta aplicación de ejemplo podemos debemos seguir los siguientes pasos:

- Añadir los trabajadores y la disponiblidad que deseemos.
- Generar el cuadrante según las fechas deseadas. Este cuadrante está pensado para generar viernes (mañana y tarde), sábados y domingos. Seleccione fecha inicial y final y genere con le botón.
- Podrá obtener el cuadrante desde las fechas que usted desee en "Obtener Cuadrante", esto generará un PDF que no tiene porqué estar ligado a todas las fechas generadas anteriormente.
- Puede editar los trabajadores en un CRUD, así como hacer cambios manuales de las asignaciones.
- Puede eliminar todas las fechas generadas y asignaciones directamente desde "Resetear Base de Datos", esto no elimina a los trabajadores. La finalidad pensada es poder limpiar el espacio obsoleto que ocupen las asignaciones antiguas que ya no sean necesarias mantener.

