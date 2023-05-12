@extends('layouts.app')

<!-- cssファイルとjsファイルを読み込む -->
@push('styles')
    <link rel="styleshhet" href="{{ asset('/css/style.css') }}">
@endpush

@push('scripts')
    <script src="{{ asset('/js/script.js') }}"></script>
@endpush
 
 @section('content')
     <div class="container h-100"> 
         @if ($errors->any())
             <div class="alert alert-danger">
                 <ul>
                     @foreach ($errors->all() as $error)
                         <li>{{ $error }}</li>
                     @endforeach
                 </ul>
             </div>
         @endif
 
         <!-- ジャンルの追加用モーダル -->
         @include('modals.add_genre') 
         
         <!-- タグの追加用モーダル -->
         @include('modals.add_priority')
 
         <div class="d-flex mb-3">
             <a href="#" class="link-dark text-decoration-none" data-bs-toggle="modal" data-bs-target="#addGenreModal">
                 <div class="d-flex align-items-center">
                     <span class="fs-5 fw-bold">＋</span>&nbsp;ジャンルの追加
                 </div>
             </a>  
             <a href="#" class="ms-4 link-dark text-decoration-none" data-bs-toggle="modal" data-bs-target="#addPriorityModal">
                 <div class="d-flex align-items-center">
                     <span class="fs-5 fw-bold">＋</span>&nbsp;優先度の追加
                 </div>
             </a>        
         </div>                                              
     </div>

     <div class="row row-cols-1 row row-cols-md-2 row-cols-lg-3 g-4">                         
             @foreach ($genres as $genre) 
             
                 <!-- ジャンルの編集用モーダル -->
                 @include('modals.edit_genre') 
 
                 <!-- ジャンルの削除用モーダル -->
                 @include('modals.delete_genre')  
 
                 <div class="col">     
                     <div class="card bg-light">
                         <div class="card-body d-flex justify-content-between align-items-center">
                             <h4 class="card-kind ms-1 mb-0">{{ $genre->kind }}</h4>
                             <div class="d-flex align-items-center">  
                                <a href="#" class="px-2 fs-5 fw-bold link-dark text-decoration-none " data-bs-toggle="modal" data-bs-target="#addBookModal{{ $genre->id }}">＋</a>                                                                
                                 <div class="dropdown">
                                     <a href="#" class="dropdown-toggle px-1 fs-5 fw-bold link-dark text-decoration-none menu-icon" id="dropdownGenreMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false"></a>
                                     <ul class="dropdown-menu dropdown-menu-end text-center" aria-labelledby="dropdownGenreMenuLink">
                                         <li><a href="#" class="dropdown-item" data-bs-toggle="modal" data-bs-target="#editGenreModal{{ $genre->id }}">編集</a></li>                                   
                                         <div class="dropdown-divider"></div>
                                         <li><a href="#" class="dropdown-item" data-bs-toggle="modal" data-bs-target="#deleteGenreModal{{ $genre->id }}">削除</a></li>                                                                                                          
                                     </ul>
                                 </div>
                             </div>
                         </div>
                            <!-- 書籍の追加用モーダル -->
                            @include('modals.add_book') 

                            @foreach ($genre->books()->orderBy('done', 'asc')->get() as $book) 
                            
                             <!-- Bookの編集用モーダル -->
                             @include('modals.edit_book')
 
                             <!-- Bookの削除用モーダル -->
                             @include('modals.delete_book')
 
                             <div class="card mx-2 mb-2">
                                 <div class="card-body">
                                     <div class="d-flex justify-content-between align-items-center mb-2">
                                        <h5 class="card-title ms-1 mb-0">
                                             @if ($book->done)
                                                 <s>{{ $book->title }}</s>
                                             @else
                                                 {{ $book->title }}
                                             @endif
                                         </h5>                                        
                                         <div class="dropdown">
                                             <a href="#" class="dropdown-toggle px-1 fs-5 fw-bold link-dark text-decoration-none menu-icon" id="dropdownBookMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false"></a>
                                             <ul class="dropdown-menu dropdown-menu-end text-center" aria-labelledby="dropdownBookMenuLink">
                                                <li>
                                                    <form action="{{ route('genres.books.update', [$genre, $book]) }}" method="post">
                                                         @csrf
                                                         @method('patch')
                                                         <input type="hidden" name="title" value="{{ $book->title }}">
                                                         @if ($book->done)  
                                                             <input type="hidden" name="done" value="false">
                                                             <button type="submit" class="dropdown-item btn btn-link">未読了</button>
                                                         @else
                                                             <input type="hidden" name="done" value="true">
                                                             <button type="submit" class="dropdown-item btn btn-link">読了済み</button> 
                                                         @endif
                                                    </form>                                                       
                                                 </li> 
                                                 <li><a href="#" class="dropdown-item" data-bs-toggle="modal" data-bs-target="#editBookModal{{ $book->id }}">編集</a></li>                                                  
                                                 <div class="dropdown-divider"></div>
                                                 <li><a href="#" class="dropdown-item" data-bs-toggle="modal" data-bs-target="#deleteBookModal{{ $book->id }}">削除</a></li>  
                                             </ul>
                                         </div>
                                     </div>                                        
                                     <h6 class="card-subtitle ms-1 mb-1 text-muted">{{ $book->created_at }}</h6>                                                               
                                    <div class="d-flex flex-wrap mx-1 mb-1">
                                         @foreach ($book->priorities()->orderBy('id', 'asc')->get() as $priority)                                    
                                             <span class="badge bg-secondary mt-2 me-2 fw-light">{{ $priority->level }}</span>                                      
                                         @endforeach   
                                    </div>        
                                </div>                                
                             </div>
                         @endforeach
                     </div>                           
                 </div>
             @endforeach                       
         </div>  
 @endsection