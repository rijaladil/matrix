<!DOCTYPE html>
<html >
  <head>
    <meta charset="UTF-8">
    <title>SIMAMI</title>
      
        <link rel="stylesheet" href="css/style.css">
</head>
  <body>
    <span href="localhost/matrix" class="button" id="toggle-login">SIMAMI</span>
    <div id="login">
  <div id="triangle"></div>
  <h1>Log in</h1>
  <form action="login.php" method="post">
    <p>
      <input type="email"  name="email" placeholder="email" />
      <input type="password" name="pass_user" placeholder="password" />
	  <!--<select  type="category" name="category" placeholder="category" onchange="MM_jumpMenu('parent',this,0)">
		<option selected="selected">pilih user</option>
		<option>ADMINISTRATOR</option>
		<option>USER</option>
		</select> -->
      <input type="submit" name="Login"  value="Proses" />
    </p>
    <p align="center"><em>
   <!-- <a href="daftar.php">daftar</a></em></p> -->
  </form>
</div>
    <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>

        <script src="js/index.js"></script>
      
   
  </body>
</html>
