<div class="tag-suggestion-create-container">
    <div id="tag-suggestion-modal" class="modal">
        <div class="modal-content">
            <span class="closeSuggestion">&times;</span>
            <h1>Suggest a Topic</h1>
            <form action="/tag-suggestion" method="POST">
                @csrf
                <input required class="form-input" type="text" name="name" placeholder="What topic?">
                <textarea class="form-input" name="description" placeholder="Why this topic?"></textarea>

                <input class="form-input" type="text" name="link" placeholder="Got any link or reference to the topic?">

                <input class="form-input" type="email" name="email"
                    placeholder="Your email address, we'll email you if we add your topic!">

                <input class="submit-button" type="submit" value="post">
            </form>
        </div>
    </div>
</div>