@extends('layout.index')
@section('content')
    <div class="layout-px-spacing">
        <div class="middle-content container-xxl p-0">
            <!-- BEGIN GLOBAL MANDATORY STYLES -->
            <!-- END GLOBAL MANDATORY STYLES -->

            <div class="seperator-header layout-top-spacing">
                <h3 class="">Tabel Parameter</h3>
            </div>

            <div class="row layout-spacing">
                <div class="col-lg-12">
                    <div class="statbox widget box box-shadow">
                        <div class="widget-content widget-content-area">
                            <table id="style-3" class="table style-3 dt-table-hover">
                                <thead>
                                <tr>
                                    <th class="text-center"> Record Id</th>
                                    <th class="text-center">Code Alat</th>
                                    <th class="text-center">Temperature</th>
                                    <th class="text-center">Humadity</th>
                                    <th class="text-center">PM 2.5</th>
                                    <th class="text-center">PM 10</th>
                                    <th class="text-center">Ozon</th>
                                    <th class="text-center">VOC</th>
                                    <th class="text-center">Kualitas Udara</th>
                                    <th class="text-center">Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($datas as $data)
                                    <tr>
                                        <td class="text-center"> {{ $loop->iteration }} </td>
                                        <td class="text-center">{{ $data->code }}</td>
                                        <td class="text-center">{{ $data->temp }}</td>
                                        <td class="text-center">{{ $data->hum }}</td>
                                        <td class="text-center">{{ $data->pm25 }}</td>
                                        <td class="text-center">{{ $data->pm10 }}</td>
                                        <td class="text-center">{{ $data->ozon }}</td>
                                        <td class="text-center">{{ $data->voc }}</td>
                                        <td class="text-center">{{ $data->kualitas }}</td>
                                        <td class="text-center">
                                            <ul class="table-controls">
                                                <li><a href="{{ route('delete_parameter', $data->id) }}" class="bs-tooltip"
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
                </div>
            </div>


            <!--  BEGIN CUSTOM SCRIPTS FILE  -->
            <!--  END CUSTOM SCRIPTS FILE  -->
        </div>
    </div>
@endsection
