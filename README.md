<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<h1>DevJobs</h1>

<p>DevJobs en una plataforma donde reclutarores del mundo TECH pueden publicar sus vacantes de empleos y los desarrolladores de sofware pueden buscar estas vancantes y postularse para ser empleados.</p>

<hr>
<hr>
Users para pruebas:
cltr996@gmail.com   (reclutador)
prueba@gmail.com    (reclutador)
correo2@correo.com  (dev)
correo3@correo.com  (dev)

password: 123123123
<hr>
<hr>

<h2>La aplicación Web posee las siguentes características:</h2>


<ul>
  <li>
    Panel de autenticación para el Login:
    <img src="./readmeFiles/login.jpg" alt="login" >
  </li>

  <hr>

  <li>
    Panel para crear cuenta:
    <img src="./readmeFiles/register.jpg" alt="register" >
  </li>
  
  <hr>

  <li>
    Página de administración para reclutadores:
    <br>
    <img src="./readmeFiles/dashboard.jpg" alt="home" >
    
    Este apartado solo está disponible para persona que se hayan registrado como reclutadores
  </li>

  

  <hr>

  <li>
    Página para creación de vacantes:
    <img src="./readmeFiles/create.jpg" alt="create" >
    
    Este apartado solo está disponible para persona que se hayan registrado como reclutadores
    
  </li>

  <hr>

  <li>
    Página de postulaciones:
    <img src="./readmeFiles/postulaciones.jpg" alt="postulaciones" >
    
    En este apartado el reclutador puede ver las postulaciones a las vacantes que haya publicado y la información de los candidatos

  </li>

  <hr>

  <li>
    Página de búsqueda de vacantes:
    <img src="./readmeFiles/home.jpg" alt="home" >
    <img src="./readmeFiles/vacantes.jpg" alt="vacantes" >

    En este apartado, las personas pueden introducir diferentes términos para realizar la búsqueda de su interés.
  </li>

  <hr>

  <li>
    Página para postularse:
    <img src="./readmeFiles/postularse.jpg" alt="postularse" >
    <img src="./readmeFiles/postularse2.jpg" alt="postularse" >
    
    Las vacantes pueden ser vistas por todo los usuarios, pero la opción de postularse sólo les aparecerá a las personas que se hayan resgistrado con el rol de Desarrollador.

    
  </li>
  
</ul>

<hr>

  <li>
    Notificación de nuevas postulaciones:
    <img src="./readmeFiles/notification.jpg" alt="notification" >
    
    Cada vez que un nuevo desarrollador se postule a una vacante, el reclutador recibe un correo de notificación con la información

    
  </li>
  
</ul>

<hr>
<hr>

<h2>Base de datos:</h2>

<p>La base de datos utilizada fue SQL y se usa el ORM Eloquent de Laravel para interactuar esta</p>

<p>A continuación el diagrama de realacines de las tablas utilizadas para la aplicación:</p>


<img src="./readmeFiles/diagram.jpg" alt="diagram" >





<hr>
<hr>
<hr>

<h2>Funcionalidad</h2>
<ul>

<li>Todas las funcionalidades de formularios para login, registros y busquedas fue realizada con LiveWire.</li>

<hr>

<li>Para login, registration, password reset, email verification, and password confirmation se utilizó "Breeze"  el "application starter kits" que ofrece Laravel</li>

</ul>


