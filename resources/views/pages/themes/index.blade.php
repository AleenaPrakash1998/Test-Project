@extends('layouts.master')
@section('content')
    <div>
        <div class="card">
            <div id="DataTables_Table_0_wrapper" class="dataTables_wrapper dt-bootstrap5 no-footer">
                <div class="mb-2 px-2">
                    <h3 class="card-header">Themes</h3>
                    <div class="d-flex justify-content-between">
                        <div class="px-4">
                            <p>Lorem ipsum dolor sit amet consectetur. Tristique pretium pulvinar diam enim.</p>
                        </div>
                        <div class="d-flex gap-2">
                            <div><input type="text" class="form-control" id="filter-user-search" autocomplete="off"
                                        placeholder="Search.." data-dt-toggle="search"
                                        data-dt-target="#attributes-table">
                            </div>
                            <div>
                                <button type="submit" class="btn btn-primary"
                                        onclick="window.location.href='{{ route('themes.create') }}'">Create new theme
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                <table class="datatables-basic table border-top dataTable no-footer dtr-column" id="DataTables_Table_0"
                       aria-describedby="DataTables_Table_0_info" style="width: 1390px;">
                    <thead>
                    <tr>
                        <th class="control sorting_disabled dtr-hidden" rowspan="1" colspan="1"
                            style="width: 0px; display: none;" aria-label=""></th>
                        <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1"
                            style="width: 316px;" aria-label="Name: activate to sort column ascending">Name
                        </th>
                        <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1"
                            style="width: 144px;" aria-label="Status: activate to sort column ascending">Menu
                        </th>
                        <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1"
                            style="width: 108px;" aria-label="Date: activate to sort column ascending">Logo
                        </th>
                        <th class="sorting_disabled" rowspan="1" colspan="1" style="width: 87px;" aria-label="Actions">
                            Actions
                        </th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr class="odd">
                        <td class="  control" tabindex="0" style="display: none;"></td>
                        <td>
                            <div class="d-flex flex-column"><span class="emp_name text-truncate text-secondary">Glyn Giacoppo</span>
                            </div>
                        </td>
                        <td>
                            <span class="badge  bg-label-warning">Home</span>
                            <span class="badge  bg-label-warning">Services</span>
                            <span class="badge  bg-label-warning">Contracts</span>
                        </td>
                        <td>
                            <div class="d-flex justify-content-center align-items-center border px-3 py-2">
                                <img src="{{ asset('assets/img/logo/logo.png') }}" class="img-fluid"
                                     style="max-width: 72px; height: 20px;">
                            </div>
                        </td>
                        <td>
                            <div class="d-flex flex-column justify-content-center">
                                <span class="emp_name text-truncate text-secondary">
                                    <button type="button"
                                            class="btn btn-outline-secondary rounded-pill d-flex align-items-center"
                                            onclick="window.location.href='{{ route('themes.edit', 1) }}'">
                                        View&nbsp;
                                        <i class='bx bx-show-alt'></i>
                                    </button>
                                </span>
                            </div>
                        </td>
                    </tr>
                    <tr class="even">
                        <td class="  control" tabindex="0" style="display: none;"></td>
                        <td>
                            <div class="d-flex flex-column"><span class="emp_name text-truncate text-secondary">Glyn Giacoppo</span>
                            </div>
                        </td>
                        <td><span class="badge  bg-label-warning">Resigned</span></td>
                        <td>
                            <div class="d-flex justify-content-center align-items-center border px-3 py-2">
                                <img src="{{ asset('assets/img/logo/logo.png') }}" class="img-fluid"
                                     style="max-width: 72px; height: 20px;">
                            </div>
                        </td>
                        <td>
                            <div class="d-flex flex-column justify-content-center">
                                <span class="emp_name text-truncate text-secondary">
                                    <button type="button"
                                            class="btn btn-outline-secondary rounded-pill d-flex align-items-center"
                                            onclick="window.location.href='{{ route('themes.edit', 1) }}'">
                                        View&nbsp;
                                        <i class='bx bx-show-alt'></i>
                                    </button>
                                </span>
                            </div>
                        </td>
                    </tr>
                    <tr class="odd">
                        <td class="  control" tabindex="0" style="display: none;"></td>
                        <td>
                            <div class="d-flex flex-column"><span class="emp_name text-truncate text-secondary">Glyn Giacoppo</span>
                            </div>
                        </td>
                        <td><span class="badge  bg-label-warning">Resigned</span></td>
                        <td>
                            <div class="d-flex justify-content-center align-items-center border px-3 py-2">
                                <img src="{{ asset('assets/img/logo/logo.png') }}" class="img-fluid"
                                     style="max-width: 72px; height: 20px;">
                            </div>
                        </td>
                        <td>
                            <div class="d-flex flex-column justify-content-center">
                                <span class="emp_name text-truncate text-secondary">
                                    <button type="button"
                                            class="btn btn-outline-secondary rounded-pill d-flex align-items-center"
                                            onclick="window.location.href='{{ route('themes.edit', 1) }}'">
                                        View&nbsp;
                                        <i class='bx bx-show-alt'></i>
                                    </button>
                                </span>
                            </div>
                        </td>
                    </tr>
                    <tr class="even">
                        <td class="  control" tabindex="0" style="display: none;"></td>
                        <td>
                            <div class="d-flex flex-column"><span class="emp_name text-truncate text-secondary">Glyn Giacoppo</span>
                            </div>
                        </td>
                        <td><span class="badge  bg-label-warning">Resigned</span></td>
                        <td>
                            <div class="d-flex justify-content-center align-items-center border px-3 py-2">
                                <img src="{{ asset('assets/img/logo/logo.png') }}" class="img-fluid"
                                     style="max-width: 72px; height: 20px;">
                            </div>
                        </td>
                        <td>
                            <div class="d-flex flex-column justify-content-center">
                                <span class="emp_name text-truncate text-secondary">
                                    <button type="button"
                                            class="btn btn-outline-secondary rounded-pill d-flex align-items-center"
                                            onclick="window.location.href='{{ route('themes.edit', 1) }}'">
                                        View&nbsp;
                                        <i class='bx bx-show-alt'></i>
                                    </button>
                                </span>
                            </div>
                        </td>
                    </tr>
                    <tr class="odd">
                        <td class="  control" tabindex="0" style="display: none;"></td>
                        <td>
                            <div class="d-flex flex-column"><span class="emp_name text-truncate text-secondary">Glyn Giacoppo</span>
                            </div>
                        </td>
                        <td><span class="badge  bg-label-warning">Resigned</span></td>
                        <td>
                            <div class="d-flex justify-content-center align-items-center border px-3 py-2">
                                <img src="{{ asset('assets/img/logo/logo.png') }}" class="img-fluid"
                                     style="max-width: 72px; height: 20px;">
                            </div>
                        </td>
                        <td>
                            <div class="d-flex flex-column justify-content-center">
                                <span class="emp_name text-truncate text-secondary">
                                   <button type="button"
                                           class="btn btn-outline-secondary rounded-pill d-flex align-items-center"
                                           onclick="window.location.href='{{ route('themes.edit', 1) }}'">
                                        View&nbsp;
                                        <i class='bx bx-show-alt'></i>
                                    </button>
                                </span>
                            </div>
                        </td>
                    </tr>
                    <tr class="odd">
                        <td class="  control" tabindex="0" style="display: none;"></td>
                        <td>
                            <div class="d-flex flex-column"><span class="emp_name text-truncate text-secondary">Glyn Giacoppo</span>
                            </div>
                        </td>
                        <td><span class="badge  bg-label-warning">Resigned</span></td>
                        <td>
                            <div class="d-flex justify-content-center align-items-center border px-3 py-2">
                                <img src="{{ asset('assets/img/logo/logo.png') }}" class="img-fluid"
                                     style="max-width: 72px; height: 20px;">
                            </div>
                        </td>
                        <td>
                            <div class="d-flex flex-column justify-content-center">
                                <span class="emp_name text-truncate text-secondary">
                                    <button type="button"
                                            class="btn btn-outline-secondary rounded-pill d-flex align-items-center"
                                            onclick="window.location.href='{{ route('themes.edit', 1) }}'">
                                        View&nbsp;
                                        <i class='bx bx-show-alt'></i>
                                    </button>
                                </span>
                            </div>
                        </td>
                    </tr>
                    <tr class="odd">
                        <td class="  control" tabindex="0" style="display: none;"></td>
                        <td>
                            <div class="d-flex flex-column"><span class="emp_name text-truncate text-secondary">Glyn Giacoppo</span>
                            </div>
                        </td>
                        <td><span class="badge  bg-label-warning">Resigned</span></td>
                        <td>
                            <div class="d-flex justify-content-center align-items-center border px-3 py-2">
                                <img src="{{ asset('assets/img/logo/logo.png') }}" class="img-fluid"
                                     style="max-width: 72px; height: 20px;">
                            </div>
                        </td>
                        <td>
                            <div class="d-flex flex-column justify-content-center">
                                <span class="emp_name text-truncate text-secondary">
                                    <button type="button"
                                            class="btn btn-outline-secondary rounded-pill d-flex align-items-center"
                                            onclick="window.location.href='{{ route('themes.edit', 1) }}'">
                                        View&nbsp;
                                        <i class='bx bx-show-alt'></i>
                                    </button>
                                </span>
                            </div>
                        </td>
                    </tr>
                    <tr class="even">
                        <td class="  control" tabindex="0" style="display: none;"></td>
                        <td>
                            <div class="d-flex flex-column"><span class="emp_name text-truncate text-secondary">Glyn Giacoppo</span>
                            </div>
                        </td>
                        <td><span class="badge  bg-label-warning">Resigned</span></td>
                        <td>
                            <div class="d-flex justify-content-center align-items-center border px-3 py-2">
                                <img src="{{ asset('assets/img/logo/logo.png') }}" class="img-fluid"
                                     style="max-width: 72px; height: 20px;">
                            </div>
                        </td>
                        <td>
                            <div class="d-flex flex-column justify-content-center">
                                <span class="emp_name text-truncate text-secondary">
                                    <button type="button"
                                            class="btn btn-outline-secondary rounded-pill d-flex align-items-center"
                                            onclick="window.location.href='{{ route('themes.edit', 1) }}'">
                                        View&nbsp;
                                        <i class='bx bx-show-alt'></i>
                                    </button>
                                </span>
                            </div>
                        </td>
                    </tr>
                    <tr class="odd">
                        <td class="  control" tabindex="0" style="display: none;"></td>
                        <td>
                            <div class="d-flex flex-column"><span class="emp_name text-truncate text-secondary">Glyn Giacoppo</span>
                            </div>
                        </td>
                        <td><span class="badge  bg-label-warning">Resigned</span></td>
                        <td>
                            <div class="d-flex justify-content-center align-items-center border px-3 py-2">
                                <img src="{{ asset('assets/img/logo/logo.png') }}" class="img-fluid"
                                     style="max-width: 72px; height: 20px;">
                            </div>
                        </td>
                        <td>
                            <div class="d-flex flex-column justify-content-center">
                                <span class="emp_name text-truncate text-secondary">
                                   <button type="button"
                                           class="btn btn-outline-secondary rounded-pill d-flex align-items-center"
                                           onclick="window.location.href='{{ route('themes.edit', 1) }}'">
                                        View&nbsp;
                                        <i class='bx bx-show-alt'></i>
                                    </button>
                                </span>
                            </div>
                        </td>

                    </tr>
                    <tr class="odd">
                        <td class="  control" tabindex="0" style="display: none;"></td>
                        <td>
                            <div class="d-flex flex-column"><span class="emp_name text-truncate text-secondary">Glyn Giacoppo</span>
                            </div>
                        </td>
                        <td><span class="badge  bg-label-warning">Resigned</span></td>
                        <td>
                            <div class="d-flex justify-content-center align-items-center border px-3 py-2">
                                <img src="{{ asset('assets/img/logo/logo.png') }}" class="img-fluid"
                                     style="max-width: 72px; height: 20px;">
                            </div>
                        </td>
                        <td>
                            <div class="d-flex flex-column justify-content-center">
                                <span class="emp_name text-truncate text-secondary">
                                   <button type="button"
                                           class="btn btn-outline-secondary rounded-pill d-flex align-items-center"
                                           onclick="window.location.href='{{ route('themes.edit', 1) }}'">
                                        View&nbsp;
                                        <i class='bx bx-show-alt'></i>
                                    </button>
                                </span>
                            </div>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="dataTables_paginate paging_simple_numbers mt-3" id="DataTables_Table_2_paginate">
            <ul class="pagination justify-content-center">
                <li class="paginate_button page-item previous disabled" id="DataTables_Table_2_previous"><a
                        aria-controls="DataTables_Table_2" aria-disabled="true" role="link" data-dt-idx="previous"
                        tabindex="-1" class="page-link">&lt</a></li>
                <li class="paginate_button page-item active"><a href="#" aria-controls="DataTables_Table_2" role="link"
                                                                aria-current="page" data-dt-idx="0" tabindex="0"
                                                                class="page-link">1</a></li>
                <li class="paginate_button page-item "><a href="#" aria-controls="DataTables_Table_2" role="link"
                                                          data-dt-idx="1" tabindex="0" class="page-link">2</a></li>
                <li class="paginate_button page-item "><a href="#" aria-controls="DataTables_Table_2" role="link"
                                                          data-dt-idx="2" tabindex="0" class="page-link">3</a></li>
                <li class="paginate_button page-item "><a href="#" aria-controls="DataTables_Table_2" role="link"
                                                          data-dt-idx="3" tabindex="0" class="page-link">4</a></li>
                <li class="paginate_button page-item "><a href="#" aria-controls="DataTables_Table_2" role="link"
                                                          data-dt-idx="4" tabindex="0" class="page-link">5</a></li>
                <li class="paginate_button page-item disabled" id="DataTables_Table_2_ellipsis"><a
                        aria-controls="DataTables_Table_2" aria-disabled="true" role="link" data-dt-idx="ellipsis"
                        tabindex="-1" class="page-link">…</a></li>
                <li class="paginate_button page-item "><a href="#" aria-controls="DataTables_Table_2" role="link"
                                                          data-dt-idx="14" tabindex="0" class="page-link">15</a></li>
                <li class="paginate_button page-item next" id="DataTables_Table_2_next"><a href="#"
                                                                                           aria-controls="DataTables_Table_2"
                                                                                           role="link"
                                                                                           data-dt-idx="next"
                                                                                           tabindex="0"
                                                                                           class="page-link">&gt</a>
                </li>
            </ul>
        </div>
    </div>
@endsection
