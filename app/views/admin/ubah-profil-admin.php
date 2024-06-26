<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Master Cook</title>
    <link href="../master-cook/public/dist/output.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100..900&family=Montserrat:ital,wght@0,100..900;1,100..900&family=Open+Sans:ital,wght@0,300..800;1,300..800&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">

</head>
<body class="font-roboto">
    <!-- nav -->
    <?php $baseurl = '/master-cook/' ?>

    <header class="sticky inset-0 z-50 border-b border-slate-100 bg-white/80 backdrop-blur-lg">
        <nav class="mx-auto flex max-w-6xl gap-8 px-6 transition-all duration-200 ease-in-out lg:px-12 py-4">
            <div class="relative flex items-center">
                <h1 class="justify-center text-3xl font-bold text-light-logo cursor-pointer">MASTER COOK</h1>
            </div>
            <ul class="hidden items-center justify-center gap-6 md:flex">
                <li class="pt-1.5 font-dm text-sm font-normal text-slate-900">
                    <a href="<?=$baseurl . 'admin-dashboard'?>">Dashboard</a>
                </li>
                <li class="pt-1.5 font-dm text-sm font-normal text-slate-900">
                    <a href="<?=$baseurl . 'admin-data-akun'?>">Data Akun</a>
                </li>    
                <li class="pt-1.5 font-dm text-sm font-normal text-slate-900">
                    <a href="<?=$baseurl . 'admin-verifikasi-akun'?>">Verifikasi Akun</a>
                </li>           
            </ul>
            <div class="flex-grow"></div>
            <a href="<?=$baseurl . 'admin-profil'?>" class="hidden items-center justify-center gap-10 md:flex">
                <img src="./image/user1.svg" alt="" class="w-full h-[50%]">
            </a>
        </nav>
    </header>
    <!-- end -->

    <div class="bg-white p-4 flex justify-center">
        <div class="max-w-6xl text-center">
            <img src="./image/profil.svg" alt="" class="mx-auto w-3/5">
        </div>
    </div>

    <div class="flex space-x-4 justify-center ">
        <div class="bg-white overflow-hidden shadow rounded-lg ">           
        <form action="<?=$baseurl . 'admin-edit-profil'?>" method="POST" class="px-4 py-2">
                <div class="justify-between items-center flex">
                    <label class="block text-sm font-normal leading-5  text-black">Nama</label>
                    <div class="mt-1 relative rounded-md">
                        <input id="nama" name="nama" type="text" value="<?=$user['nama']?>" class="appearance-none block w-full px-3 py-2 rounded-md placeholder-gray-400 focus:outline-none transition duration-150 ease-in-out sm:text-sm sm:leading-5">
                    </div>
                </div>
                <div class="justify-between mt-5 items-center flex">
                    <label class="block text-sm font-normal leading-5  text-black">Username</label>
                    <div class="mt-1 relative rounded-md">
                        <input id="username" name="username" value="<?=$user['username']?>" type="text" class="appearance-none block w-full px-3 py-2 rounded-md placeholder-gray-400 focus:outline-none transition duration-150 ease-in-out sm:text-sm sm:leading-5">
                    </div>
                </div>

                <div class="justify-between mt-5 items-center flex">
                    <label class="block text-sm font-normal leading-5  text-black">No Telepon</label>
                    <div class="mt-1 relative rounded-md">
                        <input id="telp" name="telp" type="number" value="<?=$user['no_telp']?>" class="appearance-none block w-full px-3 py-2 rounded-md placeholder-gray-400 focus:outline-none transition duration-150 ease-in-out sm:text-sm sm:leading-5">
                    </div>
                </div>

                <div class="justify-between mt-5 items-center flex">
                    <label class="block text-sm font-normal leading-5  text-black">Password</label>
                    <div class="mt-1 relative rounded-md">
                        <input id="text" name="password" value="<?=$user['password']?>" type="text" class="appearance-none block w-full px-3 py-2 rounded-md placeholder-gray-400 focus:outline-none transition duration-150 ease-in-out sm:text-sm sm:leading-5">
                    </div>
                </div> 
                <div class="py-3 px-2 flex justify-end">
                    <button type="submit"
                        class="mr-3 text-sm bg-light-logo hover:bg-blue-900 text-white py-1 px-4 rounded-full focus:outline-none focus:shadow-outline">Simpan</button>
                    <a href="<?=$baseurl . 'admin-profil'?>"
                        class="text-sm bg-red-500 hover:bg-red-700 text-white py-1 px-4 rounded-full focus:outline-none focus:shadow-outline ">Batal</a>
                </div>
            </form>
        </div>
    </div>
        
    <!-- footer -->
    <div class=" rounded-lg w-full bg-gray-100 text-center items-end absolute inset-x-0 bottom-0">
        <h1 class="py-6 text-base font-normal text-gray-400 text-center ">© 2024 CookingMaster. All rights reserved.</h1>
    </div>
    
         
</body>
</html>