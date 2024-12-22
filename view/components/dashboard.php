<script>
  document.title = "Medication Dashboard"
</script>

<?php
$medications = (new MedicationController)->getMedications();
$totalMedications = count($medications);
$dailyDoses = 0;
$earliestDose = 0;
$latestDose = 0;
?>

<div class="w-full p-5 mt-5">
  <div class="mb-5"><strong class="text-5xl font-sans text-pink-600">Medication Table</strong></div>

  <!-- Stats Overview -->
  <div class="grid grid-cols-1 md:grid-cols-4 gap-4 mb-6">
    <div class="bg-white p-4 rounded-lg shadow">
      <h3 class="text-gray-500 text-sm">Total Medications</h3>
      <p class="text-2xl font-bold text-gray-800"><?php echo $totalMedications ?></p>
    </div>
    <div class="bg-white p-4 rounded-lg shadow">
      <h3 class="text-gray-500 text-sm">Daily Doses</h3>
      <p class="text-2xl font-bold text-gray-800" id="dailyDose"><?php echo $dailyDoses ?></p>
    </div>
    <div class="bg-white p-4 rounded-lg shadow">
      <h3 class="text-gray-500 text-sm">Earliest Dose</h3>
      <p class="text-2xl font-bold text-gray-800" id="earliestDose"><?php echo $earliestDose ?></p>
    </div>
    <div class="bg-white p-4 rounded-lg shadow">
      <h3 class="text-gray-500 text-sm">Latest Dose</h3>
      <p class="text-2xl font-bold text-gray-800" id="latestDose"><?php echo $latestDose ?></p>
    </div>
  </div>

  <!-- Medication Table -->
  <div class="bg-white rounded-lg shadow ">
    <div class="p-4">
      <h2 class="text-xl font-semibold mb-4">Medication Schedule</h2>
    </div>
    <div class="relative h-80">
      <div class="overflow-x-auto">
        <div class="shadow-sm overflow-hidden">
          <div class="overflow-y-auto h-80 scroll-container">
            <table class="w-full">
              <thead class="bg-gray-50">
                <tr>
                  <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Medication</th>
                  <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Dosage</th>
                  <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Frequency(/Day)</th>
                  <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Interval</th>
                  <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Start Time</th>
                </tr>
              </thead>
              <tbody class="bg-white divide-y divide-gray-200" id="medicationTable">
                <?php foreach ($medications as $medication) { ?>
                  <?php
                  $dailyDoses += $medication['frequency'];
                  $earliestDose = $earliestDose == 0 ? $medication['start_time'] : min($earliestDose, $medication['start_time']);
                  $latestDose = $latestDose == 0 ? $medication['start_time'] : max($latestDose, $medication['start_time']);
                  ?>
                  <tr>
                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900"><?php echo $medication['med_name'] ?></td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500"><?php echo $medication['dosage'] ?></td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500"><?php echo $medication['frequency'] ?></td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500"><?php echo $medication['med_interval'] ?></td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500"><?php echo $medication['start_time'] ?></td>
                  </tr>
                <?php } ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>


    <style>
      .scroll-container {
        max-height: 450px;
        /* Adjust as needed */
        overflow-y: auto;
      }

      /* WebKit-based browsers (Chrome, Edge, Safari) */
      .scroll-container::-webkit-scrollbar {
        width: 10px;
        /* Width of the scrollbar */
      }

      .scroll-container::-webkit-scrollbar-track {
        background: white;
        /* Track color */
        border-radius: 5px;
        /* Rounded edges for the track */
      }

      .scroll-container::-webkit-scrollbar-thumb {
        background: pink;
        /* Thumb color */
        border-radius: 5px;
        /* Rounded edges for the thumb */
      }

      .scroll-container::-webkit-scrollbar-thumb:hover {
        background: pink;
        /* Thumb color on hover */
      }
    </style>

    <script defer>
      dose = document.getElementById('dailyDose');
      dose.innerHTML = <?php echo $dailyDoses ?>;

      earliest = document.getElementById('earliestDose');
      earliest.innerHTML = " <?php echo $earliestDose ?> ";

      latest = document.getElementById('latestDose');
      latest.innerHTML = " <?php echo $latestDose ?> ";
    </script>