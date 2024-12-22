<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>HealthMate Register</title>

  <link rel="icon" href="view/auth/images/hospital.png" type="image/x-icon">


  <!-- Load SweetAlert2 first -->
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.15.2/dist/sweetalert2.all.min.js"></script>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.15.2/dist/sweetalert2.min.css">

  <!-- Load Tailwind CSS after SweetAlert2 -->
  <script src="https://cdn.tailwindcss.com"></script>
</head>



<body>
  <!--
  Heads up! 👋

  Plugins:
    - @tailwindcss/forms
-->

  <section class="bg-white  ">
    <div class="lg:grid lg:min-h-screen lg:grid-cols-12">
      <aside class="relative block h-16 lg:order-last lg:col-span-5 lg:h-full xl:col-span-6">
        <img
          alt=""
          src="view/auth/images/cahms.jpg"
          class="absolute inset-0 h-full w-full object-cover" />
      </aside>

      <main
        class="flex items-center justify-center  lg:col-span-7  xl:col-span-6">
        <div class="max-w-xl lg:max-w-3xl">
          <a class="block text-blue-600" href="#">
            <span class="sr-only">Home</span>
            <img src="view/auth/images/hospital.png" alt="" class="size-20">
          </a>

          <h1 class="mt-6 text-2xl font-bold text-gray-900 sm:text-3xl md:text-4xl">
            Welcome to Healthmate
          </h1>

          <p class="mt-4 leading-relaxed text-gray-500">
            You healthcare companion. Register an account to get started.

          </p>

          <form method="post" class="mt-8 grid grid-cols-6 gap-6">
            <div class="col-span-6">
              <label for="FirstName" class="block text-sm font-medium text-gray-700">
                Full Name
              </label>

              <input
                required
                type="text"
                id="FirstName"
                name="name"
                class="mt-1 p-2 w-full rounded-md border-2 border-gray-200 bg-white text-sm h-10 text-gray-700 shadow-sm" />
            </div>


            <div class="col-span-6 sm:col-span-3">
              <label for="Email" class="block text-sm font-medium text-gray-700"> Email </label>

              <input
                required
                type="email"
                id="Email"
                name="email"
                class="mt-1 p-2 w-full rounded-md border-2 border-gray-200 bg-white text-sm h-10 text-gray-700 shadow-sm" />
            </div>

            <div class="col-span-6 sm:col-span-3">
              <label for="phone" class="block text-sm font-medium text-gray-700 "> Phone Number </label>

              <input
                required
                type="tel"
                id="phone"
                name="phone"
                class="mt-1 p-2 w-full rounded-md border-2 border-gray-200 bg-white text-sm h-10 text-gray-700 shadow-sm" />
            </div>


            <div class="col-span-6 ">
              <label for="Password" class="block text-sm font-medium text-gray-700"> Password </label>

              <input
                required
                type="password"
                id="Password"
                name="password"
                class="mt-1 p-2 w-full rounded-md border-2 border-gray-200 bg-white text-sm h-10 text-gray-700 shadow-sm" />
            </div>
            <div class="col-span-6 ">
              <label for="health_goals" class="block text-sm font-medium text-gray-700"> Health Goals </label>

              <textarea
                type="text"
                id="text"
                name="health_goal"
                class="mt-1 p-2 w-full rounded-md border-2 border-gray-200 bg-white text-sm h-10 text-gray-700 shadow-sm"></textarea>
            </div>


            <div class="col-span-6">
              <p class="text-sm text-gray-500">
                By creating an account, you agree to our
                <a href="" class="text-gray-700 underline"> terms and conditions </a>
                and
                <a href="" class="text-gray-700 underline">privacy policy</a>.
              </p>
            </div>

            <div class="col-span-6 sm:flex sm:items-center sm:gap-4">
              <button
                type="submit"
                class="inline-block shrink-0 rounded-md border  bg-pink-600 px-12 py-3 text-sm font-medium text-white transition hover:bg-transparent hover:text-pink-600 focus:outline-none focus:ring active:text-pink-500">
                Create an account
              </button>

              <p class="mt-4 text-sm text-gray-500 sm:mt-0">
                Already have an account?
                <a href="login" class="text-gray-700 underline">Log in</a>.
              </p>
            </div>
          </form>
        </div>
      </main>
    </div>
  </section>
</body>

</html>




<?php (new AuthController)->registerUser(); ?>