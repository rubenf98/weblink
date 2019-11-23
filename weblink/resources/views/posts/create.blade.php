<div class="post-create-container">
    <div id="myModal" class="modal">
        <div class="modal-content">
            <span class="close">&times;</span>
            <h1>Create your post</h1>
            <form action="/post" method="POST" enctype="multipart/form-data">
                @csrf
                <input required class="form-input" type="text" name="title" placeholder="Name of your project">
                <textarea required class="form-input" name="description"
                    placeholder="Small description of you project"></textarea>


                <div class="chosen-style">
                    <select multiple="multiple" data-placeholder="Add tags for your project" name="tags[]"
                        class="chosen-select form-input">
                    </select>
                </div>



                <div class="form-double-input">
                    <div class="form-double-item">
                        <label for="url">
                            <p>Reference to project page</p>
                        </label>
                        <input class="form-input" type="text" name="url" placeholder="https://www.weblink.com">
                    </div>

                    <div class="form-double-item">
                        <label for="source">
                            <p>Reference to source code</p>
                        </label>
                        <input class="form-input" type="text" name="source" id=""
                            placeholder="https://bitbucket.org/kwajd/weblink">
                    </div>


                </div>

                <div class="center">
                    <label for="files" class="custom-file-input">
                        <i class="fa fa-cloud-upload"></i> Upload Image
                    </label>
                    <input class="file-input" id="files" type="file" name="image" />
                </div>

                <img id="preview-image" class="preview-image" />

                <input class="submit-button" type="submit" value="post">
            </form>
        </div>
    </div>
</div>