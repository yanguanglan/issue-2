<!-- resources/views/errors/form.blade.php -->
@if (count($errors) > 0)
    <!-- Form Error List -->
    <div class="col-md-12">
    <div class="alert alert-danger">
        <strong>Whoops! Something went wrong!</strong>

        <br><br>

        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    </div>
@endif