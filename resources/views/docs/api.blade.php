<h1>Introduction</h1>
<p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Quo perspiciatis quidem ipsa voluptatem vitae
    officiis! Aperiam, ipsum. Laudantium aliquid porro, hic fugit ab, fugiat mollitia excepturi asperiores, iure
    dignissimos sequi?</p>

<h2>Allowed HTTPs requests</h2>
<p> PUT : Update resource </p>
<p> POST : Create resource </p>
<p> GET : Get a resource or list of resources </p>
<p> DELETE : To delete resource</p>

<h2>Description Of Usual Server Responses:</h2>
<ul>
    <li class="list-margin">200 <span class="tag success">OK</span> - the request was successful (some API
        calls may
        return 201 instead).
    </li>
    <li class="list-margin">201 <span class="tag success">Created</span> - the request was successful and a
        resource
        was created.</li>
    <li class="list-margin">204 <span class="tag success">No Content</span> - the request was successful but
        there is
        no representation to
        return (i.e. the response
        is empty).</li>
    <li class="list-margin">400 <span class="tag fail">Bad Request</span> - the request could not be
        understood or
        was missing required
        parameters.</li>
    <li class="list-margin">401 <span class="tag fail">Unauthorized</span> - authentication failed or user
        doesn't
        have permissions for
        requested operation.</li>
    <li class="list-margin">403 <span class="tag fail">Forbidden</span> - access denied.</li>
    <li class="list-margin">404 <span class="tag fail">Not Found</span> - resource was not found.</li>
    <li class="list-margin">405 <span class="tag fail">Method Not Allowed</span> - requested method is not
        supported for resource.</li>
</ul>
<h2>Reference</h2>

<h3 class="api-subtitle">Tag</h3>
<p>All tags that can be attributed to a post. These can be found on the topics section on the navigation bar.</p>
<h4>Attributes</h4>
<ul>
    <li class="list-margin">id <span class="tag type">intenger</span> - unique identifier</li>
    <li class="list-margin">name <span class="tag type">string</span> - topic name</li>
    <li class="list-margin">description <span class="tag type">text</span> - small description of the topic</li>
    <li class="list-margin">image <span class="tag type">string</span> - url of the image</li>
    <li class="list-margin">times_used <span class="tag type">integer</span> - number of times this tag was used on
        posts</li>
    <li class="list-margin">clicks <span class="tag type">integer</span> - number of times this tag was clicked on the
        topics page</li>
    <li class="list-margin">views <span class="tag type">integer</span> - number of views on posts with this tag</li>
    <li class="list-margin">likes <span class="tag type">integer</span> - number of likes on posts with this tag</li>
    <li class="list-margin">created_at <span class="tag type">date</span> - date of creation</li>
</ul>
<h4>Methods</h4>
<ul>
    <li class="list-margin">Listing of all tags with their respective statistics</li>
    <ul>
        <li class="list-margin">GET: /api/stats/tags</li>
        <li class="list-margin">Response: 200</li>
    </ul>
    <li class="list-margin">Listing of all tags</li>
    <ul>
        <li class="list-margin">GET: /api/tags</li>
        <li class="list-margin">Response: 200</li>
    </ul>
    <li class="list-margin">Show one specific tag data</li>
    <ul>
        <li class="list-margin">GET: /api/tag/{tag_id}</li>
        <li class="list-margin">Response: 200</li>
    </ul>
    <li class="list-margin">Destroy one specific tag resource</li>
    <ul>
        <li class="list-margin">DELETE: /api/tag/{tag_id}</li>
        <li class="list-margin">Response: 204</li>
    </ul>
    <li class="list-margin">Create a tag resource</li>
    <ul>
        <li class="list-margin">POST: /api/tag</li>
        <li class="list-margin">Response: 201</li>
    </ul>
</ul>

<h3 class="api-subtitle">Post</h3>
<p>All posts created by our users</p>
<h4>Attributes</h4>
<ul>
    <li class="list-margin">id <span class="tag type">intenger</span> - unique identifier</li>
    <li class="list-margin">title <span class="tag type">string</span> - post name</li>
    <li class="list-margin">description <span class="tag type">text</span> - small description of the topic</li>
    <li class="list-margin">image <span class="tag type">string</span> - url of the image</li>
    <li class="list-margin">source <span class="tag type">string</span> - url for the project source code</li>
    <li class="list-margin">created_at <span class="tag type">date</span> - date of creation</li>
    <li class="list-margin">user <span class="tag type">object</span> - user that created this post</li>
    <li class="list-margin">comment <span class="tag type">array</span> - listing of this posts comments</li>
    <li class="list-margin">tags <span class="tag type">array</span> - listing of this posts tags</li>
    <li class="list-margin">created_at <span class="tag type">date</span> - date of creation</li>

</ul>
<h4>Methods</h4>
<ul>
    <li class="list-margin">Listing of all posts</li>
    <ul>
        <li class="list-margin">/api/posts</li>
    </ul>
    <li class="list-margin">Show one specific post</li>
    <ul>
        <li class="list-margin">/api/post/{post_id}</li>
    </ul>
</ul>

<h3 class="api-subtitle">User</h3>
<h3 class="api-subtitle">Miscelaneous</h3>