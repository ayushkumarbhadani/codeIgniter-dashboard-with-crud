<!-- app/Views/register.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="<?= base_url() ?>css/style.css"/>
</head>
<body>

    <main class="">
        <nav class="bg-gray-800 flex items-center p-5 gap-5 justify-between text-white text-sm">
            <button onclick="toggleSidebar()" data-drawer-target="default-sidebar" data-drawer-toggle="default-sidebar" aria-controls="default-sidebar" type="button" 
                class="p-2 inline-flex items-center text-sm text-gray-500 rounded-lg hover:bg-gray-100 focus:outline-none dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600">
                <svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" viewBox="0 0 20 20" fill="none">
                    <path fill="currentColor" fill-rule="evenodd" d="M19 4a1 1 0 01-1 1H2a1 1 0 010-2h16a1 1 0 011 1zm0 6a1 1 0 01-1 1H2a1 1 0 110-2h16a1 1 0 011 1zm-1 7a1 1 0 100-2H2a1 1 0 100 2h16z"/>
                </svg>
            </button>
            <span class="">Hi <?= $user['username'] ?>👋</span>
        </nav>
        <aside id="default-sidebar" class="absolute top-0 -left-full z-50 w-64 h-screen transition-all ease-in-out duration-300" aria-label="Sidebar">
            <div class="h-full px-3 py-4 overflow-y-auto bg-gray-50 dark:bg-gray-800 flex flex-col justify-between">
                <ul class="space-y-2 font-medium">
                    <li>
                        <a href="/dashboard" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-200 dark:hover:bg-gray-700 group">
                        <svg class="w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 21">
                            <path d="M16.975 11H10V4.025a1 1 0 0 0-1.066-.998 8.5 8.5 0 1 0 9.039 9.039.999.999 0 0 0-1-1.066h.002Z"/>
                            <path d="M12.5 0c-.157 0-.311.01-.565.027A1 1 0 0 0 11 1.02V10h8.975a1 1 0 0 0 1-.935c.013-.188.028-.374.028-.565A8.51 8.51 0 0 0 12.5 0Z"/>
                        </svg>
                        <span class="ms-3">Dashboard</span>
                        </a>
                    </li>
                </ul>
                <ul class="space-y-2 font-medium">
                    <li>
                        <a href="<?= base_url('logout') ?>" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-red-100 dark:hover:bg-gray-700 hover:text-red-500  group">
                        <svg class="w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-red-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 512 512"><path d="M502.6 278.6c12.5-12.5 12.5-32.8 0-45.3l-128-128c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3L402.7 224 192 224c-17.7 0-32 14.3-32 32s14.3 32 32 32l210.7 0-73.4 73.4c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0l128-128zM160 96c17.7 0 32-14.3 32-32s-14.3-32-32-32L96 32C43 32 0 75 0 128L0 384c0 53 43 96 96 96l64 0c17.7 0 32-14.3 32-32s-14.3-32-32-32l-64 0c-17.7 0-32-14.3-32-32l0-256c0-17.7 14.3-32 32-32l64 0z"/></svg>
                        <span class="ms-3">Logout</span>
                        </a>
                    </li>
                </ul>
            </div>
            <button onclick="toggleSidebar()" aria-label="Close Sidebar" class="h-10 w-10 flex items-center justify-center absolute top-5 -right-12 p-2 text-sm text-gray-500 rounded-lg bg-gray-900 hover:bg-gray-100 focus:outline-none">
                <svg xmlns="http://www.w3.org/2000/svg" widht="24px" height="24px" fill="currentColor" viewBox="0 0 384 512"><path d="M342.6 150.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L192 210.7 86.6 105.4c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3L146.7 256 41.4 361.4c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0L192 301.3 297.4 406.6c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3L237.3 256 342.6 150.6z"/></svg>
            </button>
        </aside>
        <div>
            <?php if($user['role']==='admin'){ ?>
            <div>
                <form class="flex items-center justify-end p-5 space-x-2" action="<?= current_url() ?>" method="GET">
                    <input id="username" name="search" type="text" autocomplete="off" value="<?php echo $search?>" placeholder="Search Username" required
                        class="block rounded-md border-0 p-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                    <div>
                        <button type="submit"
                            class="flex w-full justify-center items-center gap-2 rounded-md bg-indigo-600 px-3 p-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-indigo-700 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                            <svg class="w-4 h-4 text-white transition duration-75" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 512 512"><!--!Font Awesome Free 6.5.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path d="M416 208c0 45.9-14.9 88.3-40 122.7L502.6 457.4c12.5 12.5 12.5 32.8 0 45.3s-32.8 12.5-45.3 0L330.7 376c-34.4 25.2-76.8 40-122.7 40C93.1 416 0 322.9 0 208S93.1 0 208 0S416 93.1 416 208zM208 352a144 144 0 1 0 0-288 144 144 0 1 0 0 288z"/></svg>
                            <span>Search</span>
                        </button>
                    </div>
                </form>
                <?php if(isset($search)){?>
                <div class="text-sm px-5 py-2 space-x-2">
                    <span>Search result for: "<?php echo $search; ?>"</span>
                    <a href="<?php echo current_url(); ?>" class="text-indigo-500 hover:text-indigo-700">Clear Search</a>
                </div>
                <?php } ?>
            </div>
            <?php } ?>
            <div class="relative overflow-x-auto">
                <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr class="">
                            <th scope="col" class="px-6 py-3">
                            <a href="?sortBy=username<?php echo isset($sortBy) && $sortBy === 'username' ?  ( isset($sortOrder) && $sortOrder === 'desc' ? '' : '&sortOrder=desc' ) : "";?>" class="group flex gap-2 items-center">
                                    <span>Username</span>
                                    <?php 
                                        if(isset($sortBy) && $sortBy === 'username' && (!isset($sortOrder))){
                                    ?>
                                            <svg xmlns="http://www.w3.org/2000/svg" class="opacity-0 transition-all ease-in-out duration-300 group-hover:opacity-100" color="currentColor" height="16px" width="16px" viewBox="0 0 320 512"><path d="M182.6 137.4c-12.5-12.5-32.8-12.5-45.3 0l-128 128c-9.2 9.2-11.9 22.9-6.9 34.9s16.6 19.8 29.6 19.8H288c12.9 0 24.6-7.8 29.6-19.8s2.2-25.7-6.9-34.9l-128-128z"/></svg>
                                    <?php
                                        }else{
                                    ?>
                                            <svg xmlns="http://www.w3.org/2000/svg" class="opacity-0 transition-all ease-in-out duration-300 group-hover:opacity-100" color="currentColor" height="16px" width="16px" viewBox="0 0 320 512">!Font Awesome Free 6.5.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.<path d="M137.4 374.6c12.5 12.5 32.8 12.5 45.3 0l128-128c9.2-9.2 11.9-22.9 6.9-34.9s-16.6-19.8-29.6-19.8L32 192c-12.9 0-24.6 7.8-29.6 19.8s-2.2 25.7 6.9 34.9l128 128z"/></svg>
                                    <?php
                                        }
                                    ?>
                                </a>
                            </th>
                            <th scope="col" class="px-6 py-3">
                                <a href="?sortBy=email<?php echo isset($sortBy) && $sortBy === 'email' ?  ( isset($sortOrder) && $sortOrder === 'desc' ? '' : '&sortOrder=desc' ) : "";?>" class="group flex gap-2 items-center">
                                    <span>Email</span>
                                    <?php 
                                        if(isset($sortBy) && $sortBy === 'email' && (!isset($sortOrder))){
                                    ?>
                                            <svg xmlns="http://www.w3.org/2000/svg" class="opacity-0 transition-all ease-in-out duration-300 group-hover:opacity-100" color="currentColor" height="16px" width="16px" viewBox="0 0 320 512"><path d="M182.6 137.4c-12.5-12.5-32.8-12.5-45.3 0l-128 128c-9.2 9.2-11.9 22.9-6.9 34.9s16.6 19.8 29.6 19.8H288c12.9 0 24.6-7.8 29.6-19.8s2.2-25.7-6.9-34.9l-128-128z"/></svg>
                                    <?php
                                        }else{
                                    ?>
                                            <svg xmlns="http://www.w3.org/2000/svg" class="opacity-0 transition-all ease-in-out duration-300 group-hover:opacity-100" color="currentColor" height="16px" width="16px" viewBox="0 0 320 512">!Font Awesome Free 6.5.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.<path d="M137.4 374.6c12.5 12.5 32.8 12.5 45.3 0l128-128c9.2-9.2 11.9-22.9 6.9-34.9s-16.6-19.8-29.6-19.8L32 192c-12.9 0-24.6 7.8-29.6 19.8s-2.2 25.7 6.9 34.9l128 128z"/></svg>
                                    <?php
                                        }
                                    ?>
                                </a>
                            </th>
                            <th scope="col" class="px-6 py-3">
                                <a href="?sortBy=role<?php echo isset($sortBy) && $sortBy === 'role' ?  ( isset($sortOrder) && $sortOrder === 'desc' ? '' : '&sortOrder=desc' ) : "";?>" class="group flex gap-2 items-center">
                                    <span>Role</span>
                                    <?php 
                                        if(isset($sortBy) && $sortBy === 'role' && (!isset($sortOrder))){
                                    ?>
                                            <svg xmlns="http://www.w3.org/2000/svg" class="opacity-0 transition-all ease-in-out duration-300 group-hover:opacity-100" color="currentColor" height="16px" width="16px" viewBox="0 0 320 512"><path d="M182.6 137.4c-12.5-12.5-32.8-12.5-45.3 0l-128 128c-9.2 9.2-11.9 22.9-6.9 34.9s16.6 19.8 29.6 19.8H288c12.9 0 24.6-7.8 29.6-19.8s2.2-25.7-6.9-34.9l-128-128z"/></svg>
                                    <?php
                                        }else{
                                    ?>
                                            <svg xmlns="http://www.w3.org/2000/svg" class="opacity-0 transition-all ease-in-out duration-300 group-hover:opacity-100" color="currentColor" height="16px" width="16px" viewBox="0 0 320 512">!Font Awesome Free 6.5.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.<path d="M137.4 374.6c12.5 12.5 32.8 12.5 45.3 0l128-128c9.2-9.2 11.9-22.9 6.9-34.9s-16.6-19.8-29.6-19.8L32 192c-12.9 0-24.6 7.8-29.6 19.8s-2.2 25.7 6.9 34.9l128 128z"/></svg>
                                    <?php
                                        }
                                    ?>
                                </a>
                            </th>
                            <?php if($user['role']==="admin"){ ?>
                            <th scope="col" class="px-6 py-3">
                                Status
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Action
                            </th>
                            <?php } ?>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($users as $userData): ?>
                            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    <?= $userData['username'] ?>
                                </th>
                                <td class="px-6 py-4">
                                    <?= $userData['email'] ?>
                                </td>
                                <td class="px-6 py-4">
                                    <?= $userData['role'] ?>
                                </td>
                                <?php if($user['role']==="admin"){ ?>
                                <td class="px-6 py-4">
                                    <?php 
                                        if($userData['is_active'] === '1'){
                                            echo "Active";
                                        }else if($userData['is_active'] === '0'){
                                            echo "Block";
                                        }
                                    ?>
                                </td>
                                <td class="px-6 py-4">
                                    <a href="<?= base_url("dashboard/edit/".$userData['id'])?>" class="text-indigo-500 w-fit p-2 rounded-md transition-colors ease-in-out duration-300 flex items-center gap-2 hover:bg-indigo-500 hover:text-white">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" width="14px" height="14px" viewBox="0 0 512 512"><!--!Font Awesome Free 6.5.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path d="M410.3 231l11.3-11.3-33.9-33.9-62.1-62.1L291.7 89.8l-11.3 11.3-22.6 22.6L58.6 322.9c-10.4 10.4-18 23.3-22.2 37.4L1 480.7c-2.5 8.4-.2 17.5 6.1 23.7s15.3 8.5 23.7 6.1l120.3-35.4c14.1-4.2 27-11.8 37.4-22.2L387.7 253.7 410.3 231zM160 399.4l-9.1 22.7c-4 3.1-8.5 5.4-13.3 6.9L59.4 452l23-78.1c1.4-4.9 3.8-9.4 6.9-13.3l22.7-9.1v32c0 8.8 7.2 16 16 16h32zM362.7 18.7L348.3 33.2 325.7 55.8 314.3 67.1l33.9 33.9 62.1 62.1 33.9 33.9 11.3-11.3 22.6-22.6 14.5-14.5c25-25 25-65.5 0-90.5L453.3 18.7c-25-25-65.5-25-90.5 0zm-47.4 168l-144 144c-6.2 6.2-16.4 6.2-22.6 0s-6.2-16.4 0-22.6l144-144c6.2-6.2 16.4-6.2 22.6 0s6.2 16.4 0 22.6z"/></svg>
                                        <span>Edit</span>
                                    </a>
                                </td>
                                <?php } ?>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
                <?php if(count($users)==0){ ?>
                    <div class="text-center p-5">No user found</div>
                <?php } ?>
            </div>
        </div>
    </main>
   

    <!-- popup messages -->
    <?php if (session()->getFlashdata('success')): ?>
        <div class="fixed p-2 md:right-2 max-md:bottom-2 md:top-2 max-md:w-full w-max box-border animate-fade-out">
            <div id="popup" class="rounded-md overflow-hidden bg-green-500 border border-green-600 text-white text-sm">
                <div class="px-2 py-2"><?= session()->getFlashdata('success') ?></div>
                <div class="bg-white h-1 w-full mt-1 origin-left animate-scale-x rounded-md"></div>
            </div>
        </div>
    <?php endif; ?>

    <?php if (session()->getFlashdata('error')): ?>
        <div class="fixed p-2 md:right-2 max-md:bottom-2 md:top-2 max-md:w-full w-max box-border animate-fade-out">
            <div id="popup" class="rounded-md overflow-hidden bg-red-500 border border-red-600 text-white text-sm">
                <div class="px-2 py-2"><?= session()->getFlashdata('error') ?></div>
                <div class="bg-white h-1 w-full mt-1 origin-left animate-scale-x rounded-md"></div>
            </div>
        </div>
    <?php endif; ?>




    <script>
        const toggleSidebar = ()=>{
            const sidebar = document.querySelector("#default-sidebar");
            if(sidebar.style.left === "0px"){
                sidebar.style.left="-100%";
            }else{
                sidebar.style.left="0px";
            }
        }

        document.addEventListener('DOMContentLoaded', () => {
            const popup = document.getElementById('popup');
            setTimeout(() => {
                popup?.remove();
            }, 5000);
        });
    </script>
</body>
</html>
