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
                                        <th class="checkbox-column text-center"> Record Id </th>
                                        <th class="text-center">Image</th>
                                        <th>First Name</th>
                                        <th>Last Name</th>
                                        <th>Email</th>
                                        <th>Mobile No.</th>
                                        <th class="text-center">Status</th>
                                        <th class="text-center dt-no-sorting">Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td class="checkbox-column text-center"> 1 </td>
                                        <td class="text-center">
                                            <span><img src="https://designreset.com/cork/laravel/build/assets/profile-17.146758b1.jpeg" class="profile-img" alt="avatar"></span>
                                        </td>
                                        <td>Donna</td>
                                        <td>Rogers</td>
                                        <td>donna@yahoo.com</td>
                                        <td>555-555-5555</td>
                                        <td class="text-center"><span class="shadow-none badge badge-primary">Approved</span></td>
                                        <td class="text-center">
                                            <ul class="table-controls">
                                                <li><a href="javascript:void(0);" class="bs-tooltip" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit" data-original-title="Edit"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit-2 p-1 br-8 mb-1"><path d="M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z"></path></svg></a></li>
                                                <li><a href="javascript:void(0);" class="bs-tooltip" data-bs-toggle="tooltip" data-bs-placement="top" title="Delete" data-original-title="Delete"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash p-1 br-8 mb-1"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path></svg></a></li>
                                            </ul>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="checkbox-column text-center"> 2 </td>
                                        <td class="text-center">
                                            <span><img src="https://designreset.com/cork/laravel/build/assets/profile-19.fc891c34.jpeg" class="profile-img" alt="avatar"></span>
                                        </td>
                                        <td>Andy</td>
                                        <td>King</td>
                                        <td>andyking@gmail.com</td>
                                        <td>555-555-6666</td>
                                        <td class="text-center"><span class="shadow-none badge badge-warning">Suspended</span></td>
                                        <td class="text-center">
                                            <ul class="table-controls">
                                                <li><a href="javascript:void(0);" class="bs-tooltip" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit" data-original-title="Edit"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit-2 p-1 br-8 mb-1"><path d="M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z"></path></svg></a></li>
                                                <li><a href="javascript:void(0);" class="bs-tooltip" data-bs-toggle="tooltip" data-bs-placement="top" title="Delete" data-original-title="Delete"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash p-1 br-8 mb-1"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path></svg></a></li>
                                            </ul>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="checkbox-column text-center"> 3 </td>
                                        <td class="text-center">
                                            <span><img src="https://designreset.com/cork/laravel/build/assets/profile-20.15512fa6.jpeg" class="profile-img" alt="avatar"></span>
                                        </td>
                                        <td>Alma</td>
                                        <td>Clarke</td>
                                        <td>Alma@live.com</td>
                                        <td>777-555-5555</td>
                                        <td class="text-center"><span class="shadow-none badge badge-danger">Closed</span></td>
                                        <td class="text-center">
                                            <ul class="table-controls">
                                                <li><a href="javascript:void(0);" class="bs-tooltip" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit" data-original-title="Edit"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit-2 p-1 br-8 mb-1"><path d="M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z"></path></svg></a></li>
                                                <li><a href="javascript:void(0);" class="bs-tooltip" data-bs-toggle="tooltip" data-bs-placement="top" title="Delete" data-original-title="Delete"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash p-1 br-8 mb-1"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path></svg></a></li>
                                            </ul>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="checkbox-column text-center"> 4 </td>
                                        <td class="text-center">
                                            <span><img src="https://designreset.com/cork/laravel/build/assets/profile-21.b531d25a.jpeg" class="profile-img" alt="avatar"></span>
                                        </td>
                                        <td>Vincent</td>
                                        <td>Carpenter</td>
                                        <td>vinnyc@outlook.com</td>
                                        <td>555-666-5555</td>
                                        <td class="text-center"><span class="shadow-none badge badge-primary">Approved</span></td>
                                        <td class="text-center">
                                            <ul class="table-controls">
                                                <li><a href="javascript:void(0);" class="bs-tooltip" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit" data-original-title="Edit"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit-2 p-1 br-8 mb-1"><path d="M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z"></path></svg></a></li>
                                                <li><a href="javascript:void(0);" class="bs-tooltip" data-bs-toggle="tooltip" data-bs-placement="top" title="Delete" data-original-title="Delete"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash p-1 br-8 mb-1"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path></svg></a></li>
                                            </ul>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="checkbox-column text-center"> 5 </td>
                                        <td class="text-center">
                                            <span><img src="https://designreset.com/cork/laravel/build/assets/profile-22.a515f544.jpeg" class="profile-img" alt="avatar"></span>
                                        </td>
                                        <td>Kristen</td>
                                        <td>Beck</td>
                                        <td>kristen@adobe.com</td>
                                        <td>444-444-4444</td>
                                        <td class="text-center"><span class="shadow-none badge badge-warning">Suspended</span></td>
                                        <td class="text-center">
                                            <ul class="table-controls">
                                                <li><a href="javascript:void(0);" class="bs-tooltip" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit" data-original-title="Edit"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit-2 p-1 br-8 mb-1"><path d="M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z"></path></svg></a></li>
                                                <li><a href="javascript:void(0);" class="bs-tooltip" data-bs-toggle="tooltip" data-bs-placement="top" title="Delete" data-original-title="Delete"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash p-1 br-8 mb-1"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path></svg></a></li>
                                            </ul>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="checkbox-column text-center"> 6 </td>
                                        <td class="text-center">
                                            <span><img src="https://designreset.com/cork/laravel/build/assets/profile-23.046ed092.jpeg" class="profile-img" alt="avatar"></span>
                                        </td>
                                        <td>Oscar</td>
                                        <td>Garner</td>
                                        <td>oscar@gmail.com</td>
                                        <td>111-111-1111</td>
                                        <td class="text-center"><span class="shadow-none badge badge-danger">Closed</span></td>
                                        <td class="text-center">
                                            <ul class="table-controls">
                                                <li><a href="javascript:void(0);" class="bs-tooltip" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit" data-original-title="Edit"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit-2 p-1 br-8 mb-1"><path d="M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z"></path></svg></a></li>
                                                <li><a href="javascript:void(0);" class="bs-tooltip" data-bs-toggle="tooltip" data-bs-placement="top" title="Delete" data-original-title="Delete"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash p-1 br-8 mb-1"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path></svg></a></li>
                                            </ul>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="checkbox-column text-center"> 7 </td>
                                        <td class="text-center">
                                            <span><img src="https://designreset.com/cork/laravel/build/assets/profile-24.62ecb02b.jpeg" class="profile-img" alt="avatar"></span>
                                        </td>
                                        <td>Nia</td>
                                        <td>Hillyer</td>
                                        <td>niaHill@yahoo.com</td>
                                        <td>111-666-1111</td>
                                        <td class="text-center"><span class="shadow-none badge badge-primary">Approved</span></td>
                                        <td class="text-center">
                                            <ul class="table-controls">
                                                <li><a href="javascript:void(0);" class="bs-tooltip" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit" data-original-title="Edit"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit-2 p-1 br-8 mb-1"><path d="M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z"></path></svg></a></li>
                                                <li><a href="javascript:void(0);" class="bs-tooltip" data-bs-toggle="tooltip" data-bs-placement="top" title="Delete" data-original-title="Delete"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash p-1 br-8 mb-1"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path></svg></a></li>
                                            </ul>
                                        </td>
                                    </tr>
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
