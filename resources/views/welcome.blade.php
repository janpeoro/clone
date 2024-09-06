<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>GGclass</title>

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Press+Start+2P&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

    <!-- CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/general.css') }}">
    <link rel="stylesheet" href="{{ asset('css/header.css') }}">
    <link rel="stylesheet" href="{{ asset('css/dropdownmenu.css') }}">
    <link rel="stylesheet" href="{{ asset('css/modal-create.css') }}">
    <link rel="stylesheet" href="{{ asset('css/class-card.css') }}">

    
</head>

<body>
    <div class="header">
        <div class="left-section">
            <img class="logo-img" src="{{ asset('img/logo.png') }}" alt="GGclass Logo">
            <h1 class="logo-font">GGclass</h1>
        </div>

        <div class="right-section">
            <img class="create-class" src="{{ asset('img/plus.png') }}" alt="Create" id="create-class-btn" data-bs-toggle="dropdown" aria-expanded="false">

            <!-- Dropdown Menu -->
            <div class="dropdown-container">
                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    <li class="dropdown-item-container">
                        <a class="dropdown-item" href="#" id="create-class-option">Create Class</a>
                    </li>
                    <li class="dropdown-item-container">
                        <a class="dropdown-item" href="#" id="join-class-option">Join Class</a>
                    </li>
                </ul>
            </div>

            <!-- Modal for Create Class -->
           <!-- Modal for Create Class -->
            <div class="modal fade" id="createClassModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="createClassModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="createClassModalLabel">Create Class</h5>
                            <button type="button" class="btn-close" style="background-color: rgb(246, 246, 246)" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form id="createClassForm" action="{{ route('create.class') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="modal-form-sections">
                                    <!-- Section 1: Class Name, Section, and Image Upload -->
                                    <div id="section-1">
                                        <div class="form-section">
                                            <div class="mb-3">
                                                <label for="className" class="form-label">Class Name</label>
                                                <input type="text" class="form-control" id="className" name="class_name" placeholder="Class Name" aria-required="true">
                                            </div>
                                            <div class="mb-3">
                                                <label for="section" class="form-label">Section</label>
                                                <input type="text" class="form-control" id="section" name="section" placeholder="Section" aria-required="true">
                                            </div>
                                            <div class="mb-3">
                                                <label for="image" class="form-label">Class Image</label>
                                                <input type="file" class="form-control" id="image" name="image" accept="image/*">
                                            </div>
                                        </div>
                                        <button type="button" class="btn btn-primary" id="next-to-2">Next</button>
                                        <div id="error-message-1" class="text-danger mt-2" style="display: none;">Please fill in all required fields.</div>
                                    </div>
                                    <!-- Section 2: Subject and Room -->
                                    <div id="section-2" style="display: none;">
                                        <div class="form-section">
                                            <div class="mb-3">
                                                <label for="subject" class="form-label">Subject</label>
                                                <input type="text" class="form-control" id="subject" name="subject" placeholder="Subject" aria-required="true">
                                            </div>
                                            <div class="mb-3">
                                                <label for="room" class="form-label">Room</label>
                                                <input type="text" class="form-control" id="room" name="room" placeholder="Room" aria-required="true">
                                            </div>
                                        </div>
                                        <button type="button" class="btn btn-secondary" id="back-to-1">Back</button>
                                        <button type="button" class="btn btn-primary" id="next-to-3">Next</button>
                                        <div id="error-message-2" class="text-danger mt-2" style="display: none;">Please fill in all required fields.</div>
                                    </div>
                                    <!-- Section 3: Schedule -->
                                    <div id="section-3" style="display: none;">
                                        <div class="mb-3">
                                            <label for="schedule" class="form-label">Schedule</label>
                                            <input type="text" class="form-control" id="schedule" name="schedule" placeholder="Schedule" aria-required="true">
                                        </div>
                                        <button type="button" class="btn btn-secondary" id="back-to-2">Back</button>
                                        <button type="submit" class="btn btn-primary">Create</button>
                                        <div id="error-message-3" class="text-danger mt-2" style="display: none;">Please fill in all required fields.</div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>


            <!-- Modal for Join Class -->
            <div class="modal fade" id="joinClassModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="joinClassModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="joinClassModalLabel">Join Class</h5>
                            <button type="button" class="btn-close" style="background-color: rgb(246, 246, 246)" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form action="{{ route('join.class') }}" method="POST">
                                @csrf
                                <div class="mb-3">
                                    <label for="classCode" class="form-label">Class Code</label>
                                    <input type="text" class="form-control" id="classCode" name="class_code" aria-required="true">
                                </div>
                                <button type="submit" class="btn btn-primary">Join</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <img class="profile-img" src="{{ asset('img/ainz.jpg') }}" alt="Profile">
        </div>
    </div>

    <!--ClassCard -->

     <div class="container mt-5">
            <div class="row">
                @foreach($classes as $class)
                    <div class="col-12 col-md-6 col-lg-4 mb-3">
                        <div class="class-card">
                            <div class="class-card-image" style="background-image: url('{{ asset('storage/' . $class->image_path) }}');"></div>
                            <div class="class-card-info">
                                <h3 class="class-name">{{ $class->class_name }}</h3>
                                <p class="subject">{{ $class->subject }}</p>
                                <p class="section">{{ $class->section }}</p>
                                <p class="schedule">{{ $class->schedule }}</p>
                                <p class="room">{{ $class->room }}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>


    
        <!-- Scripts -->
    
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous" defer></script>
    <script src="{{ asset('js/modal-logic.js') }}" defer></script>
</body>

</html>