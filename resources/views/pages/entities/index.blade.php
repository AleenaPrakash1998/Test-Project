@extends('layouts.master')
@section('content')
        <div class="card">
            <div id="DataTables_Table_0_wrapper" class="dataTables_wrapper dt-bootstrap5 no-footer">
                <div class="mb-2 px-2">
                    <h4 class="card-header">Table Basic</h4>
                    <div class="d-flex justify-content-between">
                        <div class="px-4">
                            <p>Lorem ipsum dolor sit amet consectetur. Tristique pretium pulvinar diam enim.</p>
                        </div>
                        <div class="d-flex gap-2">
                            <div><input type="search" id="form1" class="form-control"></div>
                            <div><button type="submit" class="btn btn-primary">Create new theme</button></div>
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
                            style="width: 305px;" aria-label="Email: activate to sort column ascending">Email
                        </th>
                        <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1"
                            style="width: 108px;" aria-label="Date: activate to sort column ascending">Date
                        </th>
                        <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1"
                            style="width: 106px;" aria-label="Salary: activate to sort column ascending">Salary
                        </th>
                        <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1"
                            style="width: 144px;" aria-label="Status: activate to sort column ascending">Status
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
                            <div class="d-flex justify-content-start align-items-center user-name">
                                <div class="avatar-wrapper">
                                    <div class="avatar me-2"><span class="avatar-initial rounded-circle bg-label-info">GG</span>
                                    </div>
                                </div>
                                <div class="d-flex flex-column"><span
                                        class="emp_name text-truncate">Glyn Giacoppo</span><small
                                        class="emp_post text-truncate text-muted">Software Test Engineer</small></div>
                            </div>
                        </td>
                        <td>ggiacoppo2r@apache.org</td>
                        <td>04/15/2021</td>
                        <td>$24973.48</td>
                        <td><span class="badge  bg-label-success">Professional</span></td>
                        <td>
                            <div class="d-inline-block"><a href="javascript:;"
                                                           class="btn btn-sm btn-icon dropdown-toggle hide-arrow"
                                                           data-bs-toggle="dropdown"><i
                                        class="bx bx-dots-vertical-rounded"></i></a>
                                <ul class="dropdown-menu dropdown-menu-end m-0">
                                    <li><a href="javascript:;" class="dropdown-item">Details</a></li>
                                    <li><a href="javascript:;" class="dropdown-item">Archive</a></li>
                                    <div class="dropdown-divider"></div>
                                    <li><a href="javascript:;"
                                           class="dropdown-item text-danger delete-record">Delete</a></li>
                                </ul>
                            </div>
                            <a href="javascript:;" class="btn btn-sm btn-icon item-edit"><i class="bx bxs-edit"></i></a>
                        </td>
                    </tr>
                    <tr class="even">
                        <td class="  control" tabindex="0" style="display: none;"></td>
                        <td>
                            <div class="d-flex justify-content-start align-items-center user-name">
                                <div class="avatar-wrapper">
                                    <div class="avatar me-2"><img src="../../assets/img/avatars/10.png" alt="Avatar"
                                                                  class="rounded-circle"></div>
                                </div>
                                <div class="d-flex flex-column"><span
                                        class="emp_name text-truncate">Evangelina Carnock</span><small
                                        class="emp_post text-truncate text-muted">Cost Accountant</small></div>
                            </div>
                        </td>
                        <td>ecarnock2q@washington.edu</td>
                        <td>01/26/2021</td>
                        <td>$23704.82</td>
                        <td><span class="badge  bg-label-warning">Resigned</span></td>
                        <td>
                            <div class="d-inline-block"><a href="javascript:;"
                                                           class="btn btn-sm btn-icon dropdown-toggle hide-arrow"
                                                           data-bs-toggle="dropdown"><i
                                        class="bx bx-dots-vertical-rounded"></i></a>
                                <ul class="dropdown-menu dropdown-menu-end m-0">
                                    <li><a href="javascript:;" class="dropdown-item">Details</a></li>
                                    <li><a href="javascript:;" class="dropdown-item">Archive</a></li>
                                    <div class="dropdown-divider"></div>
                                    <li><a href="javascript:;"
                                           class="dropdown-item text-danger delete-record">Delete</a></li>
                                </ul>
                            </div>
                            <a href="javascript:;" class="btn btn-sm btn-icon item-edit"><i class="bx bxs-edit"></i></a>
                        </td>
                    </tr>
                    <tr class="odd">
                        <td class="  control" tabindex="0" style="display: none;"></td>
                        <td>
                            <div class="d-flex justify-content-start align-items-center user-name">
                                <div class="avatar-wrapper">
                                    <div class="avatar me-2"><img src="../../assets/img/avatars/7.png" alt="Avatar"
                                                                  class="rounded-circle"></div>
                                </div>
                                <div class="d-flex flex-column"><span
                                        class="emp_name text-truncate">Olivette Gudgin</span><small
                                        class="emp_post text-truncate text-muted">Paralegal</small></div>
                            </div>
                        </td>
                        <td>ogudgin2p@gizmodo.com</td>
                        <td>04/09/2021</td>
                        <td>$15211.60</td>
                        <td><span class="badge  bg-label-success">Professional</span></td>
                        <td>
                            <div class="d-inline-block"><a href="javascript:;"
                                                           class="btn btn-sm btn-icon dropdown-toggle hide-arrow"
                                                           data-bs-toggle="dropdown"><i
                                        class="bx bx-dots-vertical-rounded"></i></a>
                                <ul class="dropdown-menu dropdown-menu-end m-0">
                                    <li><a href="javascript:;" class="dropdown-item">Details</a></li>
                                    <li><a href="javascript:;" class="dropdown-item">Archive</a></li>
                                    <div class="dropdown-divider"></div>
                                    <li><a href="javascript:;"
                                           class="dropdown-item text-danger delete-record">Delete</a></li>
                                </ul>
                            </div>
                            <a href="javascript:;" class="btn btn-sm btn-icon item-edit"><i class="bx bxs-edit"></i></a>
                        </td>
                    </tr>
                    <tr class="even">
                        <td class="  control" tabindex="0" style="display: none;"></td>
                        <td>
                            <div class="d-flex justify-content-start align-items-center user-name">
                                <div class="avatar-wrapper">
                                    <div class="avatar me-2"><span class="avatar-initial rounded-circle bg-label-dark">RP</span>
                                    </div>
                                </div>
                                <div class="d-flex flex-column"><span
                                        class="emp_name text-truncate">Reina Peckett</span><small
                                        class="emp_post text-truncate text-muted">Quality Control Specialist</small>
                                </div>
                            </div>
                        </td>
                        <td>rpeckett2o@timesonline.co.uk</td>
                        <td>05/20/2021</td>
                        <td>$16619.40</td>
                        <td><span class="badge  bg-label-warning">Resigned</span></td>
                        <td>
                            <div class="d-inline-block"><a href="javascript:;"
                                                           class="btn btn-sm btn-icon dropdown-toggle hide-arrow"
                                                           data-bs-toggle="dropdown"><i
                                        class="bx bx-dots-vertical-rounded"></i></a>
                                <ul class="dropdown-menu dropdown-menu-end m-0">
                                    <li><a href="javascript:;" class="dropdown-item">Details</a></li>
                                    <li><a href="javascript:;" class="dropdown-item">Archive</a></li>
                                    <div class="dropdown-divider"></div>
                                    <li><a href="javascript:;"
                                           class="dropdown-item text-danger delete-record">Delete</a></li>
                                </ul>
                            </div>
                            <a href="javascript:;" class="btn btn-sm btn-icon item-edit"><i class="bx bxs-edit"></i></a>
                        </td>
                    </tr>
                    <tr class="odd">
                        <td class="  control" tabindex="0" style="display: none;"></td>
                        <td>
                            <div class="d-flex justify-content-start align-items-center user-name">
                                <div class="avatar-wrapper">
                                    <div class="avatar me-2"><span class="avatar-initial rounded-circle bg-label-info">AB</span>
                                    </div>
                                </div>
                                <div class="d-flex flex-column"><span
                                        class="emp_name text-truncate">Alaric Beslier</span><small
                                        class="emp_post text-truncate text-muted">Tax Accountant</small></div>
                            </div>
                        </td>
                        <td>abeslier2n@zimbio.com</td>
                        <td>04/16/2021</td>
                        <td>$19366.53</td>
                        <td><span class="badge  bg-label-warning">Resigned</span></td>
                        <td>
                            <div class="d-inline-block"><a href="javascript:;"
                                                           class="btn btn-sm btn-icon dropdown-toggle hide-arrow"
                                                           data-bs-toggle="dropdown"><i
                                        class="bx bx-dots-vertical-rounded"></i></a>
                                <ul class="dropdown-menu dropdown-menu-end m-0">
                                    <li><a href="javascript:;" class="dropdown-item">Details</a></li>
                                    <li><a href="javascript:;" class="dropdown-item">Archive</a></li>
                                    <div class="dropdown-divider"></div>
                                    <li><a href="javascript:;"
                                           class="dropdown-item text-danger delete-record">Delete</a></li>
                                </ul>
                            </div>
                            <a href="javascript:;" class="btn btn-sm btn-icon item-edit"><i class="bx bxs-edit"></i></a>
                        </td>
                    </tr>
                    <tr class="even">
                        <td class="  control" tabindex="0" style="display: none;"></td>
                        <td>
                            <div class="d-flex justify-content-start align-items-center user-name">
                                <div class="avatar-wrapper">
                                    <div class="avatar me-2"><img src="../../assets/img/avatars/2.png" alt="Avatar"
                                                                  class="rounded-circle"></div>
                                </div>
                                <div class="d-flex flex-column"><span
                                        class="emp_name text-truncate">Edwina Ebsworth</span><small
                                        class="emp_post text-truncate text-muted">Human Resources Assistant</small>
                                </div>
                            </div>
                        </td>
                        <td>eebsworth2m@sbwire.com</td>
                        <td>09/27/2021</td>
                        <td>$19586.23</td>
                        <td><span class="badge bg-label-primary">Current</span></td>
                        <td>
                            <div class="d-inline-block"><a href="javascript:;"
                                                           class="btn btn-sm btn-icon dropdown-toggle hide-arrow"
                                                           data-bs-toggle="dropdown"><i
                                        class="bx bx-dots-vertical-rounded"></i></a>
                                <ul class="dropdown-menu dropdown-menu-end m-0">
                                    <li><a href="javascript:;" class="dropdown-item">Details</a></li>
                                    <li><a href="javascript:;" class="dropdown-item">Archive</a></li>
                                    <div class="dropdown-divider"></div>
                                    <li><a href="javascript:;"
                                           class="dropdown-item text-danger delete-record">Delete</a></li>
                                </ul>
                            </div>
                            <a href="javascript:;" class="btn btn-sm btn-icon item-edit"><i class="bx bxs-edit"></i></a>
                        </td>
                    </tr>
                    <tr class="odd">
                        <td class="  control" tabindex="0" style="display: none;"></td>
                        <td>
                            <div class="d-flex justify-content-start align-items-center user-name">
                                <div class="avatar-wrapper">
                                    <div class="avatar me-2"><span class="avatar-initial rounded-circle bg-label-info">RH</span>
                                    </div>
                                </div>
                                <div class="d-flex flex-column"><span
                                        class="emp_name text-truncate">Ronica Hasted</span><small
                                        class="emp_post text-truncate text-muted">Software Consultant</small></div>
                            </div>
                        </td>
                        <td>rhasted2l@hexun.com</td>
                        <td>07/04/2021</td>
                        <td>$24866.66</td>
                        <td><span class="badge  bg-label-warning">Resigned</span></td>
                        <td>
                            <div class="d-inline-block"><a href="javascript:;"
                                                           class="btn btn-sm btn-icon dropdown-toggle hide-arrow"
                                                           data-bs-toggle="dropdown"><i
                                        class="bx bx-dots-vertical-rounded"></i></a>
                                <ul class="dropdown-menu dropdown-menu-end m-0">
                                    <li><a href="javascript:;" class="dropdown-item">Details</a></li>
                                    <li><a href="javascript:;" class="dropdown-item">Archive</a></li>
                                    <div class="dropdown-divider"></div>
                                    <li><a href="javascript:;"
                                           class="dropdown-item text-danger delete-record">Delete</a></li>
                                </ul>
                            </div>
                            <a href="javascript:;" class="btn btn-sm btn-icon item-edit"><i class="bx bxs-edit"></i></a>
                        </td>
                    </tr>
                    </tbody>
                </table>
                <div class="row">
                    <div class="col-sm-12 col-md-6">
                        <div class="dataTables_info" id="DataTables_Table_0_info" role="status" aria-live="polite">
                            Showing 1 to 7 of 100 entries
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-6">
                        <div class="dataTables_paginate paging_simple_numbers" id="DataTables_Table_0_paginate">
                            <ul class="pagination">
                                <li class="paginate_button page-item previous disabled"
                                    id="DataTables_Table_0_previous"><a aria-controls="DataTables_Table_0"
                                                                        aria-disabled="true" role="link"
                                                                        data-dt-idx="previous" tabindex="-1"
                                                                        class="page-link">Previous</a></li>
                                <li class="paginate_button page-item active"><a href="#"
                                                                                aria-controls="DataTables_Table_0"
                                                                                role="link" aria-current="page"
                                                                                data-dt-idx="0" tabindex="0"
                                                                                class="page-link">1</a></li>
                                <li class="paginate_button page-item "><a href="#" aria-controls="DataTables_Table_0"
                                                                          role="link" data-dt-idx="1" tabindex="0"
                                                                          class="page-link">2</a></li>
                                <li class="paginate_button page-item "><a href="#" aria-controls="DataTables_Table_0"
                                                                          role="link" data-dt-idx="2" tabindex="0"
                                                                          class="page-link">3</a></li>
                                <li class="paginate_button page-item "><a href="#" aria-controls="DataTables_Table_0"
                                                                          role="link" data-dt-idx="3" tabindex="0"
                                                                          class="page-link">4</a></li>
                                <li class="paginate_button page-item "><a href="#" aria-controls="DataTables_Table_0"
                                                                          role="link" data-dt-idx="4" tabindex="0"
                                                                          class="page-link">5</a></li>
                                <li class="paginate_button page-item disabled" id="DataTables_Table_0_ellipsis"><a
                                        aria-controls="DataTables_Table_0" aria-disabled="true" role="link"
                                        data-dt-idx="ellipsis" tabindex="-1" class="page-link">…</a></li>
                                <li class="paginate_button page-item "><a href="#" aria-controls="DataTables_Table_0"
                                                                          role="link" data-dt-idx="14" tabindex="0"
                                                                          class="page-link">15</a></li>
                                <li class="paginate_button page-item next" id="DataTables_Table_0_next"><a href="#"
                                                                                                           aria-controls="DataTables_Table_0"
                                                                                                           role="link"
                                                                                                           data-dt-idx="next"
                                                                                                           tabindex="0"
                                                                                                           class="page-link">Next</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div style="width: 1%;"></div>
            </div>
        </div>
@endsection
