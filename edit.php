<?php
include_once 'includes/header.php';

if (isset($_POST['author_id'], $_POST['title'], $_POST['brand'], $_POST['con'], $_POST['price'], $_POST['body'])) {
  updatePost($conn, [
        'id' => $_GET['id'],
        'author_id' => $_POST['author_id'],
        'title' => $_POST['title'],
        'brand' => $_POST['brand'],
        'con' => $_POST['con'],
        'price' => $_POST['price'],
        'body' => $_POST['body'],
    ]);
}
$post = getPostWithId($conn, $_GET['id'] ?? null);
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
      <div class="flex flex-col justify-center items-center h-full g-6 text-gray-800">
        <h1 class="font-bold text-2xl mb-10">Edit Product</h1>
        <div class="md:w-8/12 lg:w-5/12 lg:ml-0 xl:w-96">
            <form action="/edit.php?id=<?= $_GET['id'] ?>" method="post">
              <div class="form-group mb-6">
              <select name="author_id" id="author_id">
                  <?php foreach ($users as $user): ?>
                      <option value="<?= $user->id ?>"<?= $post->author_id == $user->id ? ' selected' : '' ?>>
                          <?= $user->first_name ?>
                      </option>
                  <?php endforeach; ?>
              </select>
                <input type="text" name="title" class="form-control block
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
                  focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" id="exampleInput7"
                  placeholder="Title"
                  value="<?= $post->title ?>"
                  >
              </div>
              <div class="form-group mb-6">
                <input type="text" name="brand" class="form-control block
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
                  focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" id="exampleInput8"
                  placeholder="Brand"
                  value="<?= $post->brand ?>"
                  >
              </div>
              <div class="form-group mb-6">
                <input type="text" name="con" class="form-control block
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
                  focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" id="exampleInput8"
                  placeholder="Condition"
                  value="<?= $post->con ?>"
                  >
              </div>
              <div class="form-group mb-6">
                <input type="text" name="price" class="form-control block
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
                  focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" id="exampleInput8"
                  placeholder="Price"
                  value="<?= $post->price ?>"
                  >
              </div>
              <div class="form-group mb-6">
                <textarea
                name="body"
                class="
                  form-control
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
                  focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none
                "
                id="exampleFormControlTextarea13"
                rows="3"
                placeholder="Description"
              >
              <?= $post->body ?>
            </textarea>
              </div>
              
              <button type="submit" class="
                w-full
                px-6
                py-2.5
                bg-blue-600
                text-white
                font-medium
                text-xs
                leading-tight
                uppercase
                rounded
                shadow-md
                hover:bg-blue-700 hover:shadow-lg
                focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0
                active:bg-blue-800 active:shadow-lg
                transition
                duration-150
                ease-in-out">Submit</button>
            </form>

        </div>
      </div>
    </div>
  </section>


  <script src="https://cdn.jsdelivr.net/npm/tw-elements/dist/js/index.min.js"></script>

</body>
</html>