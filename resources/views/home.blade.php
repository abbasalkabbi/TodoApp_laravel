<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Todo App</title>
    <!------>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <!------>
</head>
<body>
    <section class="vh-100" style="background-color: #eee;">
        <div class="container py-5 h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col col-lg-9 col-xl-7">
            <div class="card rounded-3">
                <div class="card-body p-4">
                <h4 class="text-center my-3 pb-3">To Do App</h4>
                <!-----if add item----->
                @if (Session::has('add_item'))
                <div class="alert alert-success alert-dismissible" role="alert" id="liveAlertPlaceholder">
                    {{Session::get('add_item')}}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                @endif
                <!-----if add item- end---->
                <!-----if delete item----->
                @if (Session::has('Delete_item'))
                <div class="alert alert-danger alert-dismissible" role="alert" id="liveAlertPlaceholder">
                    {{Session::get('Delete_item')}}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                @endif
                <!-----if delete item- end---->
                <form method="POST"  action="{{Route('add.item')}}" class="d-flex justify-content-center align-items-center mb-4">
                    @csrf
                    <div class="form-outline flex-fill">
                        <input type="text" id="form3" class="form-control form-control-lg" placeholder="What do you need to do today?" />
                    </div>
                    <button type="submit" class="btn btn-primary btn-lg ms-2">Add</button>
                </form>
                <!---list to do---->
                <table class="table mb-4">
                    <thead>
                    <tr>
                        <th scope="col">id.</th>
                        <th scope="col">Todo item</th>
                        <th scope="col">Actions</th>
                    </tr>
                    </thead>
                    
                    <tbody>
                    @foreach ($todo_data as $item)
                    <!---item---->
                    <tr>
                        <th scope="row">{{$item->id}}</th>
                        <td>{{$item->context}}</td>
                        <td>
                        <a  href="delete\{{$item->id}}" class="btn btn-danger">Delete</a>
                        </td>
                    </tr>
                    <!---item---->
                    @endforeach
                    
                    </tbody>
                </table>
                <!---list to do-end--->
                </div>
            </div>
            </div>
        </div>
        </div>
    </section>
    <!------footer---->
    <footer class="bg-dark text-center text-white">
        <!-- Github -->
        <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
            Github
            <a class="text-white" href="https://github.com/abbasalkabbi">abbasalkabbi</a>
        </div>
        <!-- Github -->
    </footer>
    <!------footer-end--->
</body>
</html>