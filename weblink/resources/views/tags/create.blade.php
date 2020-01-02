<div class="tag-create-container">
    <div id="tag-create" class="modal">
        <div class="modal-content">
            <span class="closeTag">&times;</span>

            <h1>Create new tag</h1>
            <form action="/tag" method="POST" enctype="multipart/form-data">
                @csrf
                <input required class="form-input" type="text" name="name" placeholder="Name">

                <textarea required class="form-input" name="description"
                    placeholder="Small description of the technology"></textarea>

                <div class="center">
                    <label for="files" class="custom-file-input">
                        <i class="fa fa-cloud-upload"></i> Upload Image
                    </label>
                    <input required class="file-input" id="files" type="file" name="image" />
                </div>

                <img id="preview-image" class="preview-image" />

                <input class="submit-button" type="submit" value="create">
            </form>
        </div>
    </div>
</div>