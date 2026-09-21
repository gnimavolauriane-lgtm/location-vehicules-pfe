<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="Fleche.css">
</head>
<body>
    <div>
        <button id="fleche" class="fleche">&#8593;</button>
    </div>






    <script>
        let fleche=document.getElementById("fleche");

        window.onscroll=function(){ //afiche la flècha après 100px de scrollation
            if(document.body.scrollTop > 100 || document.documentElement.scrollTop > 100) {
                fleche.style.display="block";//Pour afficher la flèche
            }else{
                fleche.style.display="none"//pour cacher la flèche
            }
        };

        //fonction pour remonter en haut au click
        fleche.onclick=function(){
            window.scrollTo({
                top:0,
                behavior:"smooth"
            })
        }
    </script>
</body>
</html>