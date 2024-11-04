<style>
    #logo {
        width: 35%;
        margin: 0 30%;
        border-radius: 100%;
    }

    #search-bar {
        flex-grow: 1;
        height: 50px;
        padding: 10px 150px 10px 20px;
        border-radius: 30px;
        border: 1px solid #ccc;
        box-sizing: border-box;
        font-size: 16px;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    }

    .search-container {
        position: relative;
        display: flex;
        align-items: center;
        width: 100%;
        max-width: 600px;
    }

    .search-icon {
        position: absolute;
        right: 10px;
        top: 50%;
        transform: translateY(-50%);
        width: 35px;
        height: 35px;
        display: flex;
        justify-content: center;
        align-items: center;
        border-radius: 50%;
        color: white;
    }
    .search-icon:hover {
        cursor: pointer;
    }
    .contentor {
        display: flex;
        justify-content: flex-start;
        align-items: center;
        width: 100%;
        gap: 30%;
        margin-bottom: 0.5%;
        margin-top: 0.5%;
    }
    input[type="search"]::-webkit-search-cancel-button {
        display: none;
    }

    .header-separator {
        width: 100%;
        height: 1px;
        background-color: #E0E0E0;
        margin-bottom: 2%;
    }
    a {
        text-decoration: none;
        color: black;
        font-weight: bold;

    }
    body {
        margin: 0;
        font-family: 'Inter', sans-serif;
    }

    nav {
        display: flex;
        justify-content: flex-end;
        align-items: center;
        padding: 1rem 2rem;
        background-color: #ffffff;
        margin-right: 1%;
    }

    .user-dropdown {
        position: relative;
        margin-right: 1rem;

    }

    .user-name {
        font-size: 0.875rem;
        font-weight: 500;
        color: #374151;
        display: flex;
        align-items: center;
        cursor: pointer;
        padding: 0.5rem;
        border-radius: 9999px;
        transition: all 0.2s ease-in-out;
        background-color: transparent;
        border: none;
    }

    .user-name:hover, .user-name:focus {
        background-color: #f3f4f6;
        outline: none;
    }

    .user-icon {
        width:2rem;
        height: 2rem;
        margin-right: 0.5rem;
        fill: none;
        stroke: currentColor;
        stroke-width: 2;
        stroke-linecap: round;
        stroke-linejoin: round;
    }

    .dropdown-content {
        visibility: hidden;
        opacity: 0;
        position: absolute;
        right: 0;
        top: calc(100% + 0.5rem);
        background-color: #ffffff;
        min-width: 200px;
        box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05);
        border-radius: 0.5rem;
        z-index: 1;
        transform: translateY(-10px);
        transition: all 0.2s ease-in-out;
    }

    .dropdown-content::before {
        content: '';
        position: absolute;
        top: -6px;
        right: 16px;
        border-left: 6px solid transparent;
        border-right: 6px solid transparent;
        border-bottom: 6px solid #ffffff;
    }

    .dropdown-content a {
        color: #374151;
        padding: 0.75rem 1rem;
        text-decoration: none;
        display: block;
        font-size: 0.875rem;
        transition: background-color 0.2s ease-in-out;
    }

    .dropdown-content a:hover {
        background-color: #f3f4f6;
    }

    .dropdown-content a:first-child {
        border-top-left-radius: 0.5rem;
        border-top-right-radius: 0.5rem;
    }

    .dropdown-content a:last-child {
        border-bottom-left-radius: 0.5rem;
        border-bottom-right-radius: 0.5rem;
    }

    .show {
        visibility: visible;
        opacity: 1;
        transform: translateY(0);
    }

    .cart-link {
        display: flex;
        align-items: center;
        color: #374151;
        text-decoration: none;
        transition: color 0.2s ease-in-out;
    }

    .cart-link:hover {
        color: #1f2937;
    }

    .cart-icon {
        width: 1.5rem;
        height: 1.5rem;
        fill: none;
        stroke: currentColor;
        stroke-width: 2;
        stroke-linecap: round;
        stroke-linejoin: round;
    }

    .sr-only {
        position: absolute;
        width: 1px;
        height: 1px;
        padding: 0;
        margin: -1px;
        overflow: hidden;
        clip: rect(0, 0, 0, 0);
        white-space: nowrap;
        border-width: 0;
    }
</style>

<header>
    <div class="contentor">
        <a href="/"> <img src="/images/medivitta-high-resolution-logo.png" alt="Medivitta Logo" id="logo" width="40"></a>

        <div class="search">
            <div class="search-container">
                <input id="search-bar" type="search" placeholder="Pesquisar">
                <img src="/images/search-icon.svg" alt="Search" class="search-icon">
            </div>
        </div>
        @guest
            <span><a href="/login">Login</a></span>
        @endguest
        @auth
            <nav>
                <div class="user-dropdown">
                    <button class="user-name" onclick="toggleDropdown()" aria-haspopup="true" aria-expanded="false">
                        <svg class="user-icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                            <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                            <circle cx="12" cy="7" r="4"></circle>
                        </svg>
                        {{ Auth::user()->name }}
                    </button>
                    <div class="dropdown-content" id="userDropdown">
                        <a href="/logout">Logout</a>
                    </div>
                </div>
                <a href="/carrinho" class="cart-link">
                    <svg class="cart-icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                        <circle cx="9" cy="21" r="1"></circle>
                        <circle cx="20" cy="21" r="1"></circle>
                        <path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"></path>
                    </svg>
                    <span class="sr-only">Carrinho</span>
                </a>
        </nav>
        @endauth


    </div>
    <div class="header-separator"></div>
</header>

<script>
    function toggleDropdown() {
        var dropdown = document.getElementById("userDropdown");
        dropdown.classList.toggle("show");
        var userNameElement = document.querySelector(".user-name");
        var isExpanded = userNameElement.getAttribute("aria-expanded") === "true";
        userNameElement.setAttribute("aria-expanded", !isExpanded);
    }

    document.addEventListener('click', function(event) {
        var dropdown = document.getElementById("userDropdown");
        var userNameElement = document.querySelector(".user-name");
        if (!userNameElement.contains(event.target) && !dropdown.contains(event.target)) {
            dropdown.classList.remove("show");
            userNameElement.setAttribute("aria-expanded", "false");
        }
    });

    document.addEventListener('keydown', function(event) {
        if (event.key === 'Escape') {
            var dropdown = document.getElementById("userDropdown");
            var userNameElement = document.querySelector(".user-name");
            dropdown.classList.remove("show");
            userNameElement.setAttribute("aria-expanded", "false");
        }
    });
</script>
