@extends('layout.main')
@section('judul', 'Data Teacher')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <a class="btn btn-primary mb-2" href="{{ url('/teacher/add') }}">Tambah Data Teacher</a>
                    <div class="table-responsive">
                        <table class="table">
                            <thead>

                            </thead>
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Email</th>
                                <th>Tanggal Lahir</th>
                                <th>Umur</th>
                                <th>Action</th>
                            </tr>
                            <tbody>
                                @php($i = 1)
                                @foreach ($teachers as $teacher)
                                    <tr>
                                        <td>{{ $i++ }}</td>
                                        <td>{{ $teacher->name }}</td>
                                        <td>{{ $teacher->email }}</td>
                                        <td>{{ $teacher->dob }}</td>
                                        <td>{{$teacher->age}} Tahun</td>
                                        <td>
                                            <a class="btn btn-warning btn-sm"
                                                href="{{ url('teacher/edit/' . $teacher->id) }}">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <button type="button" data-id-teacher="{{ $teacher->id }}"
                                                data-name="{{ $teacher->name }}" class="btn btn-danger btn-sm btn-hapus">
                                                <i class="fas fa-trash"></i>
                                            </button>

                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{ $teachers->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('js')
    <script>
        $(function() {
            $('.btn-hapus').on('click', function() {
                let idTeacher = $(this).data('id-teacher');
                let name = $(this).data('name');
                Swal.fire({
                    title: "Konfirmasi",
                    text: `Anda Yakin Hapus Data dengan nama ${name}?`,
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#3085d6",
                    cancelButtonColor: "#d33",
                    confirmButtonText: "Ya, Hapus",
                    cancelmButtonText: "Batal"
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            url: '/teacher/delete',
                            type: 'POST',
                            data:{
                                _token : '{{csrf_token()}}',
                                id : idTeacher
                            },
                            success : function(){
                                swal.fire('Sukses','Data Berhasil Di Hapus','success')
                                .then(function(){
                                    window.location.reload()
                                })
                            },
                            error :  function(){
                                swal.fire('Gagal','Terjadi Kesalahan Ketika Hapus Data','error');
                            }
                        });
                    }
                });
            })
        })
    </script>
@endpush
