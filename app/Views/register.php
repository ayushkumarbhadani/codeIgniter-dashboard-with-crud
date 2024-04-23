<!-- app/Views/register.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Registration</title>
    <link rel="stylesheet" href="<?= base_url() ?>css/style.css" />
</head>
<body>
    <div class="flex min-h-full flex-col justify-center px-6 py-12 lg:px-8">
        <div class="sm:mx-auto sm:w-full sm:max-w-sm">
            <h2 class="mt-10 text-center text-2xl font-bold leading-9 tracking-tight text-gray-900">Create new account</h2>
        </div>

        <div class="mt-10 sm:mx-auto sm:w-full sm:max-w-sm border p-5 rounded-md">
            <form class="space-y-6" action="<?= base_url('register') ?>" method="POST">
                <div>
                    <label for="username" class="block text-sm font-medium leading-6 text-gray-900">Username</label>
                    <div class="mt-2">
                        <input id="username" name="username" type="text" autocomplete="off" required
                            class="block w-full rounded-md border-0 p-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                    </div>
                </div>

                <div>
                    <label for="email" class="block text-sm font-medium leading-6 text-gray-900">Email address</label>
                    <div class="mt-2">
                        <input id="email" name="email" type="email" autocomplete="email" required
                            class="block w-full rounded-md border-0 p-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                    </div>
                </div>

                <div>
                    <label for="password" class="block text-sm font-medium leading-6 text-gray-900">Password</label>
                    <div class="mt-2">
                        <input id="password" name="password" type="password" autocomplete="current-password" required
                            class="block w-full rounded-md border-0 p-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                    </div>
                </div>

                <div class="text-sm font-medium leading-6 text-red-500 text-center">
                    <?php if (session()->getFlashdata('error')): ?>
                        <div><?= session()->getFlashdata('error') ?></div>
                    <?php endif; ?>
                </div>

                <div>
                    <button type="submit"
                        class="flex w-full justify-center rounded-md bg-indigo-600 px-3 p-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Register</button>
                </div>
            </form>
            <div class="flex items-center justify-center">
                <a class="p-5 font-semibold text-indigo-600 hover:text-indigo-500" href="/">Already a Member? Login Now!</a>
            </div>
        </div>
    </div>

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
</body>
</html>


    