<h1 style="font-family: lato; font-weight:lighter">freeCodeCamp Back End Development and APIs curriculum</h1>
    <h2>build the final 5 APIs projects but using PHP/Laravel</h2>
    <h3>Timestamp Microservice</h3>
    <ul>
        <li>
            <h4> A request to <code>/api/:date?</code> with a valid date should return a JSON object with a
                <code>unix</code>
                key that is a Unix timestamp of the input date in milliseconds (as type Number)</h4>
        </li>
        <li>
            <h4>A request to <code>/api/:date?</code> with a valid date should return a JSON object with a
                <code>utc</code> key
                that is a string of the input date in the format: <code>Thu, 01 Jan 1970 00:00:00 GMT</code></h4>
        </li>
        <li>
            <h4>A request to <code>/api/1451001600000</code> should return <code>{unix: 1451001600000, utc: "Fri, 25 Dec 2015 00:00:00 GMT" }</code></h4>
        </li>
        <li>
            <h4>Your project can handle dates that can be successfully parsed by <code>new Date(date_string)</code></h4>
        </li>
        <li>
            <h4>If the input date string is invalid, the API returns an object having the structure <code>{ error :"Invalid Date" }</code></h4>
        </li>
        <li>
            <h4>An empty date parameter should return the current time in a JSON object with a <code>unix</code> key
            </h4>
        </li>
        <li>
            <h4>An empty date parameter should return the current time in a JSON object with a <code>utc</code> key</h4>
        </li>
    </ul>
    <hr>
    <h3>Request Header Parser Microservice</h3>
    <ul>
        <li>
            <h4>A request to <code>/api/whoami</code> should return a JSON object with your IP address in the
                <code>ipaddress</code> key.
            </h4>
        </li>
        <li>
            <h4>A request to <code>/api/whoami</code> should return a JSON object with your preferred language in the
                <code>language</code> key.
            </h4>
        </li>
        <li>
            <h4>A request to <code>/api/whoami</code> should return a JSON object with your software in the
                <code>software</code> key.
            </h4>
        </li>
    </ul>
    <hr>
    <h3>URL Shortener Microservice</h3>
    <ul>
        <li>
            <h4>You can POST a URL to <code>/api/shorturl</code> and get a JSON response with <code>original_url</code> and <code>short_url</code> properties. Here's an example: { original_url : <code>'https://freeCodeCamp.org', short_url : 1}</code>
            </h4>
        </li>
        <li>
            <h4>When you visit <code>/api/shorturl/short_url></code>, you will be redirected to the original URL.</h4>
        </li>
        <li>
            <h4>If you pass an invalid URL that doesn't follow the valid <code>http://www.example.com</code> format, the
                JSON
                response will contain <code>{ error: 'invalid url' }</code></h4>
        </li>
    </ul>
    <hr>
    <h3>Exercise Tracker</h3>
    <ul>
        <li>
            <h4>You can <code>POST</code> to <code>/api/users</code> with form data <code>username</code> to create a
                new user.</h4>
        </li>
        <li>
            <h4>The returned response from <code>POST /api/users</code> with form data <code>username</code> will be an
                object with <code>username</code> and <code>_id</code> properties.</h4>
        </li>
        <li>
            <h4>You can make a <code>GET</code> request to <code>/api/users</code> to get a list of all users.</h4>
        </li>
        <li>
            <h4>The <code>GET</code> request to <code>/api/users</code> returns an array.</h4>
        </li>
        <li>
            <h4>Each element in the array returned from <code>GET /api/users</code> is an object literal containing a
                user's <code>username</code> and <code>_id</code>.</h4>
        </li>
        <li>
            <h4>You can <code>POST</code> to <code>/api/users/:_id/exercises</code> with form data
                <code>description</code>, <code>duration</code>, and optionally <code>date</code>. If no date is
                supplied, the current date will be used.</h4>
        </li>
        <li>
            <h4>The response returned from <code>POST /api/users/:_id/exercises</code> will be the user object with the
                exercise fields added.</h4>
        </li>
        <li>
            <h4>You can make a <code>GET</code> request to <code>/api/users/:_id/logs</code> to retrieve a full exercise
                log of any user.</h4>
        </li>
        <li>
            <h4>A request to a user's log <code>GET /api/users/:_id/logs</code> returns a user object with a
                <code>count</code> property representing the number of exercises that belong to that user.</h4>
        </li>
        <li>
            <h4>A <code>GET</code> request to <code>/api/users/:_id/logs</code> will return the user object with a log
                array of all the exercises added.</h4>
        </li>
        <li>
            <h4>Each item in the <code>log</code> array that is returned from <code>GET /api/users/:_id/logs</code> is
                an object that should have a <code>description</code>, <code>duration</code>, and <code>date</code>
                properties.</h4>
        </li>
        <li>
            <h4>The <code>description</code> property of any object in the <code>log</code> array that is returned from
                <code>GET /api/users/:_id/logs</code> should be a string.</h4>
        </li>
        <li>
            <h4>The <code>duration</code> property of any object in the <code>log</code> array that is returned from
                <code>GET /api/users/:_id/logs</code> should be a number.</h4>
        </li>
        <li>
            <h4>The <code>date</code> property of any object in the <code>log</code> array that is returned from
                <code>GET /api/users/:_id/logs</code> should be a string. Use the <code>dateString</code> format of the
                <code>Date</code> API.</h4>
        </li>
        <li>
            <h4>You can add <code>from</code>, <code>to</code> and <code>limit</code> parameters to a <code>GET /api/users/:_id/logs</code> request to retrieve part of the log of any user. <code>from</code> and <code>to</code> are dates in <code>yyyy-mm-dd</code> format. <code>limit</code> is an integer of how
                many logs to send back.</h4>
        </li>
    </ul>
    <hr>
    <h3>File Metadata Microservice</h3>
    <ul>
        <li>
            <h4>You can submit a form that includes a file upload.</h4>
        </li>
        <li>
            <h4>The form file input field has the <code>name</code> attribute set to <code>file</code>.</h4>
        </li>
        <li>
            <h4>When you submit a file, you receive the file <code>name</code>, <code>type</code>, and <code>size</code>
                in bytes within the JSON response.</h4>
        </li>
    </ul>
