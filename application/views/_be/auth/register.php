<body class="login">
        <div class="container sm:px-10">
            <div class="block xl:grid grid-cols-2 gap-4">
                <!-- BEGIN: Register Info -->
                <div class="hidden xl:flex flex-col min-h-screen">

                    <div class="my-auto">
                        <img alt="Midone Tailwind HTML Admin Template" class="-intro-x w-1/2 -mt-16" src=" <?= base_url('assets/midone/') ?>dist/images/illustration.svg">
                        <div class="-intro-x text-white font-medium text-4xl leading-tight mt-10">
                            A few more clicks to 
                            <br>
                            sign up to your account.
                        </div>
                        <div class="-intro-x mt-5 text-lg text-white">Manage all your e-commerce accounts in one place</div>
                    </div>
                </div>
                <!-- END: Register Info -->
                <!-- BEGIN: Register Form -->
                <div class="h-screen xl:h-auto flex py-5 xl:py-0 my-10 xl:my-0">
                    <div class="my-auto mx-auto xl:ml-20 bg-white xl:bg-transparent px-5 sm:px-8 py-8 xl:p-0 rounded-md shadow-md xl:shadow-none w-full sm:w-3/4 lg:w-2/4 xl:w-auto">
                        <h2 class="intro-x font-bold text-2xl xl:text-3xl text-center xl:text-left">
                            Sign Up
                        </h2>
                        <?php if($this->session->flashdata('message')) {
                            echo $this->session->flashdata('message');
                        } ?>
                        <form action="<?= base_url('Auth/signUp') ?>" method="post">
                        <div class="intro-x mt-2 text-gray-500 xl:hidden text-center">A few more clicks to sign in to your account. Manage all your e-commerce accounts in one place</div>
                        <div class="intro-x mt-8">
                            <input type="text" name="name" class="intro-x login__input input input--lg border border-gray-300 block" placeholder="Name">
                            <?= form_error('name', '<div class="text-theme-6 mt-2">','</div>') ?>
                            <input type="text" name="username" class="intro-x login__input input input--lg border border-gray-300 block mt-4" placeholder="Username">
                            <?= form_error('username', '<div class="text-theme-6 mt-2">','</div>') ?>
                            <input type="password" name="password" class="intro-x login__input input input--lg border border-gray-300 block mt-4" placeholder="Password">
                            <?= form_error('password', '<div class="text-theme-6 mt-2">','</div>') ?>
                            <input type="password" name="pasconf" class="intro-x login__input input input--lg border border-gray-300 block mt-4" placeholder="Password Confirmation">
                        </div>

                        <div class="intro-x mt-5 xl:mt-8 text-center xl:text-left">
                            <button type="submit" class="button button--lg w-full xl:w-32 text-white bg-theme-1 xl:mr-3">Register</button>
                            <a href="<?= base_url('Auth') ?>" class="button button--lg w-full xl:w-32 text-gray-700 border border-gray-300 mt-3 xl:mt-0">Sign in</a>
                        </div>
                        </form>
                    </div>
                </div>
                <!-- END: Register Form -->
            </div>
        </div>
</body>