<section class="bg-white self-center mt-16">

  <main class="flex items-center justify-center lg:col-span-7 xl:col-span-6">
    <div class="max-w-xl lg:max-w-3xl">
      <a class="block text-blue-600" href="#">
        <span class="sr-only">Home</span>
        <img src="/healthmate/view/auth/images/hospital.png" alt="" class="size-20">
      </a>

      <h1 class="mt-6 text-2xl font-bold text-gray-900 sm:text-3xl md:text-4xl">
        Add Medication
      </h1>

      <p class="mt-4 leading-relaxed text-gray-500">
        Fill in the details below to add a new medication.
      </p>

      <form method="post" class="mt-8 grid grid-cols-6 gap-6">
        <!-- Medication Name -->
        <div class="col-span-6">
          <label for="med_name" class="block text-sm font-medium text-gray-700">
            Medication Name
          </label>
          <input
            required
            type="text"
            id="medname"
            name="med_name"
            class="mt-1 p-2 w-full rounded-md border-2 border-gray-200 bg-white text-sm h-10 text-gray-700 shadow-sm" />
        </div>

        <!-- Dosage -->
        <div class="col-span-6 sm:col-span-3">
          <label for="dosage" class="block text-sm font-medium text-gray-700">
            Dosage (e.g., 500mg)
          </label>
          <input
            required
            type="text"
            id="dosage"
            name="dosage"
            class="mt-1 p-2 w-full rounded-md border-2 border-gray-200 bg-white text-sm h-10 text-gray-700 shadow-sm" />
        </div>

        <!-- Frequency -->
        <div class="col-span-6 sm:col-span-3">
          <label for="frequency" class="block text-sm font-medium text-gray-700">
            Frequency (e.g., Twice a Day)
          </label>
          <input
            required
            type="text"
            id="frequency"
            name="frequency"
            class="mt-1 p-2 w-full rounded-md border-2 border-gray-200 bg-white text-sm h-10 text-gray-700 shadow-sm" />
        </div>

        <!-- Start Date -->
        <div class="col-span-6 sm:col-span-3">
          <label for="interval" class="block text-sm font-medium text-gray-700">
            Interval(eg. 4hr)<sup class="text-gray-400">(per hour/optional)</sup>
          </label>
          <input
            type="number"
            id="interval"
            name="interval"
            class="mt-1 p-2 w-full rounded-md border-2 border-gray-200 bg-white text-sm h-10 text-gray-700 shadow-sm" />
        </div>

        <!-- End Date -->
        <div class="col-span-6 sm:col-span-3">
          <label for="start_time" class="block text-sm font-medium text-gray-700">
            Start Time<sup class="text-gray-400">(optional)</sup>
          </label>
          <input
            type="time"
            id="start_time"
            name="start_time"
            class="mt-1 p-2 w-full rounded-md border-2 border-gray-200 bg-white text-sm h-10 text-gray-700 shadow-sm" />
        </div>

        <!-- Submit Button -->
        <div class="col-span-6 sm:flex sm:items-center sm:gap-4">
          <button
            type="submit"
            class="inline-block shrink-0 rounded-md border bg-pink-600 px-12 py-3 text-sm font-medium text-white transition hover:bg-transparent hover:text-pink-600 focus:outline-none focus:ring active:text-pink-500">
            Add Medication
          </button>
        </div>
      </form>
    </div>
  </main>
</section>

<?php (new MedicationController)->createMedication() ?>