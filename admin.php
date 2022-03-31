<?php 
 include_once 'includes/header.php';
 if (!isset($_SESSION['current_session'])) header('Location: login.php'); 
//  $post = getPosts($conn, $_GET['id'] ?? null);
 $users = getUsers($conn);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   
    <title>eRevive</title>
    <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
    <script src="https://kit.fontawesome.com/93d605acff.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tw-elements/dist/css/index.min.css" />
    <script src="https://cdn.tailwindcss.com"></script>
        <script>
        tailwind.config = {
            theme: {
            extend: {
                fontFamily: {
                sans: ['Work Sans', 'sans-serif'],
                },
            }
            }
        }
        </script>

    <link rel="stylesheet" href="./style.css">

</head>
</head>
<body>


    <header>
        <nav>

              <h1 class="brand">
                <a href="./index.php">
                eRevive
                </a>
               </h1>     
      
               <div class="nav--search">
                   <form action="#" name="search">
                   <input type="search"  placeholder="&#xF002; Search on eRevive" style="font-family: Arial, 'FontAwesome'"/>
                   <button type="submit" value="Search"/><i class="fas fa-play"></i></button>
                   </form>
               </div>
          
             <div class="signin">
                <ul>
                   <li> <a href="./logout.php"> Sign out</a> </li>
                   <li> <a href="./admin.php"> <i class="fas fa-user-circle"></i> </a>  </li>
                </ul>
             </div>
     </nav>
      
    </header>

<section class="h-screen">
    <div class="container px-3 py-3 mt-20">
      <div class="flex flex-col justify-center items-center flex-wrap h-full g-6 text-gray-800">
        <h1 class="font-bold text-2xl mb-4">Dash Board</h1>
        <p class="text-center mb-5">
        <?php if (isset($_SESSION['current_session'])) : ?> 
        Welcome  <span> </span> 
        <?php endif ?>
           last logged in 1 February 2022
        </p>
        <div class="md:w-8/12 lg:w-5/12 lg:ml-5 xl:w-96">
            <!-- Submit button -->
            <a
            href="./add.php"
              class="text-center mb-3 inline-block px-7 py-3 bg-sky-500 text-white font-medium text-sm leading-snug uppercase rounded rounded-full shadow-md hover:bg-blue-700 hover:shadow-lg focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out w-full"
              data-mdb-ripple="true"
              data-mdb-ripple-color="light"
            >
             Add a record
             </a>
  
            <a
            href="./records.php"
            class="text-center mb-3 inline-block px-7 py-3 bg-sky-500 text-white font-medium text-sm leading-snug uppercase rounded rounded-full shadow-md hover:bg-blue-700 hover:shadow-lg focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out w-full"
            data-mdb-ripple="true"
            data-mdb-ripple-color="light"
          >
           Edit / Delete a record
          </a>

          <a
          href="./records.php"
          class="text-center mb-3 inline-block px-7 py-3 bg-sky-500 text-white font-medium text-sm leading-snug uppercase rounded rounded-full shadow-md hover:bg-blue-700 hover:shadow-lg focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out w-full"
          data-mdb-ripple="true"
          data-mdb-ripple-color="light"
        >
        View a record
        </a>
         
        <p class="text-center mt-12"> Forgotten Password?<b><a href="#">  Update password</a> </b></p>


        </div>
      </div>
    </div>
  </section>


  <script src="https://cdn.jsdelivr.net/npm/tw-elements/dist/js/index.min.js"></script>

</body>
</html>