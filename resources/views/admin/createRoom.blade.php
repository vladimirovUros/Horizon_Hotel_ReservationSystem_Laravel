<DOCTYPE html>
    <html lang="en">
    @include("fixed.head")
    <body>
    <div id="adminDiv">
        <div id="navAdmin">
            <p id="adminSite">Hotel Horizon</p>
            @csrf
            <a href="{{route("home")}}" id="home">Home</a>
            <ul>
                <!-- Your navigation links -->
            </ul>
        </div>
        <div id="mainAdmin">
            <h1> Hi, {{session()->get("users")->username}}</h1>
            <h2>Welcome to admin panel</h2>

            <!-- Add Room Form (Initially Hidden) -->
            <div id="addRoomForm">
                <h2>Add Room</h2>
                <form id="createRoomForm" enctype="multipart/form-data">
                    @csrf <!-- CSRF protection for form submission -->
                    <input type="text" name="name" placeholder="Room Name"><br>
                    <input type="number" name="size" placeholder="Room Size"><br>
                    <textarea name="description" placeholder="Room Description"></textarea><br>
                    <!-- Add more fields as needed -->
                    <input type="file" name="photos[]" multiple><br>
                    <button type="submit">Create Room</button>
                </form>
            </div>
        </div>
    </div>
    @include("fixed.scripts")
    <script>
        // JavaScript to toggle visibility of the add room form
        document.getElementById("addRooms").addEventListener("click", function() {
            document.getElementById("addRoomForm").style.display = "block";
        });
    </script>
    </body>
    </html>
