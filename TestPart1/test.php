<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <link rel="Stylesheet" type="text/css" href="test.css" media="all"/>
  <script src="https://kit.fontawesome.com/92920db574.js" crossorigin="anonymous"></script>
  <link rel="stylesheet" type="text/css" href="Style/styleFooter.css">
  
    <title>Forum</title>
</head>
<body>
 <button id="modal-btn"> Modifier</button>
  <div class="modal">
    <div class="modal-content">
      <span class="close-btn">&times;</span>
      <h1>Modifier votre message</h1>
      <form method="POST">
        <textarea name="modif"></textarea>
        <br>
        <button>Modifier</button>
      </form>
    </div>
  </div>
</div>


<script type="text/javascript">
  let modalBtn = document.getElementById("modal-btn")
  let modal = document.querySelector(".modal")
  let closeBtn = document.querySelector(".close-btn")

  modalBtn.onclick = function(){
    modal.style.display = "block"
  }
  closeBtn.onclick = function(){
    modal.style.display = "none"
  }
  window.onclick = function(e){
    if(e.target == modal){
      modal.style.display = "none"
    }
  }
  </script>
</body>
</html>