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
<?php $baseurl = '/master-cook/' ?>

    <!-- navbar start-->
    <header class="sticky inset-0 z-50 border-b border-slate-100 bg-white/80 backdrop-blur-lg">
        <nav class="mx-auto flex max-w-6xl gap-8 px-6 transition-all duration-200 ease-in-out lg:px-12 py-4">
            <div class="relative flex items-center">
                <h1 class="justify-center text-3xl font-bold text-light-logo cursor-pointer">MASTER COOK</h1>
            </div>
            <ul class="hidden items-center justify-center gap-6 md:flex">
            <li class="pt-1.5 font-dm text-sm font-semibold text-slate-900">
                    <a href="#">Dashboard</a>
                </li>
                <li class="pt-1.5 font-dm text-sm  text-slate-900">
                    <a href="<?=$baseurl . 'chef-kelas-memasak'?>">Kelas Memasak</a>
                </li>       
                         
            </ul>
            <div class="flex-grow"></div>
            <a href="<?=$baseurl . 'chef-profil'?>" class="hidden items-center justify-center gap-10 md:flex">
                <img src="./image/user1.svg" alt="" class="w-full h-[50%]">
            </a>
        </nav>
    </header>
    <!-- navbar end -->

    <!-- hero start -->
    <div>
        <img src="./image/hero1.png" alt="" class="w-full pt-4">
    </div>

    <!-- card start -->
    <section class="py-20 bg-gray-100">
        <div class="container mx-auto">
            <div class="rounded-lg w-full py-12 px-4 bg-white flex justify-between gap-x-6">
                <h1 class=" text-4xl font-semibold text-gray-800">Kelas Memasakmu</h1>
                <button class="py-2.5 px-8 rounded-full text-sm font-medium bg-light-logo text-white hover:bg-blue-900">Tambah Kelas</button>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-10 pt-8">
            <?php foreach ($kelas_masaks as $kelas_masak): ?>
                <div class="bg-gray-100 rounded-lg overflow-hidden flex items-center justify-between flex-col">
                    <div class="flex justify-between items-center flex-col min-w-30%">
                    <img src="./image/card1.png" alt="" class="w-full object-cover mb-4">
                    <h3 class="text-lg font-semibold text-light-logo mb-2 text-center"><?= $kelas_masak['judul'];?></h3>
                    <p class="text-black text-base text-center"><?= $kelas_masak['ringkasan'];?></p>
                    </div>
                    <div class="mt-4 w-full flex items-center justify-between">
                        <div>
                            <h1 class="text-xs text-gray-700 font-normal"><?= $kelas_masak['tanggal'];?></h1>
                            <h1 class="text-xs text-gray-700 font-normal"><?= $kelas_masak['lokasi'];?></h1>
                        </div>
                        
                        <button
                            class="px-6 py-1 bg-light-logo text-white text-sm font-normal rounded-full hover:bg-blue-900 transition duration-200">
                            Daftar
                        </button>                   
                    </div>                      
                </div>
                <?php endforeach; ?>                                    
            </div>
        </div>
    </section>
    <!-- card end -->

    <!-- Chart start-->
    <h1 class="text-center text-2xl font-semibold mx-auto pt-8">Kelas Populer</h1>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <div class="font-sans leading-normal tracking-normal mt-20">

        <canvas id="myChart"></canvas>

        <script>
            var datas = <?=$chart_kelas_masak?>;
            let jumlahs = datas.map((data) => {
                return data['jumlah'];
            });
            let juduls = datas.map((data) => {
                return data['judul'];
            });
            var ctx = document.getElementById('myChart').getContext('2d');
            var myChart = new Chart(ctx, {
                type: 'pie',
                data: {
                    labels: juduls,
                    datasets: [{
                        data: jumlahs,
                        backgroundColor: [
                            'rgba(255, 99, 132, 0.7)',
                            'rgba(54, 162, 235, 0.7)',
                            'rgba(255, 206, 86, 0.7)'
                        ],
                        borderColor: [
                            'rgba(255, 99, 132, 1)',
                            'rgba(54, 162, 235, 1)',
                            'rgba(255, 206, 86, 1)'
                        ],
                        borderWidth: 1
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    legend: {
                        position: 'bottom',
                        labels: {
                            fontColor: 'black',
                            fontSize: 14,
                            padding: 20
                        }
                    }
                }
            });
        </script>

    </div>

    <!-- Chart End -->

    <!-- Footer start-->
    <section class="py-20 bg-white">
        <div class="grid grid-cols-1 gap-x-6 gap-y-4 px-10">
            <div class="rounded-3xl w-full h-[10rem] flex flex-col justify-center items-center bg-gray-100 text-center relative">
                <img src="./image/Vector.png" alt="" class="right-0 w-[25%] absolute z-10 h-full">
                <h1 class="text-center text-2xl font-semibold text-light-logo">Cooking Master</h1>
            </div>
            <div class="rounded-lg w-full py-6 bg-gray-100 text-center">
                <div class="flex items-center gap-6 justify-center relative">
                    <h1 class=" text-base font-normal text-gray-400 text-center">© 2024 CookingMaster. All rights reserved.</h1>
                    <div class="absolute top-1/2 flex gap-4 -translate-y-1/2 left-10">
                        <a href="#"
                            class="border border-gray-300 p-2 rounded-full aspect-square text-gray-700 transition-all duration-500 hover:text-indigo-600 hover:border-indigo-600 focus-within:outline-0 focus-within:text-indigo-600 focus-within:border-indigo-600">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 72 72" fill="none">
                            <path
                                d="M46.4927 38.6403L47.7973 30.3588H39.7611V24.9759C39.7611 22.7114 40.883 20.4987 44.4706 20.4987H48.1756V13.4465C46.018 13.1028 43.8378 12.9168 41.6527 12.8901C35.0385 12.8901 30.7204 16.8626 30.7204 24.0442V30.3588H23.3887V38.6403H30.7204V58.671H39.7611V38.6403H46.4927Z"
                                fill="currentColor"/>
                            </svg>
                        </a>
    
                        <a href="#"
                        class="border border-gray-300 p-2 rounded-full aspect-square text-gray-700 transition-all duration-500 hover:text-indigo-600 hover:border-indigo-600 focus-within:outline-0 focus-within:text-indigo-600 focus-within:border-indigo-600">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none">
                            <path
                            d="M7.7117 9.93956C7.7117 8.66117 8.76298 7.62456 10.0601 7.62456C11.3573 7.62456 12.4092 8.66117 12.4092 9.93956C12.4092 11.218 11.3573 12.2546 10.0601 12.2546C8.76298 12.2546 7.7117 11.218 7.7117 9.93956ZM6.44187 9.93956C6.44187 11.909 8.06177 13.5055 10.0601 13.5055C12.0585 13.5055 13.6784 11.909 13.6784 9.93956C13.6784 7.97012 12.0585 6.37367 10.0601 6.37367C8.06177 6.37367 6.44187 7.97012 6.44187 9.93956ZM12.9761 6.23228C12.976 6.3971 13.0256 6.55824 13.1184 6.69532C13.2113 6.83239 13.3433 6.93926 13.4978 7.00239C13.6523 7.06552 13.8223 7.08209 13.9863 7.05C14.1503 7.01791 14.301 6.93861 14.4193 6.82211C14.5377 6.70561 14.6182 6.55716 14.6509 6.39552C14.6836 6.23388 14.667 6.06632 14.603 5.91402C14.5391 5.76173 14.4307 5.63153 14.2917 5.53991C14.1527 5.44829 13.9893 5.39935 13.822 5.39928H13.8217C13.5975 5.39939 13.3825 5.48717 13.224 5.64336C13.0654 5.79954 12.9763 6.01136 12.9761 6.23228ZM7.21337 15.5922C6.52637 15.5613 6.15296 15.4486 5.90481 15.3533C5.57583 15.2271 5.3411 15.0767 5.0943 14.8338C4.8475 14.591 4.69474 14.3598 4.56722 14.0356C4.47049 13.7912 4.35605 13.4231 4.32482 12.746C4.29066 12.014 4.28384 11.7941 4.28384 9.93962C4.28384 8.08512 4.29123 7.86584 4.32482 7.13323C4.35611 6.45617 4.47139 6.08878 4.56722 5.84362C4.6953 5.51939 4.84784 5.28806 5.0943 5.04484C5.34076 4.80162 5.57526 4.65106 5.90481 4.5254C6.15285 4.43006 6.52637 4.31728 7.21337 4.28651C7.95613 4.25284 8.17925 4.24612 10.0601 4.24612C11.9411 4.24612 12.1644 4.25339 12.9078 4.28651C13.5948 4.31734 13.9676 4.43095 14.2163 4.5254C14.5453 4.65106 14.7801 4.80195 15.0268 5.04484C15.2736 5.28773 15.4258 5.51939 15.5539 5.84362C15.6507 6.08806 15.7651 6.45617 15.7963 7.13323C15.8305 7.86584 15.8373 8.08512 15.8373 9.93962C15.8373 11.7941 15.8305 12.0134 15.7963 12.746C15.765 13.4231 15.65 13.7911 15.5539 14.0356C15.4258 14.3598 15.2733 14.5912 15.0268 14.8338C14.7804 15.0765 14.5453 15.2271 14.2163 15.3533C13.9683 15.4486 13.5948 15.5614 12.9078 15.5922C12.165 15.6258 11.9419 15.6326 10.0601 15.6326C8.1784 15.6326 7.9559 15.6258 7.21337 15.5922ZM7.15503 3.03717C6.40489 3.07084 5.8923 3.18806 5.44465 3.35973C4.98105 3.53701 4.58859 3.77484 4.19641 4.16073C3.80423 4.54662 3.56352 4.93401 3.38364 5.39089C3.20945 5.83234 3.09051 6.33723 3.05635 7.07651C3.02162 7.81695 3.01367 8.05367 3.01367 9.93956C3.01367 11.8255 3.02162 12.0622 3.05635 12.8026C3.09051 13.542 3.20945 14.0468 3.38364 14.4882C3.56352 14.9448 3.80429 15.3327 4.19641 15.7184C4.58853 16.1041 4.98105 16.3416 5.44465 16.5194C5.89314 16.6911 6.40489 16.8083 7.15503 16.842C7.90675 16.8756 8.14655 16.884 10.0601 16.884C11.9737 16.884 12.2139 16.8762 12.9653 16.842C13.7155 16.8083 14.2277 16.6911 14.6756 16.5194C15.139 16.3416 15.5317 16.1043 15.9239 15.7184C16.3161 15.3325 16.5563 14.9448 16.7367 14.4882C16.9108 14.0468 17.0304 13.5419 17.064 12.8026C17.0981 12.0616 17.1061 11.8255 17.1061 9.93956C17.1061 8.05367 17.0981 7.81695 17.064 7.07651C17.0298 6.33717 16.9108 5.83206 16.7367 5.39089C16.5563 4.93428 16.3154 4.54723 15.9239 4.16073C15.5323 3.77423 15.139 3.53701 14.6762 3.35973C14.2277 3.18806 13.7154 3.07028 12.9658 3.03717C12.2145 3.00351 11.9743 2.99512 10.0607 2.99512C8.14712 2.99512 7.90675 3.00295 7.15503 3.03717Z"
                            fill="currentColor" />
                        </svg>
                        </a>
                    
                        <a href="#"
                        class="border border-gray-300 p-2 rounded-full aspect-square text-gray-700 transition-all duration-500 hover:text-indigo-600 hover:border-indigo-600 focus-within:outline-0 focus-within:text-indigo-600 focus-within:border-indigo-600">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none">
                            <path fill-rule="evenodd" clip-rule="evenodd"
                            d="M15.9329 5.13919C16.5667 5.31036 17.0648 5.80978 17.2332 6.44286C17.5396 7.59178 17.5396 9.99044 17.5396 9.99044C17.5396 9.99044 17.5396 12.3891 17.2332 13.538C17.0625 14.1734 16.5643 14.6729 15.9329 14.8417C14.7869 15.1489 10.1889 15.1489 10.1889 15.1489C10.1889 15.1489 5.5932 15.1489 4.44487 14.8417C3.81106 14.6705 3.3129 14.1711 3.14451 13.538C2.83813 12.3891 2.83813 9.99044 2.83813 9.99044C2.83813 9.99044 2.83813 7.59178 3.14451 6.44286C3.31524 5.80744 3.8134 5.30801 4.44487 5.13919C5.5932 4.83203 10.1889 4.83203 10.1889 4.83203C10.1889 4.83203 14.7869 4.83203 15.9329 5.13919ZM12.5393 9.99044L8.72007 12.2015V7.77936L12.5393 9.99044Z"
                            fill="currentColor" />
                        </svg>
                        </a>
                    </div>                 
                </div>                
            </div>            
        </div>
    </section>




</body>
</html>