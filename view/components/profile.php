<div class="max-w-2xl mx-auto bg-white rounded-lg shadow p-8 mt-20">
  <!-- Profile Header -->
  <div class="border-b border-gray-200 pb-4 mb-6">
    <h2 class="text-2xl font-bold text-gray-800">Profile Information</h2>
    <p class="text-gray-500 text-sm mt-1">Manage your personal information and health goals</p>
  </div>

  <?php $user = $_SESSION['user'] ?>

  <!-- Profile Content -->
  <div class="space-y-6">
    <!-- Name Section -->
    <div class="flex items-center">
      <div class="w-1/4">
        <span class="text-pink-600 font-medium">Name</span>
      </div>
      <div class="w-3/4">
        <div class="bg-gray-50 px-4 py-2 rounded-md">
          <span class="text-gray-800"><?php echo $user['name']; ?></span>
        </div>
      </div>
    </div>

    <!-- Email Section -->
    <div class="flex items-center">
      <div class="w-1/4">
        <span class="text-pink-600 font-medium">Email</span>
      </div>
      <div class="w-3/4">
        <div class="bg-gray-50 px-4 py-2 rounded-md">
          <span class="text-gray-800"><?php echo $user['email']; ?></span>
        </div>
      </div>
    </div>

    <!-- Phone Section -->
    <div class="flex items-center">
      <div class="w-1/4">
        <span class="text-pink-600 font-medium">Phone Number</span>
      </div>
      <div class="w-3/4">
        <div class="bg-gray-50 px-4 py-2 rounded-md">
          <span class="text-gray-800"><?php echo $user['number']; ?></span>
        </div>
      </div>
    </div>

    <!-- Health Goals Section -->
    <div class="flex">
      <div class="w-1/4">
        <span class="text-pink-600 font-medium">Health Goals</span>
      </div>
      <div class="w-3/4">
        <div class="bg-gray-50 px-4 py-3 rounded-md space-y-2 border-2">
          <div class="flex items-center">
            <textarea class="text-gray-800 w-full" > <?php echo $user['health_goal']; ?> </textarea>
          </div>
        </div>
      </div>
    </div>
  </div>


</div>