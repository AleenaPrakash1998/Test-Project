@extends('layouts.master')
@section('content')
    <div class="col-12 mb-4">
        <div class="card py-4 px-2">
            <div class="card-body">
                <div class="d-flex gap-4">
                    <div class="col-md-6 col-12">
                        <h5 class="pt-3 pb-3">Urls</h5>
                        <div class="mb-4">
                            <label for="authentication-url" class="form-label">Authentication URL</label>
                            <input type="text" id="authentication-url" class="form-control">
                        </div>
                        <div class="mb-4">
                            <label for="server-url" class="form-label">Server URL</label>
                            <input type="text" id="server-url" class="form-control">
                        </div>
                    </div>
                    <div class="col-md-6 col-12">
                        <h5 class="pt-3 pb-3">Payment Urls</h5>
                        <div class="mb-4">
                            <label for="payment-base-url" class="form-label">Payment base URL</label>
                            <input type="text" id="payment-base-url" class="form-control">
                        </div>
                        <div class="mb-4">
                            <label for="api-key" class="form-label">API Key</label>
                            <input type="text" id="api-key" class="form-control">
                        </div>
                        <div class="mb-4">
                            <label for="reference-key" class="form-label">Reference Key</label>
                            <input type="text" id="reference-key" class="form-control">
                        </div>
                        <div class="d-flex justify-content-end gap-1">
                            <button type="submit" class="btn btn-primary">Save Changes</button>
                            <button type="button" class="btn btn-outline-secondary">Cancel</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
