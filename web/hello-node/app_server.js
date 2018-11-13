const http = require('http');
const url = require('url');

const PORT = 8888;

http.createServer((request, response) => {
    let app_url = url.parse(request.url, true);

    if (app_url.pathname === '/home') {
        response.writeHead(200, {'Content-Type': 'text/html'});

        response.write('<h1>Welcome to the Node Server main page!</h1>');
        response.write('<p>I only had to wipe my hardrive and reinstall windows to get node working on my machine</p>');
    }  else {
        response.writeHead(404, {'Content-Type': 'text/html'});

        response.write('<h1>Page not found!</h1>');
    }

    response.end();
}).listen(PORT, () => {
    console.log(`Now listening on port ${PORT}`);
});