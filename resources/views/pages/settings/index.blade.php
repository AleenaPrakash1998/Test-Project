@extends('layouts.master')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <h5 class="pt-3 pb-3">Urls</h5>
                <div class="mb-4">
                    <label for="authentication-url" class="form-label">Authentication URL</label>
                    <input type="text" id="authentication-url" class="form-control"
                           value="{{ $url->authentication_url }}">
                </div>
                <div class="mb-4">
                    <label for="server-url" class="form-label">Server URL</label>
                    <input type="text" id="server-url" class="form-control" value="{{ $url->server_url }}">
                </div>
            </div>
            <div class="col-lg-6">
                <h5 class="pt-3 pb-3">Payment Urls</h5>
                <div class="mb-4">
                    <label for="payment-base-url" class="form-label">Payment base URL</label>
                    <input type="text" id="payment-base-url" class="form-control" value="{{ $url->payment_base_url }}">
                </div>
                <div class="mb-4">
                    <label for="api-key" class="form-label">API Key</label>
                    <input type="text" id="api-key" class="form-control" value="{{ $url->api_key }}">
                </div>
                <div class="mb-4">
                    <label for="reference-key" class="form-label">Reference Key</label>
                    <input type="text" id="reference-key" class="form-control" value="{{ $url->reference_key }}">
                </div>
                <div class="d-flex justify-content-end gap-1 pb-5">
                    <button type="submit" class="btn btn-primary">Save Changes</button>
                    <button type="button" class="btn btn-outline-secondary">Cancel</button>
                </div>
            </div>
        </div>
    </div>
@endsection
