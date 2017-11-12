<!DOCTYPE html>
<html>
  <?php require_once "includes/head.php" ?>
  <body>
    <div class="vertical-parent"><div class="vertical-child">
      <div class="game-container">
        <section class="mode-info">
          Selecciona cualquier imagen cuya palabra contenga <br> la letra solicitada en cualquier lugar de la misma. <br><br>
          Ejemplo: Selecciona la imagen de un OSO <br> tanto para escribir las letras "O" como "S". <br><br>
        <?php if ($_GET['mode']==1) : ?>
          ¡Termina la frase en el menor tiempo posible!<br><br>
        <?php endif ?>
        <?php if ($_GET['mode']==2) : ?>
          <div>
            10 puntos : letra en el medio de la palabra&nbsp<br>
            20 puntos : la palabra comienza con la letra<br>
            35 puntos : la palabra termina con la letra&nbsp<br>
            -5 puntos : la palabra no contiene la letra&nbsp<br><br>
          </div>
          ¡Tienes 10 segundos por letra!<br><br>
        <?php endif ?>
        </section>
        <a href="gameplay.php?mode=<?=$_GET['mode']?>" class="game-panel mode-button">EMPEZAR</a>
      </div>
    </div></div>
  </body>
</html>
