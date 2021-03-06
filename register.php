<?php 
 include_once 'includes/header.php';
if (isset($_POST) && count($_POST) > 0) {
        $Response = Signup($_POST);
  }
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
                   <li> <a href="./login.php"> Sign in</a> </li>
                   <li> <a href="./admin.php"> <i class="fas fa-user-circle"></i> </a>  </li>
                </ul>
             </div>
     </nav>
      
    </header>

<section class="h-screen">
    <div class="container px-3 py-3 mt-20">
      <div class="flex flex-col justify-center items-center flex-wrap h-full g-6 text-gray-800">
        <h1 class="font-bold text-2xl mb-10">Create account</h1>

        <?php if (isset($Response['error'])): ?>
          
             <div class="alert alert-danger alert-dismissable mb-3"><b>Oops</b>, <?php echo $Response['error']; ?></div>

       <?php endif; ?>


        <div class="md:w-8/12 lg:w-5/12 lg:ml-0">
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" id="signup" name="signup">
            <div class="flex flex-col justify-center items-center">

              <div class="form-floating mb-3 xl:w-96">
                  <input type="email" 
                  id="username" name="email"
                  class="form-control
                  block
                  w-full
                  px-3
                  py-1.5
                  text-base
                  font-normal
                  text-gray-700
                  bg-white bg-clip-padding
                  border border-solid border-gray-300
                  rounded
                  transition
                  ease-in-out
                  m-0
                  focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" id="floatingInput" placeholder="name@example.com">
                  <label for="floatingInput" class="text-gray-700">Email address</label>
                </div>

                <div class="form-floating mb-3 xl:w-96">
                  <input type="password" 
                  id="password" name="password"
                  class="form-control
                  block
                  w-full
                  px-3
                  py-1.5
                  text-base
                  font-normal
                  text-gray-700
                  bg-white bg-clip-padding
                  border border-solid border-gray-300
                  rounded
                  transition
                  ease-in-out
                  m-0
                  focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" id="floatingPassword" placeholder="Password">
                  <label for="floatingPassword" class="text-gray-700">Password</label>
                </div>

                <div class="form-floating mb-3 xl:w-96"> <!--first name-->
                <input type="firstName" 
                name="first_name"
                class="form-control
                block
                w-full
                px-3
                py-1.5
                text-base
                font-normal
                text-gray-700
                bg-white bg-clip-padding
                border border-solid border-gray-300
                rounded
                transition
                ease-in-out
                m-0
                focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" id="floatingInput" placeholder="your first name">
                <label for="floatingInput" class="text-gray-700">First Name</label>
               </div> <!-- first name-->

               <div class="form-floating mb-3 xl:w-96"> <!--first name-->
                <input type="lastName" 
                name="last_name"
                class="form-control
                block
                w-full
                px-3
                py-1.5
                text-base
                font-normal
                text-gray-700
                bg-white bg-clip-padding
                border border-solid border-gray-300
                rounded
                transition
                ease-in-out
                m-0
                focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" id="floatingInput" placeholder="your last name">
                <label for="floatingInput" class="text-gray-700">Last Name</label>
               </div> <!-- first name-->

               <div class="mb-3 xl:w-96">
                  <button
                  type="submit"
                  class="inline-block px-3 py-3 bg-sky-500 text-white font-medium text-sm leading-snug uppercase rounded shadow-md hover:bg-blue-700 hover:shadow-lg focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out w-full"
                  data-mdb-ripple="true"
                  data-mdb-ripple-color="light"
                >
                  Create account
                </button>

                <div
                class="flex items-center my-4 before:flex-1 before:border-t before:border-gray-300 before:mt-0.5 after:flex-1 after:border-t after:border-gray-300 after:mt-0.5"
              >
                <p class="text-center font-semibold mx-4 mb-0">OR</p>
              </div>
    
              <p class="text-center"> Already have an account? <b><a href="./login.html"> Sign in</a> </b></p>
  

              </div>

              </div>
          </form>
        </div>
      </div>
    </div>
  </section>


  <script src="https://cdn.jsdelivr.net/npm/tw-elements/dist/js/index.min.js"></script>

</body>
</html>