
    <style>
        .article {
            height: 7rem;
            width: 10rem;
            background: rgba(193, 121, 121, 0.45);
            box-shadow: 0 8px 32px 0 rgba(31, 38, 135, 0.37);
            backdrop-filter: blur(18px);
            -webkit-backdrop-filter: blur(18px);
            border-radius: 10px;
            border: 1px solid rgba(71, 131, 227, 0.18);

        }

        .article p {
            font-size: large;
            font-weight: bold;
        }

        .article span {
            color: blueviolet;
            font-size: large;
            font-weight: bold;

        }

    </style>

   <div class="d-flex flex-column d-none d-sm-flex  p-3 text-white bg-black " style="width: 280px; height:100vh;">
       <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-white text-decoration-none">

           <span class="fs-4"></span>
       </a>
       <hr>
       <ul class="nav nav-pills flex-column mb-auto">
           <li class="nav-item">
               <button class="btn btn-outline-primary">
                   <a href="" class="nav-link text-white">
                       Dashboard
                   </a>
               </button>

           </li>
           <li class="nav-item my-2">
               <button class="btn btn-outline-primary">
                   <a href="{{route('plats.create')}}" class="nav-link text-white">
                       add Meal
                   </a>
               </button>

           </li>


       </ul>
       <hr>
       <div class="dropdown">
           <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
               <strong>option</strong>
           </a>
           <ul class="dropdown-menu dropdown-menu-dark text-small shadow" aria-labelledby="dropdownUser1">
               <li><a class="dropdown-item" href="{{route('users.index')}}">Profile</a></li>
               <li>
                   <hr class="dropdown-divider">
               </li>
               <li><a class="dropdown-item" href="logout">Sign out</a></li>
           </ul>
       </div>
   </div>
   
