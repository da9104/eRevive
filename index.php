<?php
    include_once 'includes/header.php';

    $posts = getPosts($conn, $_GET['id'] ?? null);
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
                   <li> <a href="./login.php"> Sign in</a> </li>
                   <li> <a href="./admin.php"> <i class="fas fa-user-circle"></i> </a>  </li>
                </ul>
             </div>
     </nav>
      
    </header>

<section class="hero mt-5"> 
        <div
        id="carouselDarkVariant"
        class="carousel slide carousel-fade carousel-dark relative"
        data-bs-ride="carousel"
        >
        <!-- Indicators -->
        <div class="carousel-indicators absolute right-0 bottom-0 left-0 flex justify-center p-0 mb-4">
            <button
            data-bs-target="#carouselDarkVariant"
            data-bs-slide-to="0"
            class="active"
            aria-current="true"
            aria-label="Slide 1"
            ></button>
            <button
            data-bs-target="#carouselDarkVariant"
            data-bs-slide-to="1"
            aria-label="Slide 1"
            ></button>
            <button
            data-bs-target="#carouselDarkVariant"
            data-bs-slide-to="2"
            aria-label="Slide 1"
            ></button>
        </div>

        <!-- Inner -->
        <div class="carousel-inner relative w-full overflow-hidden">
            <!-- Single item -->
            <div class="carousel-item active relative float-left w-full h-96">
            <img
                src="./public/assets/images/maxim-hopman-8vn4KvfU640-unsplash.jpeg"
                class="block w-full object-cover h-96"
                alt="Motorbike Smoke"
            />
            <div class="carousel-caption hidden md:block absolute inline-block text-center flex items-center justify-center lg:p-20 md:p-6 lg:top-20 sm:top-20">
                <h5 class="text-xl lg:mt-10 text-white sm:mt-0">The new way to recycle</h5>
                <!-- <p>Some representative placeholder content for the first slide.</p> -->
            </div>
            </div>

            <!-- Single item -->
            <div class="carousel-item relative float-left w-full h-96">
            <img
                src="./public/assets/images/onur-binay-rvQmTjflcsE-unsplash.jpeg"
                class="block w-full object-cover h-96"
                alt="Mountaintop"
            />
            <div class="carousel-caption hidden md:block absolute inline-block text-center flex items-center justify-center lg:p-20 md:p-6 lg:top-20 sm:top-20">
                <h5 class="text-xl lg:mt-10 text-white sm:mt-0">Source of the digital upcycle</h5>
                <!-- <p>Some representative placeholder content for the second slide.</p> -->
            </div>
            </div>

            <!-- Single item -->
            <div class="carousel-item relative float-left w-full h-96">
            <img
                src="./public/assets/images/sergey-zolkin-_UeY8aTI6d0-unsplash.jpeg"
                class="block w-full object-cover h-96"
                alt="Woman Reading a Book"
            />
            <div class="carousel-caption hidden md:block absolute inline-block text-center flex items-center justify-center lg:p-20 md:p-6 lg:top-20 sm:top-20">
                <h5 class="text-xl lg:mt-10 text-white sm:mt-0">Solution of digital source reuse.</h5>
                <!-- <p>Some representative placeholder content for the third slide.</p> -->
            </div>
            </div>
        </div>
        <!-- Inner -->

        <!-- Controls -->
        <button
            class="carousel-control-prev absolute top-0 bottom-0 flex items-center justify-center p-0 text-center border-0 hover:outline-none hover:no-underline focus:outline-none focus:no-underline left-0"
            type="button"
            data-bs-target="#carouselDarkVariant"
            data-bs-slide="prev"
        >
            <span class="carousel-control-prev-icon inline-block bg-no-repeat" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button
            class="carousel-control-next absolute top-0 bottom-0 flex items-center justify-center p-0 text-center border-0 hover:outline-none hover:no-underline focus:outline-none focus:no-underline right-0"
            type="button"
            data-bs-target="#carouselDarkVariant"
            data-bs-slide="next"
        >
            <span class="carousel-control-next-icon inline-block bg-no-repeat" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
        </div>
</section>

<section class="mt-10 overflow-hidden text-gray-700">

    <h1 class="font-bold text-2xl lg:ml-20 sm:ml-10"> Recently added</h1>

    <div class="container px-5 py-2 mx-auto lg:pt-12 lg:px-32">
        <div class="flex flex-wrap -m-1 md:-m-2">
 
        <?php foreach ($posts as $post): ?>
        <div class="flex flex-wrap w-1/3 mb-5">  
        <div class="flex justify-center">
            <div class="rounded-lg shadow-lg bg-white max-w-xs">
            <a href="#!">
                <img class="rounded-t-lg" src="https://mdbootstrap.com/img/new/standard/nature/184.jpg" alt=""/>
            </a>
            <div class="p-6">
                <h5 class="text-gray-900 text-xl font-medium mb-2"><a href="/?id=<?= $post->id ?>"><h3><?= $post->title ?></h3></a></h5>
                <p class="text-gray-700 text-base mb-4">
                <?= $post->body ?> <br />
              
                </p>
                 <p class="text-gray-700 text-base mb-4">
                     Created by: 
                <?php
                    $user = getUserWithId($conn, $post->author_id);
                ?>
                  <span><?= $user->first_name ?></span>
                  </p>
                <button 
                type="button" 
                class=" inline-block px-6 py-2.5 bg-blue-600 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-blue-700 hover:shadow-lg focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out">
                <a href="/?id=<?= $post->id ?>">view</a>
                 </button>
            </div>
          </div>
            </div>
        </div>
        <?php endforeach; ?>
           
        </div> 
     </div>


     <h1 class="mt-10 font-bold text-2xl lg:ml-20 sm:ml-10"> Feature items</h1>

     <div class="container px-5 py-2 mx-auto lg:pt-12 lg:px-32">
         <div class="flex flex-wrap -m-1 md:-m-2">
         
         <?php foreach ($posts as $post): ?>
        <div class="flex flex-wrap w-1/3 mb-5">  
        <div class="flex justify-center">
            <div class="rounded-lg shadow-lg bg-white max-w-xs">
            <a href="#!">
                <img class="rounded-t-lg" src="https://mdbootstrap.com/img/new/standard/nature/184.jpg" alt=""/>
            </a>
            <div class="p-6">
                <h5 class="text-gray-900 text-xl font-medium mb-2"><a href="/?id=<?= $post->id ?>"><h3><?= $post->title ?></h3></a></h5>
                <p class="text-gray-700 text-base mb-4">
                <?= $post->body ?> <br />
              
                </p>
                 <p class="text-gray-700 text-base mb-4">
                     Created by: 
                <?php
                    $user = getUserWithId($conn, $post->author_id);
                ?>
                  <span><?= $user->first_name ?></span>
                  </p>
                  
                <button 
                type="button" 
                class=" inline-block px-6 py-2.5 bg-blue-600 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-blue-700 hover:shadow-lg focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out">
                <a href="/?id=<?= $post->id ?>">view</a>
                  </button>
            </div>
          </div>
            </div>
        </div>
        <?php endforeach; ?>
        
         </div> 
      </div>

</section>

    <script src="https://cdn.jsdelivr.net/npm/tw-elements/dist/js/index.min.js"></script>

</body>
</html>