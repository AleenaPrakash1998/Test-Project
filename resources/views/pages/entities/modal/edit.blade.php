<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
{{--                        <select class="form-control select2" name="" id="theme">--}}
{{--                            <option>Choose</option>--}}
{{--                            <option value="dfd">fg</option>--}}
{{--                        </select>--}}
                        <select class="form-select" id="exampleFormControlSelect1" aria-label="Default select example">
                            <option selected="">Theme 1</option>
                            <option value="1">Theme 2</option>
                            <option value="2">Theme 3</option>
                            <option value="3">Theme 4</option>
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
            <div class="modal-footer flex-nowrap">
                <button type="submit" class="btn btn-primary w-50">Save</button>
                <button type="button" class="btn btn-outline-secondary w-50" data-bs-dismiss="modal">Cancel</button>
            </div>
        </div>
    </div>
</div>
