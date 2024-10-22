<style>
    #logo {
        width: 4%;
        margin: 0 3%;
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
    .container {
        display: flex;
        justify-content: flex-start;
        align-items: center;
        width: 100%;
        gap: 30%;
    }
    input[type="search"]::-webkit-search-cancel-button {
        display: none;
    }


</style>

<script>
    function num() {
        alert('Pesquisando...');
    }
</script>


<header>
    <div class="container">
        <img src="/images/medivitta-high-resolution-logo.png" alt="Medivitta Logo" id="logo" >
        <div class="search">
            <div class="search-container">
                <input id="search-bar" type="search" placeholder="Pesquisar">
                <img src="/images/search-icon.svg" alt="Search" class="search-icon" onclick="num()">
            </div>
        </div>
    </div>
</header>


