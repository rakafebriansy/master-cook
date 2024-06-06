<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Master Cook</title>
    <link href="./public/dist/output.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100..900&family=Montserrat:ital,wght@0,100..900;1,100..900&family=Open+Sans:ital,wght@0,300..800;1,300..800&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">

</head>
<?php $base = '/master-cook/' ?>
<body class="font-roboto ">

    <!-- main -->
    <div class="bg-white px-2 py-10 justify-center">
        <div class="mx-auto max-w-6xl">
            <h2 class="text-center font-display text-3xl uppercase font-bold tracking-tight text-slate-900 md:text-4xl">
                Cook Master
            <h1 class="text-base text-center pt-8">Silahkan masuk sesuai akun anda !</h1>
            <ul class="mt-16 grid grid-cols-1 gap-8 text-center text-slate-700 md:grid-cols-3 items-center">

                <li class="rounded-xl bg-white w-[20rem] h-[14rem] p-3 flex items-center justify-center flex-col shadow-lg cursor-pointer"> 
                    <a href="<?=$base . 'pengguna-register'?>" class="block">
                        <img src="./image/member.svg" alt="" class="mx-auto h-10 w-10">
                        <h3 class="my-3 font-display font-medium">Member</h3>
                        <p>Member adalah seseorang yang ingin belajar memasak</p>                    
                    </a>     
                </li>
                <li class="rounded-xl bg-white w-[20rem] h-[14rem] p-3 flex items-center justify-center flex-col shadow-lg cursor-pointer">
                    <a href="<?=$base . 'chef-register'?>" class="block">
                        <img src="./image/admin.svg"
                                alt="" class="mx-auto h-10 w-10">
                        <h3 class="my-3 font-display font-medium">Chef</h3>
                        <p class="">Chef harus memiliki sertifikasi memasak khusus</p>
                    </a>       
                </li>     
                
                <li class="rounded-xl bg-white w-[20rem] h-[14rem] p-3 flex items-center justify-center flex-col shadow-lg cursor-pointer">
                    <a href="<?=$base . 'admin-register'?>" class="block">
                        <img src="./image/admin.svg" alt="" class="mx-auto h-10 w-10">
                        <h3 class="my-3 font-display font-medium">Admin</h3> 
                        <p>Admin hanya bisa diakses oleh orang-orang khusus</p> 
                    </a>
                </li> 
            </ul>
        </div>
        <!-- footer -->
        <div class="rounded-lg w-full py-6 bg-gray-100 justify-end absolute inset-x-0 bottom-0">
            <h1 class=" text-base font-normal text-gray-400 text-center">© 2024 CookingMaster. All rights reserved.</h1>
        </div>
    </div>
<script src="./public/dist/script.js"></script>
</body>
</html>