<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Trainings</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/dataTables.bootstrap5.min.css">
</head>

<body data-bs-theme="dark">
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
            <a class="navbar-brand" href="javascript:void(0);">Minori</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="{{ route('employees') }}">Employees</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('trainings') }}">Trainings</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="container mt-5 pt-5">
        <h4>Training List</h4>
        <div class="card mt-4 p-2">
            <div class="card-body">
                <table class="table table-striped" id="trainingTable">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Jenis</th>
                            <th>Tgl Sertifikat</th>
                            <th>NIP</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>

    <div class="offcanvas offcanvas-end @if(count($errors) > 0) show @endif" tabindex="-1" id="offcanvasTraining"
        aria-labelledby="offcanvasExampleLabel">
        <div class="offcanvas-header">
            <h5 class="offcanvas-title" id="offcanvasExampleLabel">Tambah Training</h5>
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body">
            <form action="{{ route('training.store') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="type" class="form-label">Jenis</label>
                    <select class="form-select @error('type') is-invalid @enderror" id="type" name="type">
                        @foreach($trainingTypes as $type)
                        <option value="{{ $type->id }}">{{ $type->type }}</option>
                        @endforeach
                    </select>
                    @error('type')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div><div class="mb-3">
                    <label for="date" class="form-label">Tanggal Sertifikat</label>
                    <input type="text" class="form-control @error('date') is-invalid @enderror" id="date" name="date"
                        aria-describedby="date" placeholder="2023-01-01" required>
                    @error('date')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="employee" class="form-label">Karyawan</label>
                    <select class="form-select @error('employee') is-invalid @enderror" id="employee" name="employee">
                        @foreach($employees as $employee)
                        <option value="{{ $employee->id }}">{{ $employee->profile->name }}</option>
                        @endforeach
                    </select>
                    @error('employee')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary mt-3">Simpan</button>
            </form>
        </div>
    </div>

    <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasTraining"
        aria-labelledby="offcanvasExampleLabel">
        <div class="offcanvas-header">
            <h5 class="offcanvas-title" id="offcanvasExampleLabel">Tambah Training</h5>
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body">
            <form action="{{ route('training.store') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="type" class="form-label">Jenis</label>
                    <select class="form-select @error('type') is-invalid @enderror" id="type" name="type">
                        @foreach($trainingTypes as $type)
                        <option value="{{ $type->id }}">{{ $type->type }}</option>
                        @endforeach
                    </select>
                    @error('type')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div><div class="mb-3">
                    <label for="date" class="form-label">Tanggal Sertifikat</label>
                    <input type="text" class="form-control @error('date') is-invalid @enderror" id="date" name="date"
                        aria-describedby="date" placeholder="2023-01-01" required>
                    @error('date')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="employee" class="form-label">Karyawan</label>
                    <select class="form-select @error('employee') is-invalid @enderror" id="employee" name="employee">
                        @foreach($employees as $employee)
                        <option value="{{ $employee->id }}">{{ $employee->profile->name }}</option>
                        @endforeach
                    </select>
                    @error('employee')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary mt-3">Simpan</button>
            </form>
        </div>
    </div>

    <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasTrainingType"
        aria-labelledby="offcanvasExampleLabel">
        <div class="offcanvas-header">
            <h5 class="offcanvas-title" id="offcanvasExampleLabel">Tambah Jenis Sertifikat</h5>
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body">
            <form action="{{ route('training.store') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="name" class="form-label">Jenis Sertifikat</label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name"
                        aria-describedby="date" placeholder="TQCSI" required>
                    @error('name')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary mt-3">Simpan</button>
            </form>
        </div>
    </div>

</body>
<script src="https://code.jquery.com/jquery-3.7.1.min.js"
    integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.7/js/dataTables.bootstrap5.min.js"></script>
<script>
    $(function() {
        const TABLE = $('#trainingTable');

        TABLE.DataTable({
            serverSide: true,
            ajax: "{{ route('trainings') }}",
            columns: [
                { data: 'id', orderable: false },
                { data: 'certificate_type', name: 'type.type', orderable: false },
                { data: 'certificate_date' },
                { data: 'nip', name: 'employee.profile.nip'}
            ],
            order: [[2, 'ASC']],
            rowCallback: (row, data, index) => $('td:eq(0)', row).html(index+1),
            initComplete: function () {
                $('.dataTables_filter').parent().addClass('d-flex justify-content-end').append('<button class="btn btn-sm btn-primary ms-3" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasTraining" aria-controls="offcanvasTraining">+ Tambah Training</button>');
                $('.dataTables_filter').parent().addClass('d-flex justify-content-end').append('<button class="btn btn-sm btn-primary ms-3" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasTrainingType" aria-controls="offcanvasTrainingType">+ Tambah Jenis Sertifikat</button>');
            }
        });
    });
</script>

</html>
