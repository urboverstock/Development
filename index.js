const express = require('express');
const cors = require('cors');
const app = express();
app.use(cors());
// const http = require('http');
// const server = require('http').createServer(app);
const server = require('https').createServer(app);


const io = require('socket.io')(server, {
  cors : { origins: ["*"],
    handlePreflightRequest: (req, res) => {
      res.writeHead(200, {
        "Access-Control-Allow-Origin": "*",
        "Access-Control-Allow-Methos": "GET,POST"
      })
    }
  }
});

var usernames = [];

io.on('connection', (socket) => {
  console.log('connection', socket.id);

  //attach icoming listener for new user
  socket.on('adduser', function(senderId){
    // console.log(senderId + 'senderId')
    usernames[senderId] = socket.id;
    // console.log(usernames);
    //notify all connected clients
    io.emit('adduser', senderId);
  });

  socket.on('typing', (data)=>{
    if(data.typing==true)
       io.emit('display', data)
    else
       io.emit('display', data)
  })


  //lisen from client
    socket.on('sendChatToServer', function(data){
    console.log(data)
    receiver = data.receiver;
    //send event to the receiver
    var socketId = usernames[receiver];
    console.log(socketId + ' socketId');
    // io.sockets.emit('sendChatToClient', data); //send message to all users

    socket.to(socketId).emit('sendChatToClient', data);
  });



  // socket.on('sendChatToServer', (data) => {
  //  console.log(data);

  //  console.log(data.receiver + ' receiver');
  //  // io.sockets.emit('sendChatToClient', data);

  //  socket.broadcast.to(data.receiver).emit('sendChatToClient', data);
  // });

  socket.on('disconnect', (socket) => {
    console.log('disconnect');
  })
});

server.listen(3000, () => {
  console.log('listening on *:3000');
});