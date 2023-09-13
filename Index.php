<!DOCTYPE html>
<head>
<link rel="stylesheet" href="firstpage.css">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
</head>
<style>
    body {
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
    margin: 0;
    padding: 0;
  }
  .col {
    display: flex;
    flex-direction: column;
    align-items: center;
  }
  .col button {
    margin-bottom: 10px;
  } 
    .body-background {
      background-image: url('https://images.pexels.com/photos/1432679/pexels-photo-1432679.jpeg');
      background-repeat: no-repeat;
  background-size: cover;
    }
    .btn {
      margin: 10px;
      padding: 20px 50px;
      font-size: 24px;
      background-color: #007bff;
      color: #fff;
      border-radius: 5px;
      cursor: pointer;
      transition: transform 0.3s;
    }
    .btn:hover {
      transform: scale(1.1);
    }
.button {
  margin: 0;
  height: auto;
  background: transparent;
  padding: 0;
  border: none;
}
.button:hover .hover-text {
  width: 100%;
  filter: drop-shadow(0 0 23px var(--animation-color))
}
</style>
<body  class="body-background" style="font-family:Garamond;">
<div class="container main">
<div class="container">
    <div class="row">
        <p class="text-center" style="font-size:3rem;">Infanion  </p>
        <p class="text-center" style="font-size:3rem;"> Inventory Management  </p>
    </div>
</div>
<div class="col"> 
<!-- <a href="{{route('dashboard.index')}}" class="button" target="_parent">
                    <span class="actual-text">&nbsp;Welcome&nbsp;</span>
                    <span class="hover-text" aria-hidden="true">&nbsp;Welcome&nbsp;</span>
            </a> -->
    <a href="adminlog.php"><button class="btn btn-primary">Admin</button></a> 
    <a href="employeelog.php"><button class="btn btn-primary">Employee</button></a>
    <a href="HRlog.php"><button class="btn btn-primary">HR</button></a>
</div>
</div>
</body>
</html>

