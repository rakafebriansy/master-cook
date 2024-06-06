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
    <header class="sticky inset-0 z-50 border-b border-slate-100 bg-white/80 backdrop-blur-lg">
        <nav class="mx-auto flex max-w-6xl gap-8 px-6 transition-all duration-200 ease-in-out lg:px-12 py-4">
            <div class="relative flex items-center">
                <h1 class="justify-center text-3xl font-bold text-light-logo cursor-pointer">MASTER COOK</h1>
            </div>
            <ul class="hidden items-center justify-center gap-6 md:flex">
                <li class="pt-1.5 font-dm text-sm font-normal text-slate-900">
                    <a href="dashboard-admin.html">Dashboard</a>
                </li>
                <li class="pt-1.5 font-dm text-sm font-normal text-slate-900">
                    <a href="melihat-data-akun.html">Data Akun</a>
                </li>    
                <li class="pt-1.5 font-dm text-sm font-semibold text-slate-900">
                    <a href="verify-akun.html">verifikasi Akun</a>
                </li>           
            </ul>
            <div class="flex-grow"></div>
            <div class="hidden items-center justify-center gap-10 md:flex">
                <img src="/image/user1.svg" alt="" class="w-full h-[50%]">
            </div>
        </nav>
    </header>

    <!-- main -->
    <div class="bg-white px-2 py-20">
        <div class="mx-auto max-w-6xl ">
            <h2 class="text-center font-display text-3xl uppercase font-bold tracking-tight text-slate-900 md:text-4xl">
                Cook Master
            </h2>
            <div class="shadow-lg rounded-lg overflow-hidden mx-4 md:mx-10 my-20">
                <table class="w-full table-fixed items-center">
                    <thead>
                        <tr class="bg-gray-100">
                            <th class="w-1/4 py-4 px-6 text-left text-black font-normal text-sm">No</th>
                            <th class="w-1/4 py-4 px-6 text-left text-black font-normal text-sm">Nama</th>
                            <th class="w-1/4 py-4 px-6 text-left text-black font-normal text-sm">Username</th>
                            <th class="w-1/4 py-4 px-6 text-left text-black font-normal text-sm">No Telp</th>
                            <th class="w-1/4 py-4 px-6 text-left text-black font-normal text-sm">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white">
                        <tr>
                            <td class="py-4 px-6 text-sm font-normal">1</td>
                            <td class="py-4 px-6 text-sm truncate font-normal">Arnold Pramono</td>
                            <td class="py-4 px-6 text-sm font-normal">@arnold_pram</td>
                            <td class="py-4 px-6 text-sm font-normal">083527336112</td>
                            <td class="py-4 px-6 flex ">
                                <button type="button"
                                    class="mr-3 text-sm bg-green-600 hover:bg-green-700 text-white py-1 px-4 rounded-full focus:outline-none focus:shadow-outline">Verify</button>
                                <button type="button"
                                    class="text-sm bg-red-500 hover:bg-red-700 text-white py-1 px-4 rounded-full focus:outline-none focus:shadow-outline">hapus</button>
                            </td>
                            
                        </tr>
                    </tbody>
                </table>
            </div>

        </div>
        <!-- footer -->
        <div class="rounded-lg w-full py-6 bg-gray-100 justify-end absolute inset-x-0 bottom-0">
            <h1 class=" text-base font-normal text-gray-400 text-center">© 2024 CookingMaster. All rights reserved.</h1>
        </div>
       
    </div>

    
    

</body>
</html>