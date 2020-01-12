<nav class="navbar is-fixed-top is-black" role="navigation" aria-label="main navigation">

  <div class="navbar-brand">
    <a class="navbar-item has-text-weight-bold is-size-5 coop load-me" href="./"><i class="fas fa-md fa-code"></i>&nbsp;&nbsp;Code-Ops</a>
    <a role="button" class="navbar-burger" aria-label="menu" aria-expanded="false">
      <span aria-hidden="true"></span>
      <span aria-hidden="true"></span>
      <span aria-hidden="true"></span>
    </a>
  </div>

  <div class="navbar-menu">

    <div class="navbar-start">
    </div>

    <div class="navbar-end">
      <a class='navbar-item has-text-weight-bold load-me' href="./"><i class="fas fa-md fa-home"></i>&nbsp;&nbsp;Home</a>
      <a class='navbar-item has-text-weight-bold load-me' href="./members.php"><i class="fas fa-md fa-users"></i>&nbsp;&nbsp;Members</a>
      <a class='navbar-item has-text-weight-bold load-me' href="./contact.php"><i class="fas fa-md fa-envelope"></i>&nbsp;&nbsp;Contact</a>
      <a class="navbar-item has-text-weight-bold load-me" href="https://github.com/Code-Operative"><i class="fab fa-md fa-github"></i>&nbsp;&nbsp;Github</a>
      <a class="navbar-item has-text-weight-bold load-me" href="https://twitter.com/code_operative"><i class="fab fa-md fa-twitter"></i>&nbsp;&nbsp;Twitter</a>
      <?php if (is_logged_in()) {
        echo "
        <a class='navbar-item has-text-weight-bold load-me' href='./dash.php'><i class='fas fa-md fa-cogs'></i>&nbsp;&nbsp;Dash</a>
        <a class='navbar-item has-text-weight-bold load-me' href='./logout.php'><i class='fas fa-md fa-sign-out-alt'></i>&nbsp;&nbsp;Logout</a>
        ";
      } ?>
    </div>

  </div>

</nav>
