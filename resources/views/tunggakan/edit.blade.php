@extends('layouts.master')
@section('content')
@if(Auth::user()->role !='Admin')
                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- 404 Error Text -->
                    <div class="text-center" style="margin-top:200px;">
                        <div class="error mx-auto" data-text="404">404</div>
                        <p class="lead text-gray-800 mb-5">Page Not Found</p>
                        <p class="text-gray-500 mb-0">It looks like you found a glitch in the matrix...</p>
                        <a href="{{asset('dashboard')}}">&larr; Back to Dashboard</a>
                    </div>

                </div>
                <!-- /.container-fluid -->
@endif

@if(Auth::user()->role !='Petugas')
@if(Auth::user()->role !='Siswa')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Edit Tunggakan</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('tunggakan.index') }}">Kembali</a>
        </div>
    </div>
</div>

<br>

@if ($errors->any())
<div class="alert alert-danger">
    <strong>Whoops!</strong> There were some problems with your input.<br><br>
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

<form action="{{route('tunggakan.update', $tunggakan->id)}}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Nisn</strong>
                <select name="id_siswa" id="" class="form-control" >
                    <option selected >{{$tunggakan->id_siswa}}</option>
                    @foreach($nama as $row)
                        <option {{ $row->id== old('nis', $tunggakan->id)  ? 'selected' : '' }} value="{{$row->id}}">
                        {{ $row->nis}}
                        </option>
                    @endforeach
                </select>            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>bulan_nunggak</strong>
                <input class="form-control" type="text" name="bulan" value="{{$tunggakan->bulan}}">          
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Sisa Tunggakan</strong>
                <input class="form-control" type="text" name="sisa_tunggakan"  value="{{$tunggakan->sisa_tunggakan}}">          
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Sisa Bulan</strong>
                <input class="form-control" type="text" name="sisa_bulan"  value="{{$tunggakan->sisa_bulan}}">          
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Total Harga</strong>
                <input class="form-control" type="text" name="total_tunggakan"  value="{{$tunggakan->total_tunggakan}}">          
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
            <button type="submit" class="btn btn-primary">Update</button>
        </div>
    </div>

</form>
@endif
@endif
@endsection

@section('title')
edit tunggakan
@stop