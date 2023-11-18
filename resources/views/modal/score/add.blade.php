<div id="add" tabindex="-1" aria-hidden="true"
     class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
  <div class="relative p-4 w-full max-w-2xl max-h-full">
    <!-- Modal content -->
    <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
      <!-- Modal header -->
      <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
        <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
          Edit Club
        </h3>
        <button type="button"
                class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                data-modal-hide="add">
          <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                  d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
          </svg>
          <span class="sr-only">Close modal</span>
        </button>
        <button onclick="addNewEntry()" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white">
          <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
          </svg>
          <span class="sr-only">Add new entry</span>
        </button>
      </div>
      <form action="{{ route('score.store') }}" method="post">
        @csrf
        <!-- Modal body -->
        <div class="p-4 md:p-5 space-y-4" id="entriesContainer">
          <div class="mb-6">
            <label for="club_1" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Club 1</label>
            <input type="text"
                   id="club_1"
                   name="club_1"
                   class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                   required>
          </div>
          <div class="mb-6">
            <label for="club_2" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Club 2</label>
            <input type="text"
                   id="club_2"
                   name="club_2"
                   class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                   required>
          </div>
          <div class="mb-6">
            <label for="score_1" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Score 1</label>
            <input type="text"
                   name="score_1"
                   id="score_1"
                   class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                   required>
          </div>
          <div class="mb-6">
            <label for="score_2" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Score 2</label>
            <input type="text"
                   name="score_2"
                   id="score_2"
                   class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                   required>
          </div>
        </div>
        <!-- Modal footer -->
        <div class="flex items-center p-4 md:p-5 border-t border-gray-200 rounded-b dark:border-gray-600">
          <button type="submit"
                  class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
            Save
          </button>
          <button data-modal-hide="add" type="button"
                  class="ms-3 text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">
            Cancel
          </button>
        </div>
      </form>
    </div>
  </div>
</div>

<script>
  let entryCount = 2; // Assuming you start with two fields for Club 1 and Club 2

  function addNewEntry() {
    const entriesContainer = document.getElementById('entriesContainer');

    // Create elements for new Club and Score inputs
    const newClubLabel = document.createElement('label');
    newClubLabel.textContent = `Club ${entryCount}`;
    const newClubInput = document.createElement('input');
    newClubInput.type = 'text';
    newClubInput.name = `club_${entryCount}`;
    newClubInput.id = `club_${entryCount}`;
    // ... similar creation for Score input

    // Append the new Club and Score inputs to the container
    entriesContainer.appendChild(newClubLabel);
    entriesContainer.appendChild(newClubInput);
    // ... append the Score input similarly

    entryCount++; // Increment entry count for the next entry
  }
</script>
