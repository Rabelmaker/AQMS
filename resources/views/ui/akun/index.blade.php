@extends('layout.index')
@section('content')
    <div class="layout-px-spacing">
        <div class="middle-content container-xxl p-0">
            <!-- BEGIN GLOBAL MANDATORY STYLES -->
            <!-- END GLOBAL MANDATORY STYLES -->

            <div class="seperator-header layout-top-spacing">
                <h3 class="">Tabel Akun</h3>
            </div>

            <div class="row layout-spacing">
                <div class="col-lg-12">
                    <div class="statbox widget box box-shadow">
                        <div class="widget-content widget-content-area">
                            <table id="style-3" class="table style-3 dt-table-hover">
                                <thead>
                                <tr>
                                    <th class="text-center"> Record Id</th>
                                    <th class="text-center">Nama</th>
                                    <th class="text-center">Username</th>
                                    <th class="text-center">Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($datas as $data)
                                    <tr>
                                        <td class="text-center"> {{ $loop->iteration }} </td>
                                        <td class="text-center">{{ $data->nama }}</td>
                                        <td class="text-center">{{ $data->username }}</td>
                                        <td class="text-center">
                                            <ul class="table-controls">
                                                <li><a href="   {{ route('edit_akun', $data->id) }}" class="bs-tooltip"
                                                       data-bs-toggle="tooltip" data-bs-placement="top" title="Edit"
                                                       data-original-title="Edit">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                             viewBox="0 0 24 24" fill="none" stroke="green"
                                                             stroke-width="2" stroke-linecap="round"
                                                             stroke-linejoin="round"
                                                             class="feather feather-edit-2 p-1 br-8 mb-1">
                                                            <path
                                                                d="M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z"></path>
                                                        </svg>
                                                    </a></li>
                                                <li><a href="{{ route('delete_akun', $data->id) }}" class="bs-tooltip"
                                                       data-bs-toggle="tooltip" data-bs-placement="top" title="Delete"
                                                       data-original-title="Delete">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                             viewBox="0 0 24 24" fill="none" stroke="red"
                                                             stroke-width="2" stroke-linecap="round"
                                                             stroke-linejoin="round"
                                                             class="feather feather-trash p-1 br-8 mb-1">
                                                            <polyline points="3 6 5 6 21 6"></polyline>
                                                            <path
                                                                d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path>
                                                        </svg>
                                                    </a></li>
                                            </ul>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <a href="{{ route('add_akun') }}">
                        <button class="btn btn-success mt-5 mb-2 me-4">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                                 stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                 class="feather feather-plus-circle">
                                <circle cx="12" cy="12" r="10"></circle>
                                <line x1="12" y1="8" x2="12" y2="16"></line>
                                <line x1="8" y1="12" x2="16" y2="12"></line>
                            </svg>
                            <span class="btn-text-inner">Tambah Akun</span>
                        </button>
                    </a>
                </div>
            </div>


            <!--  BEGIN CUSTOM SCRIPTS FILE  -->
            <!--  END CUSTOM SCRIPTS FILE  -->
        </div>
    </div>
@endsection
