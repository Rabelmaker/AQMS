@extends('layout.index')
@section('content')
    <div class="layout-px-spacing">
        <div class="middle-content container-xxl p-0">
            <!-- BEGIN GLOBAL MANDATORY STYLES -->
            <!-- END GLOBAL MANDATORY STYLES -->

            <div class="seperator-header layout-top-spacing">
                <h3 class="">Tambah Device</h3>
            </div>

            <div class="row layout-spacing">
                <div class="col-lg-12">
                    <div class="statbox widget box box-shadow">
                        <div class="widget-content widget-content-area">
                            <form action="{{ route('post_alat') }}" method="post" enctype="multipart/form-data" class="row g-3">
                                @csrf
                                <input type="hidden" name="mode" value="add">
                                <div class="col-12">
                                    <label for="inputCode" class="form-label">Code Alat</label>
                                    <input type="text" class="form-control" name="code" required id="inputCode" placeholder="Device v.1">
                                </div>
                                <div class="col-12">
                                    <label for="inputAlamat" class="form-label">Alamat</label>
                                    <input type="text" class="form-control" id="inputAlamat" name="alamat" required
                                           placeholder="Universitas Lancang Kuning">
                                </div>
                                <div class="col-md-6">
                                    <label for="inputLatitude" class="form-label">Latitude</label>
                                    <input type="text" class="form-control" id="inputLatitude" name="lat" required
                                           placeholder="0.5761342466549415">
                                </div>
                                <div class="col-md-6">
                                    <label for="inputLongitude" class="form-label">Longitude</label>
                                    <input type="text" class="form-control" id="inputLongitude" name="lon" required
                                           placeholder="101.42526743883724">
                                </div>
                                <button type="submit" class="btn btn-success col-2 mt-5 mb-2 me-4">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                         fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                         stroke-linejoin="round" class="feather feather-check-circle">
                                        <path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path>
                                        <polyline points="22 4 12 14.01 9 11.01"></polyline>
                                    </svg>
                                    <span class="btn-text-inner">Simpan Data</span>
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>


            <!--  BEGIN CUSTOM SCRIPTS FILE  -->
            <!--  END CUSTOM SCRIPTS FILE  -->
        </div>
    </div>

@endsection
