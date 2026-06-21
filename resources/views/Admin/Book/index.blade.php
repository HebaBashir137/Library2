<!-- Admin/Book/index.blade.php -->
  @extends('layout.dashboard')
   @section('content') 
   <div class="container-fluid">
     <div class="top-bar-royal mb-4">
         <div> <h1 class="page-title-royal mb-2">Books Management</h1> 
         <div class="breadcrumb-royal">
             <a href="{{ route('dashboard.index') }}">Dashboard</a>
              <span class="separator">/</span> <span>Books</span> 
            </div>
         </div> 
         <div class="control-royal">
             <form action="{{ route('books.index') }}" method="GET" class="d-flex gap-2">
                 <input type="text" name="search" class="form-control" placeholder="Search books..." value="{{ $search ?? '' }}"> 
                 <button type="submit" class="btn-purple">Search</button> 
                </form> <a href="{{ route('books.create') }}" class="btn-purple"> 
                    <i class="fas fa-plus me-2"></i> Add Book </a> </div> </div>
                     @if(session('success'))
                      <div class="alert alert-success alert-dismissible fade show" role="alert"> {{ session('success') }} 
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button> 
                    </div> 
                    @endif <div class="royal-card"> 
                        <div class="table-responsive">
                             <table class="table table-hover"> 
                                <thead> 
                                    <tr>
                                         <th>#</th> 
                                         <th>Image</th> 
                                         <th>Title</th> 
                                         <th>Author</th> 
                                         <th>Type</th>
                                          <th>Quantity</th>
                                           <th>Price</th> 
                                           <th>Actions</th>
                                         </tr> </thead> 
                                         <tbody>
                                             @foreach($books as $book)
                                              <tr> <td>{{ $loop->iteration }}</td> 
                                              <td> @if($book->imgurl) <img src="{{ $book->imgurl }}" alt="Book cover" class="rounded" width="50" height="60" style="object-fit: cover;"> @else <div class="bg-purple-100 rounded d-flex align-items-center justify-content-center" style="width: 50px; height: 60px;"> 
                                                <i class="fas fa-book text-purple-600"></i> </div> @endif </td> <td><strong>{{ $book->title }}</strong></td>
                                                 <td>{{ $book->author ?? '-' }}</td>
                                                  <td>{{ $book->type?->name ?? '-' }}</td>
                                                   <td>{{ $book->quantity }}</td> 
                                                   <td>${{ number_format($book->price, 2) }}</td> 
                                                   <td> <div class="btn-group" role="group"> 
                                                    <a href="{{ route('books.show', $book->id) }}" class="btn btn-sm btn-outline-primary"> 
                                                    <i class="fas fa-eye"></i> </a>
                                                     <a href="{{ route('books.edit', $book->id) }}" class="btn btn-sm btn-outline-warning"> 
                                                        <i class="fas fa-edit"></i> </a>
                                                         <form action="{{ route('books.destroy', $book->id) }}" method="POST" class="d-inline"> 
                                                            @csrf @method('DELETE') <button type="submit" class="btn btn-sm btn-outline-danger" onclick="return confirm('Delete this book?')"> 
                                                                <i class="fas fa-trash"></i> 
                                                            </button> 
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
                                         @endsection