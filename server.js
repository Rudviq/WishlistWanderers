import { Server, OPEN } from 'ws';
const wss = new Server({ port: 8080 });

const clients = new Set();

wss.on('connection', function connection(ws) {
    clients.add(ws);

    ws.on('message', function incoming(message) {
        clients.forEach(function each(client) {
            if (client !== ws && client.readyState === OPEN) {
                client.send(message);
            }
        });
    });

    ws.on('close', function () {
        clients.delete(ws);
    });
});
