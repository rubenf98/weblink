<div class="post-edit-container">
    <div id="post-edit" class="modal">
        <div class="modal-content">
            <span class="closePostEdit">&times;</span>

            <h1>Edit post</h1>
            <form id="post-edit-form" method="POST">
                @method('PUT')
                @csrf

                <input id="post-edit-title" required class="form-input" type="text" name="title"
                    placeholder="Name of your project">
                <textarea id="post-edit-description" required class="form-input" name="description"
                    placeholder="Small description of you project"></textarea>


                <div class="chosen-style">
                    <select id="post-edit-tag" multiple="multiple" data-placeholder="Add tags for your project"
                        name="tags[]" class="chosen-select form-input">
                    </select>
                </div>



                <div class="form-double-input">
                    <div class="form-double-item">
                        <label for="url">
                            <p>Reference to project page</p>
                        </label>
                        <input id="post-edit-url" class="form-input" type="text" name="url"
                            placeholder="https://www.weblink.com">
                    </div>

                    <div class="form-double-item">
                        <label for="source">
                            <p>Reference to source code</p>
                        </label>
                        <input id="post-edit-source" class="form-input" type="text" name="source" id=""
                            placeholder="https://bitbucket.org/kwajd/weblink">
                    </div>
                </div>

                <input class="submit-button" type="submit" value="update">
            </form>
        </div>
    </div>
</div>