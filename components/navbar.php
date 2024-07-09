<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Election - Matale</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- Poppins Font -->
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
  <!-- Custom CSS -->
  <style>
    /* Custom navbar styles */
    .navbar-custom {
      background-color: #731A07; /* Dark red background */
      height: 80px; /* Adjust height as needed */
      padding: 0 20px; /* Add padding to navbar */
      box-shadow: 0 2px 4px rgba(0,0,0,0.1); /* Optional: Box shadow for a subtle lift */
      font-family: 'Poppins', sans-serif; /* Apply Poppins font */
    }
    .navbar-custom .navbar-brand {
      font-size: 1.5rem; /* Larger font size for brand */
      font-weight: bold; /* Bold font weight for emphasis */
      color: white; /* White font color */
    }
    .navbar-custom .navbar-nav .nav-link {
      color: white; /* White font color */
      margin-right: 20px; /* Margin between navbar links */
      position: relative; /* Ensure relative positioning */
      transition: color 0.3s ease; /* Smooth transition for color changes */
      font-weight: 500; /* Medium font weight */
      text-decoration: none; /* Remove default underline */
    }
    .navbar-custom .navbar-nav .nav-link::after {
      content: ''; /* Empty content for pseudo-element */
      position: absolute; /* Absolute positioning for the underline */
      width: 0; /* Initial width of underline */
      height: 2px; /* Height of underline */
      background-color: white; /* Yellow color for underline */
      bottom: -2px; /* Position the underline just below the link */
      left: 50%; /* Position the underline in the center */
      transform: translateX(-50%); /* Adjust for center alignment */
      transition: width 0.3s ease; /* Smooth transition for width changes */
    }
    .navbar-custom .navbar-nav .nav-link:hover::after {
      width: 100%; /* Expand the underline to full width */
    }
    .navbar-custom .navbar-nav .nav-link.active {
      font-weight: 600; /* Bold font weight for active link */
    }
  </style>
</head>
<body>
  <nav class="navbar navbar-expand-lg navbar-light navbar-custom">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">Election - Matale</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="#">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">About</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Contact</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Sign in</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <!-- Bootstrap Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
