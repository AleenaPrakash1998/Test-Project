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
                                       data-dt-target="#entities-table">
                                <span class="position-absolute" style="top: 10px;right: 8px"><i
                                        class='bx bx-search'></i></span>
                            </div>
                            <div class="col-6">
                                <button type="submit" class="btn btn-primary w-100"><span
                                        class="d-flex justify-content-center align-items-center">
                                        <i class='bx bx-refresh'></i>&nbsp;&nbsp;Sync
                                    </span>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                {{ $dataTable->table() }}
            </div>
        </div>

    </div>
    @include('pages.entities.modal.edit')
@endsection
@push('custom-scripts')
    {{ $dataTable->scripts() }}
    <script>
        let $table = $('#entities-table');

        $table.on('click', '.edit-modal', function (e) {
            e.preventDefault();
            let id = $(this).data("id");
            let url = "{{ route('entities.show', ['entity' => ':id']) }}".replace(':id', id);
            $.ajax({
                url: url,
                type: 'GET',
                dataType: 'json',
            }).done(function (data, textStatus, jqXHR) {
                $('#successModal').modal('editModal')
                $('#name').val(data?.name)
                $('#reference-key').val(data?.reference_key)
                $('#exampleFormControlSelect1').val(data?.theme_id)
                $('#api-key').val(data?.api_key)
            }).fail(function (jqXHR, textStatus, errorThrown) {
                console.log(jqXHR)
            });
        });
    </script>
@endpush

