<nav class="navbar navbar-expand-lg bg-dark" data-bs-theme="dark" id="maNav">
  <div class="container-fluid">
    <a class="navbar-brand" href="<?=URL?>">BestCar</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <?php 
        if (!isConnect())
        {
          ?>
            <li class="nav-item">
              <a class="nav-link" aria-current="page" href="<?=URL?>inscription.php">Inscription</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="<?=URL?>connexion.php">Connexion</a>
            </li>
            <?php
        }
        if (isConnect())
        {
          ?>
            <li class="nav-item">
              <a class="nav-link" href="<?=URL?>profil.php">Profil</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="<?=URL?>connexion.php?action=deconnexion">Deconnexion</a>
            </li>
          <?php
        }
        ?>
      </ul>
    </div>
  </div>
</nav>