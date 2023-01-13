<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
 </head>
 @include("sections.header")
  <body>
   <div class="container">
    <h2 class="mt-4 mb-4">Admin Page</h2>
    <div class="row">
        <h4 class="mt-4 mb-4">Add Book</h4>
        <div class="col-md-6">
            <form action={{ route('admin') }} method="POST">
                @csrf
                <div class="mb-3">
                  <label for="title" class="form-label">Title</label>
                  <input type="text" class="form-control" name="title" class="@error('title') is-invalid @enderror">
                  
                    @error('title')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="author" class="form-label">Author</label>
                    <input type="text" class="form-control" name="author" class="@error('author') is-invalid @enderror">
                </div>
                    @error('author')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                <div class="mb-3">
                    <label for="ISBN" class="form-label">ISBN</label>
                    <input type="number" class="form-control" name="ISBN" class="@error('ISBN') is-invalid @enderror">
                </div>
                        @error('ISBN')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                <button type="submit" class="btn btn-primary">Submit</button>
              </form>
        </div>
    
        <div class="col-md-6">
            <table class="table">
                <thead>
                  <tr>
                    <th scope="col">Title</th>
                    <th scope="col">Author</th>
                    <th scope="col">ISBN</th>
                    <th>Action</th>

                    
                  </tr>
                </thead>
               @foreach ($books as $book)
               <tbody>
                <tr>
                  <td>{{ $book->title }}</td>
                  <td>{{ $book->author }}</td>
                  <td>{{ $book->ISBN }}</td>
                  
                  <td>
                    <Form action="{{ Route('deletebook') }}" method="POST">

                      <div class="btn-group">
                        
                          <a class="btn btn-info" title="Edit Book" href="{{ Route('editbook', ["id" => $book->bookId] )}}"><i class="fa fa-edit"></i></a> 
                          
                                @csrf
                                <input type='hidden' name='id' value={{ $book->bookId }} id=id  />

                            <button class="btn btn-danger" data-toggle="modal" title="Delete Book"><i class="fa fa-trash"></i></button>
                          
                      </div>
                    </Form>

                  </td>
                </tr>
                
               
              </tbody>
               @endforeach
            </table>
        </div>
    </div>
   </div>
  </body>
</html>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js" integrity="sha384-mQ93GR66B00ZXjt0YO5KlohRA5SY2XofN4zfuZxLkoj1gXtW8ANNCe9d5Y3eG5eD" crossorigin="anonymous"></script>