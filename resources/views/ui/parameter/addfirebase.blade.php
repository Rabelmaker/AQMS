@extends('layout.index')
@section('content')
    <div class="layout-px-spacing">
        <div class="middle-content container-xxl p-0">
            <!-- BEGIN GLOBAL MANDATORY STYLES -->
            <!-- END GLOBAL MANDATORY STYLES -->

            <div class="seperator-header layout-top-spacing">
                <h3 class="">Tambah Parameter</h3>
            </div>

            <div class="row layout-spacing">
                <div class="col-lg-12">
                    <div class="statbox widget box box-shadow">
                        <div class="widget-content widget-content-area">
                            <form action="{{ route('post_parameter') }}" method="post" enctype="multipart/form-data" class="row g-3">
                                @csrf
                                <input type="hidden" name="mode" value="add">
                                <div class="col-md-12">
                                    <label for="inputcodealat" class="form-label">Code Alat</label>
                                    <select class="form-select" id="code_alat" name="id_alat" required>
                                        @foreach($alatDatas as $alat)
                                            <option value="code_alat">Code Alat</option>
                                            <option value="{{ $alat->id }}">{{ $alat->code }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-2">
                                    <label for="inputtemp" class="form-label">Temperature</label>
                                    <input type="text" class="form-control" id="temp" name="temp" required
                                           placeholder="">
                                </div>
                                <div class="col-md-2">
                                    <label for="inputhum" class="form-label">Humadity</label>
                                    <input type="text" class="form-control" id="hum" name="hum" required
                                           placeholder="">
                                </div>
                                <div class="col-md-2">
                                    <label for="inputpm25" class="form-label">PM2.5</label>
                                    <input type="text" class="form-control" id="pm25" name="pm25" required
                                           placeholder="">
                                </div>
                                <div class="col-md-2">
                                    <label for="inputpm10" class="form-label">PM10</label>
                                    <input type="text" class="form-control" id="pm10" name="pm10" required
                                           placeholder="">
                                </div>
                                <div class="col-md-2">
                                    <label for="inputozon" class="form-label">Ozon</label>
                                    <input type="text" class="form-control" id="ozon" name="ozon" required
                                           placeholder="">
                                </div>
                                <div class="col-md-2">
                                    <label for="inputco" class="form-label">CO</label>
                                    <input type="text" class="form-control" id="co" name="co" required
                                           placeholder="">
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
