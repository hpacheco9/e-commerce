        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Edit Profile</title>
            <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
            <link href="https://cdn.jsdelivr.net/npm/lucide-static@0.321.0/font/lucide.min.css" rel="stylesheet">
            <style>
                button {
                    background-color: #149FA8;
                    margin-top: 3%;
                }
                h2 {
                margin-top: 2%;
                }
                label {
                    color: #149FA8;
                }
                .profile-pic-label {
                    bottom: 0;
                    right: 0;
                    background-color: #149FA8;
                }
                .profile-pic-label:hover {
                    background-color: #117e85;
                }
                .input-icon {
                    top: 0.75rem;
                    left: 0.75rem;
                    color: lightblue;
                }
                @media (min-width: 768px) {
                    .form-grid {
                        grid-template-columns: repeat(2, minmax(0, 1fr));
                    }
                }
            </style>
        </head>
        <body class="min-h-screen bg-gray-100 flex items-center justify-center p-8">
        <div class="bg-white rounded-lg shadow-xl p-8 w-full max-w-6xl">
            <h1 class="text-3xl font-bold text-center text-gray-800 mb-8">Editar Perfil</h1>
            <form
                class="space-y-6"
                action="/perfil/update"
                method="Post"
                enctype="multipart/form-data"
            >
                @csrf
                @method('PUT')
                <div class="flex flex-col md:flex-row gap-8">
                    <div class="md:w-1/3">
                        <div class="flex flex-col items-center mb-6">
                            <div class="relative group">
                                <img
                                    src="/images/user_images/{{Auth::user()->image}}"
                                    class="w-48 h-48 rounded-full object-cover border-4 border-[#149FA8] group-hover:border-[#117e85] transition-colors duration-300"
                                    id="profile-pic"
                                >
                                <label
                                    for="profile-pic-input"
                                    class="profile-pic-label absolute text-white p-3 rounded-full cursor-pointer transition-colors duration-300"
                                >
                                    <i class="lucide-camera" style="width: 24px; height: 24px;"></i>
                                </label>
                            </div>
                            <input
                                type="file"
                                id="profile-pic-input"
                                name="profile_picture"
                                accept="image/*"
                                class="hidden"
                            >
                        </div>
                    </div>
                    <div class="md:w-2/3">
                        <div class="space-y-4">
                            <h2 class="text-2xl font-semibold text-gray-700">Informação Pessoal</h2>
                            <div class="grid form-grid gap-4">
                                <div class="relative">
                                    <i class="lucide-mail input-icon absolute text-gray-400" style="width: 20px; height: 20px;"></i>
                                    <input
                                        value="{{Auth::user()->email}}"
                                        type="email"
                                        name="email"
                                        placeholder="Email"
                                        class="w-full pl-10 pr-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                                    >
                                </div>
                                <div class="relative">
                                    <i class="lucide-credit-card input-icon absolute text-gray-400" style="width: 20px; height: 20px;"></i>
                                    <input
                                        value="{{Auth::user()->nif}}"
                                        type="text"
                                        name="nif"
                                        placeholder="NIF"
                                        class="w-full pl-10 pr-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                                    >
                                </div>
                            </div>
                        </div>
                        <div class="space-y-4">
                            <h2 class="text-2xl font-semibold text-gray-700">Morada</h2>
                            <div class="grid form-grid gap-4">
                                <div class="relative">
                                    <i class="lucide-map-pin input-icon absolute text-gray-400" style="width: 20px; height: 20px;"></i>
                                    <input
                                        value="{{Auth::user()->rua}}"
                                        type="text"
                                        name="rua"
                                        placeholder="Rua"
                                        class="w-full pl-10 pr-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                                    >
                                </div>
                                <div class="relative">
                                    <i class="lucide-building input-icon absolute text-gray-400" style="width: 20px; height: 20px;"></i>
                                    <input
                                        value="{{Auth::user()->codigoPostal}}"
                                        type="text"
                                        name="codigo_postal"
                                        placeholder="Código Postal"
                                        class="w-full pl-10 pr-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                                    >
                                </div>
                                <div class="relative">
                                    <i class="lucide-home input-icon absolute text-gray-400" style="width: 20px; height: 20px;"></i>
                                    <input
                                        value="{{Auth::user()->porta}}"
                                        type="text"
                                        name="porta"
                                        placeholder="Porta"
                                        class="w-full pl-10 pr-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                                    >
                                </div>
                            </div>
                        </div>

                        <button
                            type="submit"
                            class="w-full text-white py-3 px-4 rounded-md transition-colors duration-300 text-lg font-semibold"
                        >
                            Save Changes
                        </button>
                    </div>
                </div>
            </form>
        </div>

        <script>
            document.getElementById('profile-pic-input').addEventListener('change', function(event) {
                const file = event.target.files[0];
                if (file) {
                    const reader = new FileReader();
                    reader.onload = function(e) {
                        document.getElementById('profile-pic').src = e.target.result;
                    }
                    reader.readAsDataURL(file);
                }
            });
        </script>
        </body>
        </html>
