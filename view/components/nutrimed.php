<script>
  document.title = "NutriMed"
</script>
<div class="flex flex-col gap-10 p-10">

  <div class="flex items-center gap-5">
    <strong class="text-5xl font-sans text-pink-600">Medication Table</strong>
    <a href="addmed" class="px-4 py-2 text-sm font-medium text-white bg-pink-600 rounded-lg">
      <i class="fa fa-add"></i>
    </a>
    <!-- <button id="pdfmed" class="px-4 py-2 text-sm font-medium text-white bg-gray-600 rounded-lg">
      <i class="fa fa-print"></i>
    </button> -->
  </div>

  
  
  
  <table id="medTable" class="w-full text-left border-collapse">
    <thead>
      <!-- Medication Table -->
      <tr>
        <th>Medication</th>
        <th>Dosage</th>
        <th>Frequency(/Day)</th>
        <th>Interval</th>
        <th>Start Time(/Time)</th>
        <th class="text-center">Action</th>
      </tr>
    </thead>
    
    <tbody>

      <?php $medications = (new MedicationController)->getMedications(); ?>
      <?php foreach ($medications as $medication) { ?>
        <tr>
          <td><?php echo $medication['med_name'] ?></td>
          <td><?php echo $medication['dosage'] ?></td>
          <td class="text-left"><?php echo $medication['frequency'] ?></td>
          <td><?php echo $medication['med_interval'] ?></td>
          <td><?php echo $medication['start_time'] ?></td>
          <td class="flex gap-4 items-center justify-center">
            <a href="updatemed?med_id=<?php echo $medication['med_id'] ?>" class="px-4 py-2 text-xl rounded-md font-medium text-white bg-green-600 ">
              <i class="fa fa-edit text-white"></i>
            </a>
            <a href="?med_id=<?php echo $medication['med_id'] ?>"
              class="px-4 py-2 text-xl rounded-md font-medium text-white bg-red-600 delete-btn">
              <i class="fa fa-trash text-white"></i>
            </a>
          </td>
        </tr>
      <?php } ?>
    </tbody>
  </table>



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




  <?php if (isset($_GET['med_id'])) { ?>
    <?php (new MedicationController)->deleteMedication($_GET['med_id']); ?>
  <?php } ?>

  <script>
    new DataTable('#medTable', {
      pageLength: 6,
      layout: {
        
        topStart: {
          buttons: ['pdf', 'print'], // Export buttons
        }
      }

    });
  </script>
  <style>
    /* Style the export buttons */
    .dt-buttons button {
      background-color: #f472b6;
      /* Pink background */
      color: white;
      /* White text */
      border: none;
      border-radius: 5px;
      padding: 8px 12px;
      margin: 5px;
      cursor: pointer;
    }

    .dt-buttons button:hover {
      background-color: #ec4899;
      /* Darker pink on hover */
    }

    /* Style pagination buttons */
    .dataTables_paginate .paginate_button {
      background-color: #f3f4f6;
      /* Light gray background */
      color: #374151;
      /* Dark text */
      border: 1px solid #d1d5db;
      /* Light border */
      border-radius: 5px;
      padding: 5px 10px;
      margin: 2px;
      cursor: pointer;
    }

    .dataTables_paginate .paginate_button:hover {
      background-color: #d1d5db;
      /* Darker gray on hover */
      color: #1f2937;
      /* Darker text */
    }

    /* Highlight the active page button */
    .dataTables_paginate .paginate_button.current {
      background-color: #f472b6;
      /* Pink background */
      color: white;
      /* White text */
      border: none;
    }
  </style>

  <script>
    $("#pdfmed").on("click", function() {
      window.open('/healthmate/pdfmed', '_blank').focus();
    })

    document.addEventListener('DOMContentLoaded', function() {
      const deleteButtons = document.querySelectorAll('.delete-btn');

      deleteButtons.forEach(button => {
        button.addEventListener('click', function(event) {
          event.preventDefault();

          const deleteUrl = this.getAttribute('href');

          Swal.fire({
            title: 'Are you sure?',
            text: "This action cannot be undone!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
            confirmButtonText: 'Yes, delete it!',
            cancelButtonText: 'Cancel'
          }).then((result) => {
            if (result.isConfirmed) {
              window.location.href = deleteUrl;
            }
          });
        });
      });
    });
  </script>
</div>