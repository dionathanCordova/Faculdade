window.onload = function(e){
    const messages = document.querySelector("div.box-message")
    const textarea = document.querySelector("textarea")
    const serverHost = "wss://echo.websocket.org/"
    // const serverHost = "ws://127.0.0.1:8080/"
    const ws = new WebSocket(serverHost)

    const mostraTexto = (className, text) => {
        let div = document.createElement('div')
        div.className = className
        // div.innerHTML = text

        let msg = document.createElement('h5')
        msg.innerText = text

        let horarioSend = document.createElement('p')
        horarioSend.className = 'horario'

        dataSend = new Date()
        var minutos = dataSend.getMinutes()            
        if( minutos < 10) {
            minutos = '0'+ minutos;
        }
        horaSend = dataSend.getHours() + ':' + minutos
        horarioSend.innerText =  horaSend

        let br = document.createElement('br')
        messages.appendChild(br)
        div.appendChild(msg)
        div.appendChild(horarioSend)
        messages.appendChild(div)
    }

    const receberMsg = ev => mostraTexto('msg-received', ev.data)

    const enviarMsg = ev => {
        if(ev.which == 13) {
            ev.preventDefault()
            ws.send(textarea.value)

            mostraTexto('msg-sended', textarea.value)
            let div = document.createElement('div')
            textarea.value = ''
        }
    }

    const btn_send = ev => {
        if(textarea.value != ''){
            ev.preventDefault()
            ws.send(textarea.value)

            mostraTexto('msg-sended', textarea.value)
            let div = document.createElement('div')
            textarea.value = ''
        }           
    }

    const conectado = () => {
        let status = document.querySelector('.system');
        status.style.display = 'block';
    }
    // const conectado = ev => mostraTexto('system', 'Online')
    const desconectado = ev => mostraTexto('system', 'Conexão Perdida');
    const erro = ev => mostraTexto('system-error', ev);

    textarea.addEventListener('keydown', enviarMsg)
    ws.addEventListener('open', conectado)
    ws.addEventListener('close', desconectado)
    ws.addEventListener('message', receberMsg)
    ws.addEventListener('error', erro)

    let button = document.querySelector('.btn_enviar');
    button.addEventListener('click',  btn_send)
}

