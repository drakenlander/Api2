<!-- resources/views/games/edit.blade.php -->
<head>
    <!-- Other head elements -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h3 class="text-center">Editar Producto</h3>
                </div>
                <div class="card-body">
                    <form action="{{ route('games.update', $game->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="title">Título</label>
                            <input type="text" name="title" id="title" class="form-control" value="{{ $game->title }}">
                        </div>
                        <button type="submit" class="btn btn-primary btn-block mt-3">Actualizar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>