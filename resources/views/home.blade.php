<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
</head>

<body class="bg-dark">

    <div class="container py-5">
        <div class="row">
            <div class="col-lg-6">
                <form action="/siswa" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label text-light">Nis</label>
                        <input type="text" name="nis" class="form-control @error('nis') is-invalid @enderror"
                            id="exampleInputEmail1" aria-describedby="emailHelp">
                        @error('nis')
                            <div class="alert alert-danger" role="alert">
                                
                                <div>
                                    {{ $message }}
                                </div>
                            </div>
                        @enderror

                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label text-light">Nama</label>
                        <input type="text" name="nama" class="form-control @error('nis') is-invalid @enderror"
                            id="exampleInputPassword1">
                    </div>

                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>

                @if (session()->has('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif

                <table class="table table-dark">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Nis</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Date</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($siswas as $i=>$row)
                            
                        <tr>
                            <th scope="row">{{ ++$i }}</th>
                            <td>{{ $row->nis }}</td>
                            <td>{{ $row->nama }}</td>
                            <td>{{ $row->created_at->format('Y M d') }}</td>
                            <td>
                                <form action="/siswa/{{ $row->id_siswa }}" method="POST">
                                    @csrf
                                    @method('delete')
                                    <button class="btn btn-danger badge">Delete</button>
                                </form>
                                <a href="/form/edit/{{ $row->id_siswa }}" class="btn btn-warning badge">
                                    Edit
                                </a>
                            </td>
                        </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
        </div>

    </div>

    <div class="mt-3">
        <center>

            <img src="https://media.tenor.com/x8v1oNUOmg4AAAAM/rickroll-roll.gif" alt="">
        </center>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous">
    </script>
</body>

</html>
