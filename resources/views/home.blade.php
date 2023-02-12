@extends('layouts.app')



@section('content')
    <div class="d-flex  h-100 align-items-center">
         @include('layouts.sidebar')
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
        
        <div class="container bg-black vh-100 p-3  bg-opacity-10 border border-info border-start-0 rounded-end">
            <a href="logout" class=" d-sm-none bg-primary rounded rounded-1 p-2"> <i class="fa-solid fa-right-from-bracket text-white"></i></a>
        
            <div class="row g-2 justify-content-center">
                <div class="col-12 row text-center d-flex align-content-between  ">
                    <div class="col d-flex justify-content-center ">
                        <div class="article ">
                            <p>number of articles</p>
                            <span></span>
                        </div>
                    </div>
                    <div class=" col m-1 d-flex justify-content-center ">
                        <div class="article">
                            <p>number of users</p>
                            <span></span>
                        </div>
        
                    </div>
                    <div class=" col d-flex justify-content-center ">
                        <div class="article">
                            <p>number of authors</p>
                            <span></span>
                        </div>
        
                    </div>
        
                </div>
                <div class="col-md-12    mx-auto">
                    
                    <div class="card">
                        <div class="card-body bg-light">
                            <form action="" method="post" class=" form-control d-flex justify-content-end   ">
        
                                <div class="d-block d-sm-flex justify-content-between" style="width: 17rem;">
                                    <input type="text" name="search" id="" placeholder="recherche" class="float-right  rounded-1  " style="width: 12rem;">
                                    <div class="d-flex justify-content-between  " style="width: 4.5rem;">
                                        <button type="submit" name="find" class="btn btn-sm btn-info"> <i class="fa fa-search"></i> </button>
                                        <button type="submit" name="sort" class="btn btn-sm btn-info"> <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-funnel" viewBox="0 0 16 16">
                                                <path d="M1.5 1.5A.5.5 0 0 1 2 1h12a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-.128.334L10 8.692V13.5a.5.5 0 0 1-.342.474l-3 1A.5.5 0 0 1 6 14.5V8.692L1.628 3.834A.5.5 0 0 1 1.5 3.5v-2zm1 .5v1.308l4.372 4.858A.5.5 0 0 1 7 8.5v5.306l2-.666V8.5a.5.5 0 0 1 .128-.334L13.5 3.308V2h-11z" />
                                            </svg> </button>
                                    </div>
                                </div>
        
                            </form>
                             
                                 
                            
                            @if (session()->has('status'))  
                                <div class="alert alert-success alert-dismissible fade show">
                                <strong>success!</strong>
                                {{session()->get('status')}}
                                <button type="button" class="btn-close" data-bs-dismiss="alert">
                                </button>
                                </div>
                            @endif
                        
                        
                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th scope="col">img</th>
                                            <th scope="col">name</th>
                                            <th scope="col">discreption</th>
                                            <th scope="col">category</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                     
                                        
                                        @foreach ($plats as $item)
                                            <tr>
                                                    {{-- <img src="..{{Storage::url($item->img)}}" alt="" srcset=""> --}}
                                                    <td scope="row "><img src="images/{{$item->img}}" alt="" srcset="" style="width: 3rem;"></td>
                                                    <td>{{$item->name}}</td>
                                                    <td>{{$item->discretion}}</td>
                                                    <td>@if ($item->category)
                                                        {{ 'food' }}
                                                    @else
                                                        {{'drink'}}
                                                    @endif</td>
                                                    
                                                    <td>
                                                            <div class=" d-flex ">
                                                                 <a class="btn btn-sm btn-warning me-1" href="{{route('plats.edit',['plat'=>$item->id])}}">Edit<i class="bi bi-pencil"></i></a>  
                                                                <form action="{{route('plats.destroy',['plat'=>$item->id])}}" method="POST">
                                                                    @csrf
                                                                    @method('DELETE')
                                                                    <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                                                                </form>
                                                            </div>
                                                    </td>
                                                    
                                                    
                                                    
                                                </tr>
                                                @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
    </div>
@endsection
