<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Master Cook</title>
    <link href="/public/dist/output.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100..900&family=Montserrat:ital,wght@0,100..900;1,100..900&family=Open+Sans:ital,wght@0,300..800;1,300..800&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">

</head>
<body class="font-roboto">
    
    <div class="min-h-screen bg-gray-50 flex flex-col justify-center py-12 sm:px-6 lg:px-8">
        <div class="sm:mx-auto sm:w-full sm:max-w-md">
            <h2 class="text-center text-3xl leading-9 font-semibold uppercase text-light-logo">
                cook master
            </h2>
        </div>
    
        <div class="mt-2 sm:mx-auto sm:w-full sm:max-w-md">
            <div class="bg-white py-6 px-4 shadow-xl sm:rounded-lg sm:px-10">
                <form method="POST" action="#">
                    <h1 class="text-center text-2xl font-semibold mb-4">Register</h1>
                    <div>
                        <label class="block text-sm font-normal leading-5  text-black">Nama</label>
                        <div class="mt-1 relative rounded-md shadow-sm">
                            <input id="nama" name="nama" type="text" class="appearance-none block w-full px-3 py-2 border border-black rounded-md placeholder-gray-400 focus:outline-none focus:shadow-outline-blue focus:border-blue-300 transition duration-150 ease-in-out sm:text-sm sm:leading-5">
                        </div>
                    </div>

                    <div class="mt-6">
                        <label class="block text-sm font-normal leading-5  text-black">Username</label>
                        <div class="mt-1 relative rounded-md shadow-sm">
                            <input id="username" name="username" type="text" class="appearance-none block w-full px-3 py-2 border border-black rounded-md placeholder-gray-400 focus:outline-none focus:shadow-outline-blue focus:border-blue-300 transition duration-150 ease-in-out sm:text-sm sm:leading-5">
                        </div>
                    </div>

                    <div class="mt-6">
                        <label class="block text-sm font-normal leading-5  text-black">No Telp</label>
                        <div class="mt-1 relative rounded-md shadow-sm">
                            <input id="telp" name="telp" type="number" class="appearance-none block w-full px-3 py-2 border border-black rounded-md placeholder-gray-400 focus:outline-none focus:shadow-outline-blue focus:border-blue-300 transition duration-150 ease-in-out sm:text-sm sm:leading-5">
                        </div>
                    </div>

                    <div class="mt-6">
                        <label class="block text-sm font-normal leading-5  text-black">Password</label>
                        <div class="mt-1 relative rounded-md shadow-sm">
                            <input id="password" name="password" type="password" class="appearance-none block w-full px-3 py-2 border border-black rounded-md placeholder-gray-400 focus:outline-none focus:shadow-outline-blue focus:border-blue-300 transition duration-150 ease-in-out sm:text-sm sm:leading-5">
                        </div>
                    </div> 
    
                    <div class="mt-6">
                        <span class="block w-full shadow-sm">
                            <button type="submit" class="w-full flex justify-center py-2 px-4 border border-transparent text-base font-medium rounded-full text-white bg-light-logo hover:bg-blue-900 focus:outline-none focus:border-indigo-700 focus:shadow-outline-indigo active:bg-indigo-700 transition duration-150 ease-in-out">
                            Submit
                            </button>
                        </span>
                    </div>
                    <div class="mt-6 text-end">
                        <p class="text-light-logo text-sm font-semibold cursor-pointer">Have Account</p>
                    </div> 
                </form>
    
            </div>
        </div>
        
    </div>

    <!-- footer -->
    <div class="rounded-lg w-full py-6 bg-gray-100 text-center">
        <h1 class=" text-base font-normal text-gray-400 text-center">© 2024 CookingMaster. All rights reserved.</h1>
    </div>

</body>
</html>