﻿
<!DOCTYPE html>
<html>
<head>
    <title>Katchowww</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link href="favicon.ico" rel="icon">
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css"
        integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous" />
    <link href="https://fonts.googleapis.com/css?family=Dosis" rel="stylesheet" />
    <link rel="stylesheet" href="media.css"/>
    <link rel="stylesheet" href="items_grid.css"/>
    <style>
        .container {
    max-width: 1280px;
    padding: 0 1.5rem;
    margin: auto;
    overflow: hidden; }
  
  .font-size-secondary {
    font-size: 1.3rem; }
  
  .font-medium-weight {
    font-weight: 600;
    font-size: medium; }
  
  .font-high-weight {
    font-weight: bolder;
    font-size: larger; }
  
 
 
  
  * {
    margin: 0;
    padding: 0; }
  
  body {
    font-family: "Dosis", sans-serif;
    line-height: 1.6;
    background: #fff; }
  
  a {
    text-decoration: none;
    color: #333; }
  
  ul {
    list-style: none; }
  
  h2,
  h3,
  h4 {
    text-transform: uppercase; }
  
  img {
    width: 100%; }
  

  #main-nav {
    display: flex;
    justify-content: space-between;
    padding-top: 1rem; }
    #main-nav ul {
      display: flex; }
    #main-nav li {
      padding: 1rem 1.4rem; }
    #main-nav a {
      text-decoration: none;
      color: #333;
      text-transform: uppercase;
      border-bottom: 3px transparent solid;
      padding-bottom: 0.5rem;
      transition: border-color 0.5s; }
      #main-nav a:hover {
        border-color: #ccc; }
      #main-nav a.current {
        border-color: #aaaaff; }
  
  #header-home {
    background: url("fond.jpg") no-repeat center right/cover;
    height: 100vh;
    color: #fff; }
    #header-home .header-content {
      text-align: center;
      padding-top: 20%; }
      #header-home .header-content h1 {
        font-size: 4rem;
        line-height: 1.2; }
  
  #header-inner {
    background: url("fond.jpg") no-repeat 20% 30%/cover;
    height: 5.5rem;
    border-bottom: 3px solid #aaaaff; }
  
  
  
 
  
  #main-footer {
    background: #333;
    color: #fff;
    height: 5rem; }
    #main-footer .footer-content {
      display: flex;
      justify-content: space-between;
      height: 5rem;
      align-items: center; }
      #main-footer .footer-content .social .fab {
        margin-right: 1rem;
        border: 2px #fff solid;
        border-radius: 50%;
        height: 20px;
        width: 20px;
        line-height: 20px;
        text-align: center;
        padding: 0.5rem; }
        #main-footer .footer-content .social .fab:hover {
          background: #ffbc00; }
  
    </style>
      
      
    <title>Katchoww</title>
      


</head>
<body>

    <header id="header-inner"> 
        <div class="container"> 
           <!-- Navbar -->
           <nav id="main-nav">
               <ul>
                   <li>
                        
                        <a href="home.php" class="current">Home</a>
                        
                   </li>
                   <li>
                    
                        <a href="index.php" >Connexion page</a>
                    
                    </li>                   
               </ul>
           </nav>
       </div>
    </header>
  

<div class="bg-img">
  <div class="content">
    <header>Welcome !</header>
  <!-- // formulaire de renseignement avec nom, prénom, date de naissance, pseudo et photo de profil -->
  <div class="container">
    <form id="info" action="home_process.php" method="POST" enctype="multipart/form-data">
      <div class="field">
        <input type="text" name="fname" id="fname" required placeholder="First name"><br>
      </div>
      <div class="field space">
        <input type="text" name="lname" id="lname" required placeholder="Last name"><br>
      </div>
      <div class="field space">
        <input type="date" name="bdate" id="bdate" required placeholder="Date of birth"><br>
      </div>
      <div class="field space">
        <input type="text" name="pseudo" id="pseudo" required placeholder="Pseudo"><br>
      </div>
      <br>
      <label for="pp">Choose a profile picture:</label>
      <div class="field">
        <input type="file" id="pp" name="pp"><br><br>
      </div>
      <div class="field space">
        <input type="submit" value="Submit">
      </div>
    </form>
    <p id="message"></p>
</div>

</body>
</html>
