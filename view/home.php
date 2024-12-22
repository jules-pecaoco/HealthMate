<!DOCTYPE html>
<html lang="en" class="font-sans">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Home</title>

  <!-- iCON -->
  <link rel="icon" href="/healthmate/view/auth/images/hospital.png" type="image/x-icon">

  <!-- CSS -->
  <script src="https://cdn.tailwindcss.com"></script>

  <!-- Font -->
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">


  <!-- FontAwesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />



  <!-- Datatablse -->
  <link rel="stylesheet" href="https://cdn.datatables.net/2.1.8/css/dataTables.dataTables.css" />


  <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
  <!-- DataTables Core -->
  <script src="https://cdn.datatables.net/2.1.8/js/dataTables.js"></script>

  <!-- DataTables Buttons Extension -->
  <script src="https://cdn.datatables.net/buttons/3.2.0/js/dataTables.buttons.js"></script>
  <script src="https://cdn.datatables.net/buttons/3.2.0/js/buttons.dataTables.js"></script>

  <!-- Export Dependencies -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/pdfmake.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/vfs_fonts.js"></script>

  <!-- Buttons HTML5 and Print Extensions -->
  <script src="https://cdn.datatables.net/buttons/3.2.0/js/buttons.html5.min.js"></script>
  <script src="https://cdn.datatables.net/buttons/3.2.0/js/buttons.print.min.js"></script>

  <!-- Load SweetAlert2 first -->
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.15.2/dist/sweetalert2.all.min.js"></script>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.15.2/dist/sweetalert2.min.css">

</head>

<body class="font-sans bg-gray-50">
  <div class="h-dvh flex flex-row  w-dvw gap-x-4 font-sans">
    <?php include_once 'view/components/sidebar.php' ?>

    <div class="content w-full px-10 h-dvh overflow-hidden font-sans">
      <?php
      $routes = [
        'home' => 'view/components/dashboard.php',
        'home/dashboard' => 'view/components/dashboard.php',

        'home/nutriplanner' => 'view/components/nutriplanner.php',
        'home/searchfood' => 'view/components/tables/nutriplanner/searchfood.php',
        'home/nutrifood' => 'view/components/tables/nutriplanner/nutrifood.php',

        'home/nutrimed' => 'view/components/nutrimed.php',
        'home/addmed' => 'view/components/tables/nutrimed/addmed.php',
        'home/updatemed' => 'view/components/tables/nutrimed/updatemed.php',
        'home/deletemed' => 'view/components/tables/nutrimed/deletemed.php',

        'home/profile' => 'view/components/profile.php',
      ];

      // Get the route from the query string
      $route = $_GET['route'] ?? 'home/dashboard';

      // Check if the route exists in the array
      if (array_key_exists($route, $routes)) {
        include_once $routes[$route];
      } else {
        // Handle undefined routes (optional)
        include_once 'view/components/404.php'; // A custom 404 page or fallback
      }
      ?>

    </div>
  </div>

</body>

</html>