

<style>
    /* Hide the native scrollbar */
::-webkit-scrollbar {
  width:5px;
  border-radius:10px;
}

/* Track */
::-webkit-scrollbar-track {
  background: #f1f1f1;
  border-radius:10px;

}

/* Handle */
::-webkit-scrollbar-thumb {
  background: #888;
  border-radius:10px;

}

/* Handle on hover */
::-webkit-scrollbar-thumb:hover {
  background: #555;
}

    </style>

<aside class="fixed top-0 z-0 ml-[-100%] flex h-screen w-full flex-col lg:justify-between border-r bg-white px-6 pb-3 transition duration-300 md:w-4/12 lg:ml-0 lg:w-[25%] xl:w-[20%] 2xl:w-[15%] dark:bg-gray-800 dark:border-gray-700">

    <div>
      <div class="mx-6 px-6 py-4">
        <a href="#" title="home">
        </a>
      </div>

      <div class="py-6">
      <div class="mt-8 lg:text-center hidden lg:block ">
      <div class="hidden lg:block">
          <h5 class="mt-4 text-xl font-semibold text-gray-600 lg:block dark:text-gray-300">Admin</h5>
          <span class="text-gray-400 lg:block">Admin</span>
      </div>
      </div>

      <div class="mt-10 lg:hidden block md:grid grid-cols-2 items-center flex">
          <div class="ml-4">
              <h5 class="text-xl font-semibold text-gray-600 dark:text-gray-300">Admin</h5>
              <span class="text-gray-400">Admin</span>
          </div>
      </div>
      </div>


  </div>
</div>

      <ul class="mt-8 space-y-2 tracking-wide overflow-y-auto">
        <li>
          <a
            href="dashboard.php"
            aria-label="dashboard"
            class="relative flex items-center space-x-4 rounded-xl bg-gradient-to-r from-sky-600 to-cyan-400 px-4 py-3 text-white"
          >
            <svg class="-ml-1 h-6 w-6" viewBox="0 0 24 24" fill="none">
              <path
                d="M6 8a2 2 0 0 1 2-2h1a2 2 0 0 1 2 2v1a2 2 0 0 1-2 2H8a2 2 0 0 1-2-2V8ZM6 15a2 2 0 0 1 2-2h1a2 2 0 0 1 2 2v1a2 2 0 0 1-2 2H8a2 2 0 0 1-2-2v-1Z"
                class="dark:fill-slate-600 fill-current text-cyan-400"
              ></path>
              <path
                d="M13 8a2 2 0 0 1 2-2h1a2 2 0 0 1 2 2v1a2 2 0 0 1-2 2h-1a2 2 0 0 1-2-2V8Z"
                class="fill-current text-cyan-200 group-hover:text-cyan-300"
              ></path>
              <path
                d="M13 15a2 2 0 0 1 2-2h1a2 2 0 0 1 2 2v1a2 2 0 0 1-2 2h-1a2 2 0 0 1-2-2v-1Z"
                class="fill-current group-hover:text-sky-300"
              ></path>
            </svg>
            <span class="-mr-1 font-medium">Dashboard</span>
          </a>
        </li>
        <li>
          <a
            href="manage-stock.php"
            class="group flex items-center space-x-4 rounded-md px-4 py-3 text-gray-600 dark:text-gray-300"
          >
            <svg
              xmlns="http://www.w3.org/2000/svg"
              class="h-5 w-5"
              viewBox="0 0 20 20"
              fill="currentColor"
            >
              <path
                class="fill-current text-gray-300 group-hover:text-cyan-300"
                fill-rule="evenodd"
                d="M2 6a2 2 0 012-2h4l2 2h4a2 2 0 012 2v1H8a3 3 0 00-3 3v1.5a1.5 1.5 0 01-3 0V6z"
                clip-rule="evenodd"
              />
              <path
                class="fill-current text-gray-600 group-hover:text-cyan-600 dark:group-hover:text-sky-400"
                d="M6 12a2 2 0 012-2h8a2 2 0 012 2v2a2 2 0 01-2 2H2h2a2 2 0 002-2v-2z"
              />
            </svg>
            <span class="group-hover:text-gray-700 dark:group-hover:text-gray-50">Manage stock</span>
          </a>
        </li>
        <li>
          <a
            href="add_stock.php"
            class="group flex items-center space-x-4 rounded-md px-4 py-3 text-gray-600 dark:text-gray-300"
          >
            <svg
              xmlns="http://www.w3.org/2000/svg"
              class="h-5 w-5"
              viewBox="0 0 20 20"
              fill="currentColor"
            >
              <path
                class="fill-current text-gray-600 group-hover:text-cyan-600 dark:group-hover:text-sky-400"
                fill-rule="evenodd"
                d="M2 5a2 2 0 012-2h8a2 2 0 012 2v10a2 2 0 002 2H4a2 2 0 01-2-2V5zm3 1h6v4H5V6zm6 6H5v2h6v-2z"
                clip-rule="evenodd"
              />
              <path
                class="fill-current text-gray-300 group-hover:text-cyan-300"
                d="M15 7h1a2 2 0 012 2v5.5a1.5 1.5 0 01-3 0V7z"
              />
            </svg>
            <span class="group-hover:text-gray-700 dark:group-hover:text-gray-50">Add Stock</span>
          </a>
        </li>

        <li>
          <a
            href="mangae-orders.php"
            class="group flex items-center space-x-4 rounded-md px-4 py-3 text-gray-600 dark:text-gray-300"
          >
            <svg
              xmlns="http://www.w3.org/2000/svg"
              class="h-5 w-5"
              viewBox="0 0 20 20"
              fill="currentColor"
            >
              <path
                class="fill-current text-gray-600 group-hover:text-cyan-600 dark:group-hover:text-sky-400"
                fill-rule="evenodd"
                d="M2 5a2 2 0 012-2h8a2 2 0 012 2v10a2 2 0 002 2H4a2 2 0 01-2-2V5zm3 1h6v4H5V6zm6 6H5v2h6v-2z"
                clip-rule="evenodd"
              />
              <path
                class="fill-current text-gray-300 group-hover:text-cyan-300"
                d="M15 7h1a2 2 0 012 2v5.5a1.5 1.5 0 01-3 0V7z"
              />
            </svg>
            <span class="group-hover:text-gray-700 dark:group-hover:text-gray-50">Manage Orders</span>
          </a>
        </li>




      </ul>
    </div>

    <div class="-mx-6 flex items-center justify-between border-t px-6 pt-4 dark:border-gray-700">
            <a href="logout.php" class="group flex items-center space-x-4 rounded-md px-4 py-3 text-gray-600 dark:text-gray-300">
              <svg
                xmlns="http://www.w3.org/2000/svg"
                class="h-6 w-6"
                fill="none"
                viewBox="0 0 24 24"
                stroke="currentColor"
              >
                <path
                  stroke-linecap="round"
                  stroke-linejoin="round"
                  stroke-width="2"
                  d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"
                />
              </svg>
              <span class="group-hover:text-gray-700 dark:group-hover:text-white">Logout</span>
</a>
          </div>
  </aside>



  <div class="ml-auto mb-6 lg:w-[75%] xl:w-[80%] 2xl:w-[85%]">
    <div class="sticky top-0 h-16 border-b bg-gray-800 dark:border-gray-700 lg:py-2.5">
      <div class="flex items-center justify-between space-x-4 px-6 2xl:container">
        <h5 hidden class="text-2xl font-medium text-gray-600 lg:block dark:text-white">Dashboard</h5>
        <button id="sidebarToggle" class="mr-2 h-16 w-12 border-r lg:hidden dark:border-gray-700 dark:text-gray-300">
            <svg xmlns="http://www.w3.org/2000/svg" class="my-auto h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
            </svg>
            </button>



            <div class="flex space-x-4 relative">
  <!-- Search bar -->

  <!-- /Search bar -->

  <button
    aria-label="chat"  
    class="h-10 w-10 rounded-xl border bg-gray-100 active:bg-gray-200 dark:bg-gray-700 dark:border-gray-600 dark:active:bg-gray-800 relative"
  >
    <svg
      xmlns="http://www.w3.org/2000/svg"
      class="m-auto h-5 w-5 text-gray-600 dark:text-gray-300"
      fill="none"
      viewBox="0 0 24 24"
      stroke="currentColor"
    >
      <path
        stroke-linecap="round"
        stroke-linejoin="round"
        stroke-width="2"
        d="M7 8h10M7 12h4m1 8l-4-4H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-3l-4 4z"
      />
    </svg>
    <!-- Notification badge -->
    <span  class="bg-red-500 text-white w-4 h-4 rounded-full flex items-center justify-center text-xs absolute -top-1 -right-1">3</span>
  </button>






  <button id="manage-modal"
    aria-label="notification"
    class="h-10 w-10 rounded-xl border bg-gray-100 active:bg-gray-200 dark:bg-gray-700 dark:border-gray-600 dark:active:bg-gray-800 relative"
  >
    <svg 
      xmlns="http://www.w3.org/2000/svg"
      class="m-auto h-5 w-5 text-gray-600 dark:text-gray-300"
      viewBox="0 0 20 20"
      fill="currentColor"
    >
      <path
        d="M10 2a6 6 0 00-6 6v3.586l-.707.707A1 1 0 004 14h12a1 1 0 00.707-1.707L16 11.586V8a6 6 0 00-6-6zM10 18a3 3 0 01-3-3h6a3 3 0 01-3 3z"
      />
    </svg>
  </button>
</div>

      </div>
    </div>
<script>
  
  const sidebarToggle = document.getElementById('sidebarToggle');
        const sidebar = document.querySelector('aside');

        sidebarToggle.addEventListener('click', function(event) {
          event.stopPropagation(); // Stop the propagation so the click isn't detected outside
          sidebar.classList.toggle('ml-[-100%]');
        });

        document.addEventListener('click', function(event) {
          const isClickInside = sidebar.contains(event.target) || sidebarToggle.contains(event.target);
          if (!isClickInside) {
            sidebar.classList.add('ml-[-100%]');
          }
        });
  </script>