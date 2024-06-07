@extends('layouts.master')
@section('content')
    <div>
        <div class="card">
            <div id="DataTables_Table_0_wrapper" class="dataTables_wrapper dt-bootstrap5 no-footer">
                <div class="mb-2 px-2">
                    <h3 class="card-header">Entities</h3>
                    <div class="d-flex justify-content-between">
                        <div class="px-4">
                            <p>Lorem ipsum dolor sit amet consectetur. Tristique pretium pulvinar diam enim.</p>
                        </div>
                        <div class="d-flex gap-2">
                            <div class="position-relative">
                                <input type="text" class="form-control" id="filter-user-search" autocomplete="off"
                                       placeholder="Search.." data-dt-toggle="search"
                                       data-dt-target="#attributes-table">
                                <span class="position-absolute" style="top: 10px;right: 8px"><i
                                        class='bx bx-search'></i></span>
                            </div>
                            <div class="col-6">
                                <button type="submit" class="btn btn-primary w-100"><span
                                        class="d-flex justify-content-center align-items-center">
                                        <i class='bx bx-refresh'></i> Sync
                                    </span>
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
                            style="width: 316px;" aria-label="Name: activate to sort column ascending">Entity
                        </th>
                        <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1"
                            style="width: 144px;" aria-label="Status: activate to sort column ascending">Theme
                        </th>
                        <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1"
                            style="width: 108px;" aria-label="Date: activate to sort column ascending">Menu
                        </th>
                        <th class="sorting_disabled" rowspan="1" colspan="1" style="width: 87px;" aria-label="Actions">
                            API Key
                        </th>
                        <th class="sorting_disabled" rowspan="1" colspan="1" style="width: 87px;" aria-label="Actions">
                            Reference Key
                        </th>
                        <th class="sorting_disabled" rowspan="1" colspan="1" style="width: 87px;" aria-label="Actions">
                            Action
                        </th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr class="odd">
                        <td class="  control" tabindex="0" style="display: none;"></td>
                        <td>
                            <div class="d-flex flex-column"><span
                                    class="emp_name text-truncate text-secondary">Entity 1</span>
                            </div>
                        </td>
                        <td>
                            <div class="d-flex flex-column"><span
                                    class="emp_name text-truncate text-secondary">Theme 2</span>
                            </div>
                        </td>
                        <td class="text-nowrap">
                            <span class="badge  bg-label-warning">Home</span>
                            <span class="badge  bg-label-warning">Services</span>
                            <span class="badge  bg-label-warning">Contracts</span>
                        </td>
                        <td>
                            <div class="d-flex flex-column"><span class="emp_name text-truncate text-secondary">asdfghnytr1234567</span>
                            </div>
                        </td>
                        <td>
                            <div class="d-flex flex-column"><span class="emp_name text-truncate text-secondary">asdfghnytr1234567</span>
                            </div>
                        </td>
                        <td>
                            <div class="d-flex flex-column justify-content-center">
                                <span class="emp_name text-truncate text-secondary">
                                     <button type="button"
                                             class="btn btn-outline-secondary rounded-pill d-flex align-items-center"
                                             onclick="openModal()">
                                        Edit&nbsp;
                                        <i class='bx bx-edit-alt'></i>
                                    </button>
                                </span>
                            </div>
                        </td>
                    </tr>
                    <tr class="even">
                        <td class="  control" tabindex="0" style="display: none;"></td>
                        <td>
                            <div class="d-flex flex-column"><span
                                    class="emp_name text-truncate text-secondary">Entity 1</span>
                            </div>
                        </td>
                        <td>
                            <div class="d-flex flex-column"><span
                                    class="emp_name text-truncate text-secondary">Theme 2</span>
                            </div>
                        </td>
                        <td>
                            <span class="badge  bg-label-warning">Home</span>
                            <span class="badge  bg-label-warning">Services</span>
                            <span class="badge  bg-label-warning">Contracts</span>
                        </td>
                        <td>
                            <div class="d-flex flex-column"><span class="emp_name text-truncate text-secondary">asdfghnytr1234567</span>
                            </div>
                        </td>
                        <td>
                            <div class="d-flex flex-column"><span class="emp_name text-truncate text-secondary">asdfghnytr1234567</span>
                            </div>
                        </td>
                        <td>
                            <div class="d-flex flex-column justify-content-center">
                                <span class="emp_name text-truncate text-secondary">
                                    <button type="button"
                                            class="btn btn-outline-secondary rounded-pill d-flex align-items-center"
                                            onclick="openModal()">
                                        Edit&nbsp;
                                        <i class='bx bx-edit-alt'></i>
                                    </button>
                                </span>
                            </div>
                        </td>
                    </tr>
                    <tr class="odd">
                        <td class="  control" tabindex="0" style="display: none;"></td>
                        <td>
                            <div class="d-flex flex-column"><span
                                    class="emp_name text-truncate text-secondary">Entity 1</span>
                            </div>
                        </td>
                        <td>
                            <div class="d-flex flex-column"><span
                                    class="emp_name text-truncate text-secondary">Theme 2</span>
                            </div>
                        </td>
                        <td>
                            <span class="badge  bg-label-warning">Home</span>
                            <span class="badge  bg-label-warning">Services</span>
                            <span class="badge  bg-label-warning">Contracts</span>
                        </td>
                        <td>
                            <div class="d-flex flex-column"><span class="emp_name text-truncate text-secondary">asdfghnytr1234567</span>
                            </div>
                        </td>
                        <td>
                            <div class="d-flex flex-column"><span class="emp_name text-truncate text-secondary">asdfghnytr1234567</span>
                            </div>
                        </td>
                        <td>
                            <div class="d-flex flex-column justify-content-center">
                                <span class="emp_name text-truncate text-secondary">
                                     <button type="button"
                                             class="btn btn-outline-secondary rounded-pill d-flex align-items-center"
                                             onclick="openModal()">
                                        Edit&nbsp;
                                        <i class='bx bx-edit-alt'></i>
                                    </button>
                                </span>
                            </div>
                        </td>
                    </tr>
                    <tr class="even">
                        <td class="  control" tabindex="0" style="display: none;"></td>
                        <td>
                            <div class="d-flex flex-column"><span
                                    class="emp_name text-truncate text-secondary">Entity 1</span>
                            </div>
                        </td>
                        <td>
                            <div class="d-flex flex-column"><span
                                    class="emp_name text-truncate text-secondary">Theme 2</span>
                            </div>
                        </td>
                        <td>
                            <span class="badge  bg-label-warning">Home</span>
                            <span class="badge  bg-label-warning">Services</span>
                            <span class="badge  bg-label-warning">Contracts</span>
                        </td>
                        <td>
                            <div class="d-flex flex-column"><span class="emp_name text-truncate text-secondary">asdfghnytr1234567</span>
                            </div>
                        </td>
                        <td>
                            <div class="d-flex flex-column"><span class="emp_name text-truncate text-secondary">asdfghnytr1234567</span>
                            </div>
                        </td>
                        <td>
                            <div class="d-flex flex-column justify-content-center">
                                <span class="emp_name text-truncate text-secondary">
                                     <button type="button"
                                             class="btn btn-outline-secondary rounded-pill d-flex align-items-center"
                                             onclick="openModal()">
                                        Edit&nbsp;
                                        <i class='bx bx-edit-alt'></i>
                                    </button>
                                </span>
                            </div>
                        </td>
                    </tr>
                    <tr class="odd">
                        <td class="  control" tabindex="0" style="display: none;"></td>
                        <td>
                            <div class="d-flex flex-column"><span
                                    class="emp_name text-truncate text-secondary">Entity 1</span>
                            </div>
                        </td>
                        <td>
                            <div class="d-flex flex-column"><span
                                    class="emp_name text-truncate text-secondary">Theme 2</span>
                            </div>
                        </td>
                        <td>
                            <span class="badge  bg-label-warning">Home</span>
                            <span class="badge  bg-label-warning">Services</span>
                            <span class="badge  bg-label-warning">Contracts</span>
                        </td>
                        <td>
                            <div class="d-flex flex-column"><span class="emp_name text-truncate text-secondary">asdfghnytr1234567</span>
                            </div>
                        </td>
                        <td>
                            <div class="d-flex flex-column"><span class="emp_name text-truncate text-secondary">asdfghnytr1234567</span>
                            </div>
                        </td>
                        <td>
                            <div class="d-flex flex-column justify-content-center">
                                <span class="emp_name text-truncate text-secondary">
                                    <button type="button"
                                            class="btn btn-outline-secondary rounded-pill d-flex align-items-center"
                                            onclick="openModal()">
                                        Edit&nbsp;
                                        <i class='bx bx-edit-alt'></i>
                                    </button>
                                </span>
                            </div>
                        </td>
                    </tr>
                    <tr class="even">
                        <td class="  control" tabindex="0" style="display: none;"></td>
                        <td>
                            <div class="d-flex flex-column"><span
                                    class="emp_name text-truncate text-secondary">Entity 1</span>
                            </div>
                        </td>
                        <td>
                            <div class="d-flex flex-column"><span
                                    class="emp_name text-truncate text-secondary">Theme 2</span>
                            </div>
                        </td>
                        <td>
                            <span class="badge  bg-label-warning">Home</span>
                            <span class="badge  bg-label-warning">Services</span>
                            <span class="badge  bg-label-warning">Contracts</span>
                        </td>
                        <td>
                            <div class="d-flex flex-column"><span class="emp_name text-truncate text-secondary">asdfghnytr1234567</span>
                            </div>
                        </td>
                        <td>
                            <div class="d-flex flex-column"><span class="emp_name text-truncate text-secondary">asdfghnytr1234567</span>
                            </div>
                        </td>
                        <td>
                            <div class="d-flex flex-column justify-content-center">
                                <span class="emp_name text-truncate text-secondary">
                                    <button type="button"
                                            class="btn btn-outline-secondary rounded-pill d-flex align-items-center"
                                            onclick="openModal()">
                                        Edit&nbsp;
                                        <i class='bx bx-edit-alt'></i>
                                    </button>
                                </span>
                            </div>
                        </td>
                    </tr>
                    <tr class="odd">
                        <td class="  control" tabindex="0" style="display: none;"></td>
                        <td>
                            <div class="d-flex flex-column"><span
                                    class="emp_name text-truncate text-secondary">Entity 1</span>
                            </div>
                        </td>
                        <td>
                            <div class="d-flex flex-column"><span
                                    class="emp_name text-truncate text-secondary">Theme 2</span>
                            </div>
                        </td>
                        <td>
                            <span class="badge  bg-label-warning">Home</span>
                            <span class="badge  bg-label-warning">Services</span>
                            <span class="badge  bg-label-warning">Contracts</span>
                        </td>
                        <td>
                            <div class="d-flex flex-column"><span class="emp_name text-truncate text-secondary">asdfghnytr1234567</span>
                            </div>
                        </td>
                        <td>
                            <div class="d-flex flex-column"><span class="emp_name text-truncate text-secondary">asdfghnytr1234567</span>
                            </div>
                        </td>
                        <td>
                            <div class="d-flex flex-column justify-content-center">
                                <span class="emp_name text-truncate text-secondary">
                                     <button type="button"
                                             class="btn btn-outline-secondary rounded-pill d-flex align-items-center"
                                             onclick="openModal()">
                                        Edit&nbsp;
                                        <i class='bx bx-edit-alt'></i>
                                    </button>
                                </span>
                            </div>
                        </td>
                    </tr>
                    <tr class="even">
                        <td class="  control" tabindex="0" style="display: none;"></td>
                        <td>
                            <div class="d-flex flex-column"><span
                                    class="emp_name text-truncate text-secondary">Entity 1</span>
                            </div>
                        </td>
                        <td>
                            <div class="d-flex flex-column"><span
                                    class="emp_name text-truncate text-secondary">Theme 2</span>
                            </div>
                        </td>
                        <td>
                            <span class="badge  bg-label-warning">Home</span>
                            <span class="badge  bg-label-warning">Services</span>
                            <span class="badge  bg-label-warning">Contracts</span>
                        </td>
                        <td>
                            <div class="d-flex flex-column"><span class="emp_name text-truncate text-secondary">asdfghnytr1234567</span>
                            </div>
                        </td>
                        <td>
                            <div class="d-flex flex-column"><span class="emp_name text-truncate text-secondary">asdfghnytr1234567</span>
                            </div>
                        </td>
                        <td>
                            <div class="d-flex flex-column justify-content-center">
                                <span class="emp_name text-truncate text-secondary">
                                    <button type="button"
                                            class="btn btn-outline-secondary rounded-pill d-flex align-items-center"
                                            onclick="openModal()">
                                        Edit&nbsp;
                                        <i class='bx bx-edit-alt'></i>
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

    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="text-center">
                        <img src="{{ asset('assets/img/icons/unicons/modal.png') }}" alt="Icon">
                        <h5 class="modal-title mt-4" id="exampleModalLabel">Edit Entity</h5>
                        <p>Lorem ipsum lorem ipsum</p>

                    </div>
                    <form>
                        <div class="mb-3">
                            <label for="recipient-name" class="col-form-label">Entity</label>
                            <input type="text" class="form-control" id="recipient-name">
                        </div>
                        <div class="mb-3">
                            <label for="message-text" class="col-form-label">Theme</label>
                            <select class="form-control select2" name="" id="theme">
                                <option>Choose</option>
                                <option value="dfd">fg</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="message-text" class="col-form-label">API key</label>
                            <input type="text" class="form-control" id="recipient-name">
                        </div>
                        <div class="mb-3">
                            <label for="message-text" class="col-form-label">Reference Key</label>
                            <input type="text" class="form-control" id="recipient-name">
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Save</button>
                    <button type="button" class="btn btn-outline-secondary">Cancel</button>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('custom-scripts')
    <script>
        function openModal() {
            var modal = new bootstrap.Modal(document.getElementById('exampleModal'));
            modal.show();
        }

        $('#theme').select2({
            width: '100%'
        })
    </script>
@endpush
