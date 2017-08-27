var app = require('express')();
var http = require('http').Server(app);
var io = require('socket.io')(http);
var Redis = require('ioredis');
var redis = new Redis();
redis.subscribe('testChannel', function(err, count) {
});
redis.subscribe('tweetChannel', function(err, count) {});

redis.on('message', function(channel, message) {
    console.log('Message Recieved: ' + message);
    message = JSON.parse(message);
    io.emit(channel, message.data);
});
http.listen(3000, function(){
    console.log('Listening on Port 3000');
});
