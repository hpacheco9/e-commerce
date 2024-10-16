<style>
    #logo {
        width: 10%;
        margin: 0 1%;
    }

    #search-bar {
        flex-grow: 1; /* Allow the search bar to expand within its container */
        height: 60px; /* Larger height */
        padding: 10px 150px 10px 20px; /* Extra space on the right for the icon */
        border-radius: 30px; /* Rounded edges */
        border: 1px solid #ccc;
        box-sizing: border-box; /* Ensure the padding is accounted for */
        font-size: 16px;
        /* Add box shadow */

        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);



    }

    .search-container {
        position: relative;
        display: flex;
        align-items: center;
        width: 100%; /* Let the container take up available space */
        max-width: 600px; /* Optional: Set a max width for the search container */
    }

    .search-icon {
        position: absolute;
        right: 10px; /* Position icon at the far right inside the input */
        top: 50%;
        transform: translateY(-50%);
        width: 35px;
        height: 35px;
        background-color: #ff5a5f; /* Match the example pinkish-red color */
        display: flex;
        justify-content: center;
        align-items: center;
        border-radius: 50%; /* Round icon */
        color: white;
    }

    .container {
        display: flex;
        justify-content: flex-start;
        align-items: center;
        width: 100%; /* Ensure the container takes full width */
        gap: 30%; /* Space between logo and search */
    }
    input[type="search"]::-webkit-search-cancel-button {
        display: none;
    }


</style>



<header>
    <div class="container">
        <img src="/images/medivitta-high-resolution-logo-black.png" alt="Medivitta Logo" id="logo">
        <div class="search">
            <div class="search-container">
                <input id="search-bar" type="search" placeholder="Pesquisar">
                <img src="/images/search-icon.svg" alt="Search" class="search-icon">
            </div>
        </div>
    </div>
</header>

