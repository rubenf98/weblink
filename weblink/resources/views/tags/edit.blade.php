<div class="tag-edit-container">
    <div id="tag-edit" class="modal">
        <div class="modal-content">
            <span class="closeTagEdit">&times;</span>

            <h1>Edit tag</h1>
            <form id="tag-edit-form" action="/tag/1" method="POST" enctype="multipart/form-data">
                @method('PUT')
                @csrf

                <input id="tag-edit-name" required class="form-input" type="text" name="name" placeholder="Name">

                <textarea id="tag-edit-description" required class="form-input" name="description"
                    placeholder="Small description of the technology"></textarea>

                <div class="center">
                    <label for="files" class="custom-file-input">
                        <i class="fa fa-cloud-upload"></i> Upload Image
                    </label>
                    <input required class="file-input" id="files" type="file" name="image" />
                </div>

                <img id="preview-edit-image" class="preview-image" />

                <input class="submit-button" type="submit" value="update">
            </form>
        </div>
    </div>
</div>