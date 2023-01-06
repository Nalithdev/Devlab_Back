<?php

require_once 'Connection.php';

session_start();

if (!isset($_SESSION['user']) || $_SESSION['user'] === '') {
    header('Location: login.php');
}

require 'doctype.template.php';
require 'Header.template.php';


?>

    <div class="h-full block text-white w-full xl:flex">
    <div class=" w-full h-auto xl:w-1/4 xl:h-screen xl:fixed flex flex-col text-center p-[1.5rem] bg-slate-800 pt-20">
        <iconify-icon icon="iconoir:profile-circled" class="justify-center flex text-[150px]"></iconify-icon>
        <?php
        echo '<h1>' . $_SESSION['user']['pseudo'] . ' ' . '</h1>';
        echo '<h3>' . $_SESSION['user']['email'] . ' ' . '</h3>';
        ?>
    </div>
        <div class="block pt-20 xl:ml-[25%]">

        <div class="pb-[20px] items-center flex flex-col w-full ">
            <h2>Dernier Visionnage</h2>
            <section class=" block xl:flex gap-5 items-center  see_area  m-auto xl:m-0 ">
<?php
$query = new Connection();
$lastsee = $query->GMovieS($_SESSION['id']);
echo '<script>  var listMovPop </script>';
foreach ($lastsee as $movie) {

    echo "<script> 
    var filmvue = '';
    
        filmvue = " . implode('' ,$movie). ";
        
        
                        listMovPop = fetch('https://api.themoviedb.org/3/movie/'+ filmvue +'?api_key=512f0783bae246658f714cd1abc41513&language=en-US')
    console . log('listMovPop')
    
    listMovPop . then(function (response) {
        return response . json();
    }) . then(function (data) {
        console . log(data);
        let div = document . createElement('div')
        div . innerHTML = `<div class=' w-[250px] p-6 flex flex-col items-center  m-auto xl:m-0 '><h2 class='text-[0.8rem]'>". '${data.original_title}'. "</h2><img class='w-[100px] h-[150px]' src='https://image.tmdb.org/t/p/original".'${data . poster_path}'."'></div>
        `
        document . querySelector('.see_area') . appendChild(div)
        


    });

                </script > ";
                }



                ?>

            </section>
            <a href="album.php?names=see">
        </div>


        <div class="pb-[20px] items-center flex flex-col w-full ">
            <h2>Film à voir</h2></a>

            <section class=" block xl:flex gap-[25px] items-center m-auto  xl:-m-0 dream_area  flex-wrap">
                <?php
                $query = new Connection();
                $lastsee = $query->GMovieD($_SESSION['id']);
                echo '<script>  var listMovPop </script>';
                foreach ($lastsee as $movie) {

                    echo "<script> 
    var filmvue = '';
    
        filmvue = " . implode('' ,$movie). ";
        
        
                        listMovPop = fetch('https://api.themoviedb.org/3/movie/'+ filmvue +'?api_key=512f0783bae246658f714cd1abc41513&language=en-US')
    console . log('listMovPop')
    
    listMovPop . then(function (response) {
        return response . json();
    }) . then(function (data) {
        console . log(data);
        let div = document . createElement('div')
        div . innerHTML = `<div class=' w-[250px] flex flex-col items-center  '><h2 class='text-[0.8rem]'>'". '${data.original_title}'. ".'</h2><img class='w-[100px] h-[150px]' src='https://image.tmdb.org/t/p/original".'${data . poster_path}'."'></div>
        `
        document . querySelector('.dream_area') . appendChild(div)
        


    });

                </script > ";
                }



                ?>

            </section>
            <a href="album.php?names=dream">Voir Plus</a>

        </div>

        <div class="pb-4 ">
            <h2>Mes Albums</h2>
        </div>
        <div class="pb-4">
            <h2>Album liker</h2>
            <section class="flex flex-wrap gap-[25px]  wrap">
            </section>

        </div>

    </div>
</div>
