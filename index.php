<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />

  <link rel="icon" href="https://cdn-icons-png.flaticon.com/512/5968/5968743.png" />

  <link rel="stylesheet" href="css/style.css">

  <!-- jQuery -->
  <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

  <!-- JS -->
  <script src="script/script.js"></script>

  <title>Devchallenges</title>
</head>

<body>
  <header>
    <div class="container">
      <div class="header">
        <div>
          <a href="index.php">
            <img src="imagens/my_unsplash_logo.svg" alt="logo">
          </a>
          <form>
            <input type="text" placeholder="Search by name">
            <button>
              <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" type="submit">
                <!--! Font Awesome Pro 6.1.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. -->
                <path d="M500.3 443.7l-119.7-119.7c27.22-40.41 40.65-90.9 33.46-144.7C401.8 87.79 326.8 13.32 235.2 1.723C99.01-15.51-15.51 99.01 1.724 235.2c11.6 91.64 86.08 166.7 177.6 178.9c53.8 7.189 104.3-6.236 144.7-33.46l119.7 119.7c15.62 15.62 40.95 15.62 56.57 0C515.9 484.7 515.9 459.3 500.3 443.7zM79.1 208c0-70.58 57.42-128 128-128s128 57.42 128 128c0 70.58-57.42 128-128 128S79.1 278.6 79.1 208z" />
              </svg>
            </button>
          </form>
        </div>
        <div class="buttons-header">
          <button id="glass-button">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
              <!--! Font Awesome Pro 6.1.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. -->
              <path d="M500.3 443.7l-119.7-119.7c27.22-40.41 40.65-90.9 33.46-144.7C401.8 87.79 326.8 13.32 235.2 1.723C99.01-15.51-15.51 99.01 1.724 235.2c11.6 91.64 86.08 166.7 177.6 178.9c53.8 7.189 104.3-6.236 144.7-33.46l119.7 119.7c15.62 15.62 40.95 15.62 56.57 0C515.9 484.7 515.9 459.3 500.3 443.7zM79.1 208c0-70.58 57.42-128 128-128s128 57.42 128 128c0 70.58-57.42 128-128 128S79.1 278.6 79.1 208z" />
            </svg>
          </button>
          <button id="add-photo">
            <span>Add a photo</span>
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
              <path d="M384 352v64c0 17.67-14.33 32-32 32H96c-17.67 0-32-14.33-32-32v-64c0-17.67-14.33-32-32-32s-32 14.33-32 32v64c0 53.02 42.98 96 96 96h256c53.02 0 96-42.98 96-96v-64c0-17.67-14.33-32-32-32S384 334.3 384 352zM201.4 9.375l-128 128c-12.51 12.51-12.49 32.76 0 45.25c12.5 12.5 32.75 12.5 45.25 0L192 109.3V320c0 17.69 14.31 32 32 32s32-14.31 32-32V109.3l73.38 73.38c12.5 12.5 32.75 12.5 45.25 0s12.5-32.75 0-45.25l-128-128C234.1-3.125 213.9-3.125 201.4 9.375z" />
            </svg>
          </button>
        </div>
      </div>
    </div>
  </header>

  <main>
    <div class="container">
      <div class="container-grid">
      </div>
    </div>
  </main>

  <!-- ADD IMG -->
  <aside id='cadastro'>
    <div class="container-aviso">
      <div class="container-form">
        <h3>Add new photo</h3>
        <form action="cadastrar.php" method="POST">
          <label for="">Label</label>
          <input type="text" placeholder="Suspendisse elit massa" id="description" required>
          <label for="">Photo URL</label>
          <input type="text" id="url" placeholder="https://s1.1zoom.me/big0/815/Sunrises_and_sunsets_Hands_Sun_571948_1280x918.jpg" required>
          <div class="buttons">
            <button class="cancel" type="reset">Cancel</button>
            <button type="submit" class="submit">Submit</button>
          </div>
        </form>
      </div>
    </div>
  </aside>

  <!-- AUTENTICAR -->
  <aside id='autenticar'>
    <div class="container-aviso">
      <div class="container-form">
        <form action="#" method="post">
          <h3>Are you sure ?</h3>
          <label for="password">Password</label>
          <input type="password" id="password" placeholder="************" required>
          <p class="error">the wrong password!</p>
          <div class="buttons">
            <button class="cancel" type="reset">Cancel</button>
            <button type="submit" class="submit" style="background: #eb5757;">Ok</button>
          </div>
        </form>
      </div>
    </div>
  </aside>

  <!-- RETORNO -->
  <aside id="loading">
    <div class="container-aviso">
      <img src="imagens/loading.gif" alt="GIF de Carregamento!">
    </div>
  </aside>
</body>
<!-- SEARCH -->
<aside id="search">
  <div class="container-aviso">
    <div class="container-search">
      <form>
        <h3>Search by name !</h3>
        <input type="text" placeholder="type here..." required>
        <div class="buttons-search">
          <button class="icon-x cancel" type="reset">X</button>
          <button class="icon-s" type="submit">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
              <!--! Font Awesome Pro 6.1.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. -->
              <path d="M500.3 443.7l-119.7-119.7c27.22-40.41 40.65-90.9 33.46-144.7C401.8 87.79 326.8 13.32 235.2 1.723C99.01-15.51-15.51 99.01 1.724 235.2c11.6 91.64 86.08 166.7 177.6 178.9c53.8 7.189 104.3-6.236 144.7-33.46l119.7 119.7c15.62 15.62 40.95 15.62 56.57 0C515.9 484.7 515.9 459.3 500.3 443.7zM79.1 208c0-70.58 57.42-128 128-128s128 57.42 128 128c0 70.58-57.42 128-128 128S79.1 278.6 79.1 208z" />
            </svg>
          </button>
        </div>
      </form>
    </div>
  </div>
</aside>

</html>