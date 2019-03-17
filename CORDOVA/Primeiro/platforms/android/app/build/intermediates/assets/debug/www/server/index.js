const WebSocket = require('ws');
 
const wss = new WebSocket.Server({ port: 8080 });
 
wss.conexoes = []

const receberMsg = (message, conexaoAtual) =>{
    console.log('xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx')
    wss.conexoes.forEach(conexao => {
        if(conexaoAtual != conexao)
            conexao.send(message)       
    });
};

const desconectado = conexao => {
    let index = wss.conexao.indexOf(conexao)
    wss.conexao.splice(index, 1)
}

const conexao = conexao =>  {
    console.log('asdasdasd')
    wss.conexoes.push(conexao)
    conexao.on('message', message => receberMsg(message, conexao))   
    conexao.on('close', () => desconectado(conexao)) 
    conexao.send('Conectou')
};

wss.on('connection', conexao)