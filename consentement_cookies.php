<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
    #cookie {
      position: fixed;
      bottom: 0;
      right: 0;
      left: 0;
      text-align: center;
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      font-size: 15px;
      color: #fff;
      background: #664586;
      padding: 20px;
      box-shadow: 0 -2px 10px rgba(0, 0, 0, 0.1);
      display: none;
      z-index: 9999;
    }

    .cookie-contenu {
      width: 110%;
      margin: auto;
      display: flex;
      margin-left:20px;
      flex-wrap: wrap;
      align-items: center;
      justify-content: space-between;
    }
    

    .cookie-bouton {
      position: relative;
      display: flex;
      margin-top:25px;
      right:330px;
    }

    .cookie-bouton button {
      padding: 8px 8px;
      border: none;
      border-radius: 50px;
      color:#fff;
      cursor: pointer;
      font-weight: bold;
      background-color:rgb(93, 70, 117);
    }
   
    .cookie-bouton button:hover{
        background-color:#ccc;
    }

    .fermerCroix{
      position: absolute;
      top: 30px;
      right: 15px;
      background: none;
      border: none;
      color: #fff;
      font-size:  32px;
      cursor: pointer;
    }

    .fermerCroix:hover {
      color: #ccc;
    }
  </style>
</head>
<body>
       
       <div id="cookie">
            <button class="fermerCroix" onclick="fermerCroix()">×</button>
        <div class="cookie-contenu">
        <p style="margin:0;flex:1;" >
        Afin de vous fournir un meilleur service et d’améliorer l’expérience de l’utilisateur sur notre site, nous utilisons des cookies. En continuant d’utiliser ce site, vous acceptez notre utilisation des cookies. (Pour plus d'informations voir  <a href="" style="color:#fff;"> Données personnelles</a>)
        </p>
        <div class="cookie-bouton">
          
            <button onclick="accepter()" >Accepter</button>
            <button onclick="refuser()" >Refuser </button>
           
        </div>
    </div>
    </div>




    <script>
        //condition pour vérifier si l'utilisateur à répondue 
        if(!localStorage.getItem('consentementCookie')){
            document.getElementById('cookie').style.display='block';
        }
        //Fonction pour accepter les cookies
        function accepter(){
            localStorage.setItem('consentementCookie','accepter');
            document.getElementById('cookie').style.display='none';
        }

        //Fonction pour refuser les cookies
        function refuser(){
            localStorage.setItem('consentementCookie','refuser');
            document.getElementById('cookie').style.display='none';
        }
        //Fonction pour fermer le cadran sans rien enregistrer
        function fermerCroix(){
        document.getElementById('cookie').style.display='none';
    }
    </script>
</body>
</html>