<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>ABCD FREE TEST CMS</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="../public/css/bootstrap.min.css" rel="stylesheet">
    <link href="../public/css/site.css" rel="stylesheet">
</head>
<body>

<nav class="navbar navbar-default navbar-fixed-top">
  <div class="container">
    <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="#"><b>ABCD</b> by Mohamad Ravaei </a>
    </div>

    
       
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li><a href="./index.php">Home</a></li>
        <?php if(adminCheck()) :?>
          <li><a href="./admin.php">Dashboard</a></li>
        <?php endif; ?>
        <?php if(adminCheck()) :?>
          <li><a href="./register.php">User registeration</a></li>
        <?php endif; ?>
        <?php if(adminCheck()) :?>
          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Tests<span class="caret"></span></a>
            <ul class="dropdown-menu">
              <li><a href="./createTest.php">Create test</a></li>
              <li><a href="./testsList.php">Tests list</a></li>
              <li role="separator" class="divider"></li>
              <li><a href="#">Help</a></li>
            </ul>
          </li>
        <?php endif; ?>
        <?php if(authCheck()) :?>
          <li class="visible-xs"><a href="./logout.php">Logout</a></li>
        <?php endif; ?>
        <?php if(!authCheck()) :?>
          <li class="visible-xs"><a href="./login.php">Login</a></li>
        <?php endif; ?>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <?php if(authCheck()) :?>
          <li class="hidden-xs  navbar-right"><button class="btn btn-danger navbar-btn" onclick="location.href='./logout.php'">Logout</button></li>
        <?php endif; ?>
        <?php if(!authCheck()) :?>
          <li class="hidden-xs  navbar-right"><button class="btn btn-warning navbar-btn" onclick="location.href='./login.php'">Login</button></li>
        <?php endif; ?>
      </ul>
    </div>
    
  </div>
  
</nav>
<br/>
<br/>
<br/>
<br/>
    