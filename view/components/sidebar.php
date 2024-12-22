<?php

$user = $_SESSION['user'];

?>

<div class="flex h-screen flex-col justify-between border-e bg-white w-1/4">
  <div class="px-4 py-6">
    <span class="grid h-32 w-full place-content-center rounded-lg bg-pink-100 text-xs text-gray-600">
      <img src="/healthmate/view/auth/images/healthcare.png" alt="" class="size-20" />
    </span>

    <ul class="mt-6 space-y-1">
      <li>
        <a
          href="dashboard"
          class="block rounded-lg  px-4 py-2 text-sm font-medium <?php echo $_GET['route'] == 'home/dashboard' ? 'text-white bg-pink-600' : ''; ?>">
          Dashboard
        </a>
      </li>

      <li>
        <a
          href="nutrimed"
          class="block rounded-lg px-4 py-2 text-sm font-medium text-black <?php echo $_GET['route'] == 'home/nutrimed' || $_GET['route'] == 'home/addmed' || $_GET['route'] == 'home/updatemed' ? 'text-white bg-pink-600' : ''; ?>">
          Medication Tracker
        </a>
      </li>

      <li>
        <details class="group [&_summary::-webkit-details-marker]:hidden">
          <summary
            class="flex cursor-pointer items-center justify-between rounded-lg px-4 py-2  <?php echo $_GET['route'] == 'home/nutriplanner' || $_GET['route'] == 'home/searchfood' || $_GET['route'] == 'home/nutrifood' ? 'text-white bg-pink-600' : ''; ?>">
            <span class="text-sm font-medium"> NutriPlanner </span>

            <span class="shrink-0 transition duration-300 group-open:-rotate-180">
              <svg
                xmlns="http://www.w3.org/2000/svg"
                class="size-5"
                viewBox="0 0 20 20"
                fill="currentColor">
                <path
                  fill-rule="evenodd"
                  d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                  clip-rule="evenodd" />
              </svg>
            </span>
          </summary>

          <ul class="mt-2 space-y-1 px-4">
            <li>
              <a
                href="searchfood"
                class="block rounded-lg px-4 py-2 text-sm font-medium hover:bg-gray-100 hover:text-pink-600 <?php echo $_GET['route'] == 'home/searchfood' ? "bg-gray-100 text-pink-600" : ""; ?>">
                Search Food
              </a>
            </li>

            <li>
              <a
                href="nutrifood"
                class="block rounded-lg px-4 py-2 text-sm font-medium  hover:bg-gray-100 hover:text-pink-600 <?php echo $_GET['route'] == 'home/nutrifood' ? "bg-gray-100 text-pink-600" : ""; ?>">
                Food Nutrition
              </a>
            </li>
          </ul>
        </details>
      </li>
      <li>
        <a
          href="profile"
          class="block rounded-lg px-4 py-2 text-sm font-medium text-black <?php echo $_GET['route'] == 'home/profile' ? 'text-white bg-pink-600' : ''; ?>">
          Profile
        </a>
      </li>
      <li>
        <a
          href="logout"
          class="block rounded-lg px-4 py-2 text-sm font-medium text-black <?php echo $_GET['route'] == 'home/logout' ? 'text-white bg-pink-600' : ''; ?>">
          Logout
        </a>
      </li>
    </ul>
  </div>

  <div class=" sticky inset-x-0 bottom-0 border-t border-gray-100">
    <a href="#" class="flex items-center gap-2 bg-white p-4 hover:bg-gray-50">
      <img
        alt="profile"
        src="/healthmate/view/auth/images/profile-user.png"
        class="size-10 rounded-full object-cover" />

      <div>
        <p class="text-xs">
          <strong class="block font-medium "><?php echo $user['name'] ?></strong>

          <span><?php echo $user['email'] ?> </span>
        </p>
      </div>
    </a>
  </div>
</div>