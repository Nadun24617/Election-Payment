<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <title>Welcome</title>
    <head>
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.1/css/bootstrap.min.css">
      <link rel="stylesheet" href="https://unicons.iconscout.com/release/v2.1.9/css/unicons.css">
      <style>
        body{
            background: url('images/background.jpg')rgba(0,0,0,0.3);
            background-blend-mode: multiply;
            background-position: center;
            background-size: cover;
            background-repeat: no-repeat;
        }
      </style>
    </head>
<body class="vh-100 overflow-hidden">
    <header>
        <?php include_once('components/header.php'); ?>
    </header>
    <section>
        <div class="card" style="width: 18rem;">
            <img src="..." class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title">Card title</h5>
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                <a href="#" class="btn btn-primary">Go somewhere</a>
            </div>
        </div>
    </section>
    <footer>
        <?php include_once('components/footer.php'); ?>
    </footer>
</body>
</html>
