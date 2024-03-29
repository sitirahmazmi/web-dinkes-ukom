@extends('layouts.template')
@section('sidebar')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="m-0">Beranda</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Dashboard v1</li>
            </ol>
        </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <div class="card">
        <br>
        <h4> Selamat Datang di Sistem Informasi Pendaftaran Uji Kompetensi Dinas Kesehatan Provinsi Kalimantan Barat</h4>
        <br>
        <!-- Main content -->
        <section class="content">
        <div class="container-fluid">
            <!-- Small boxes (Stat box) -->
            <div class="row">
            <div class="col-lg-5 col-10">
                <!-- small box -->
                <div class="small-box bg-success">
                <div class="inner">
                    <h3>150</h3>
                    
                    <p>Daftar Pengguna</p>
                </div>
                <div class="icon">
                    <i class="ion ion-person-add"></i>
                </div>
                <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-5 col-10">
                    <!-- small box -->
                <div class="small-box bg-warning">
                    <div class="inner">
                    <h3>53<sup style="font-size: 20px">%</sup></h3>
        
                    <p>Daftar Upload</p>
                    </div>
                    <div class="icon">
                    <i class="ion ion-stats-bars"></i>
                    </div>
                    <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
                </div>
                <div class="col-lg-5 col-10">
                    <!-- small box -->
                <div class="small-box bg-danger">
                    <div class="inner">
                    <h3>53<sup style="font-size: 20px">%</sup></h3>
        
                    <p>Daftar Belum Upload</p>
                    </div>
                    <div class="icon">
                    <i class="ion ion-stats-bars"></i>
                    </div>
                    <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
                </div>
                <div class="col-lg-5 col-10">
                    <!-- small box -->
                    <div class="small-box bg-info">
                    <div class="inner">
                        <h3>65</h3>
        
                        <p>Daftar Verifikasi</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-pie-graph"></i>
                    </div>
                    <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                
                <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </section>
            <!-- right col -->
            </div>
            <!-- /.row (main row) -->
        </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
    
</div>
    @endsection
@section('footer')