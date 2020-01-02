<div class="tag-edit-container">
    <div id="tag-edit" class="modal">
        <div class="modal-content">
            <span class="closeTagEdit">&times;</span>

            <h1>Edit tag</h1>
            <form id="tag-edit-form" method="POST" enctype="multipart/form-data">
                @method('PUT')
                @csrf

                <input id="tag-edit-name" required class="form-input" type="text" name="name" placeholder="Name">

                <textarea id="tag-edit-description" required class="form-input" name="description"
                    placeholder="Small description of the technology"></textarea>

                <input class="submit-button" type="submit" value="update">
            </form>
        </div>
    </div>
</div>