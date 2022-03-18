<?php
    include_once 'includes/header.php';

    if (isset($_POST['author_id'], $_POST['title'], $_POST['brand'], $_POST['con'], $_POST['price'], $_POST['body'])) {
        deletePost($conn, [
              'id' => $_GET['id'],
              'author_id' => $_POST['author_id'],
              'title' => $_POST['title'],
              'brand' => $_POST['brand'],
              'con' => $_POST['con'],
              'price' => $_POST['price'],
              'body' => $_POST['body'],
          ]);
      }

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
                   <li> <a href="./logout.php"> Sign out</a> </li>
                   <li> <a href="./admin.php"> <i class="fas fa-user-circle"></i> </a>  </li>
                </ul>
             </div>
     </nav>
      
    </header>


    <section class="mt-10 overflow-hidden text-gray-700">

        <h1 class="font-bold text-2xl lg:ml-20 sm:ml-10"> All records</h1>
        
        <?php if (isset($_GET['id'])): ?>
                <a class=" lg:ml-20 sm:ml-10" href="edit.php?id=<?= $_GET['id'] ?>">Update post</a>
            <?php else: ?>
                <a class=" lg:ml-20 sm:ml-10" href="add.php">Create a new post</a>
            <?php endif; ?>

        <div class="container px-5 py-2 mx-auto lg:pt-12 lg:px-32">
        <div class="flex flex-wrap -m-1 md:-m-2">
      
            
            <?php foreach ($posts as $post): ?>
        <div class="flex flex-wrap w-1/3 mb-5">  
        <div class="flex justify-center">
        <form action="records.php" method="POST">
            <div class="rounded-lg shadow-lg bg-white max-w-xs">
            <a href="#!">
                <img class="rounded-t-lg" src="https://mdbootstrap.com/img/new/standard/nature/184.jpg" alt=""/>
            </a>
            <div class="p-6">
                <h5 class="text-gray-900 text-xl font-medium mb-2"><a href="/eRevive?id=<?= $post->id ?>"><h3><?= $post->title ?></h3></a></h5>
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
                type="submit"
                class=" inline-block px-6 py-2.5 bg-blue-600 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-blue-700 hover:shadow-lg focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out">
                <a href="delete.php?id=<?= $post->id ?>">Delete</a>
               </button>
                 </div>
            </div>
        </form>
            </div>
        </div>
        <?php endforeach; ?>

     
      </div> 
    </div>
    </section>

    <script src="https://cdn.jsdelivr.net/npm/tw-elements/dist/js/index.min.js"></script>

</body>
</html>
