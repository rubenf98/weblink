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
<p>Description</p>
<h4>Attributes</h4>
<ul>
    <li class="list-margin">id <span class="tag type">intenger</span> - unique identifier</li>
    <li class="list-margin">name <span class="tag type">string</span> - topic name</li>
    <li class="list-margin">description <span class="tag type">text</span> - small description of the topic</li>
    <li class="list-margin">image <span class="tag type">string</span> - url of the image</li>
</ul>
<h4>Methods</h4>
<ul>
    <li class="list-margin">/api/stats/tags</li>
</ul>

<h3 class="api-subtitle">Post</h3>
<h3 class="api-subtitle">User</h3>
<h3 class="api-subtitle">Miscelaneous</h3>