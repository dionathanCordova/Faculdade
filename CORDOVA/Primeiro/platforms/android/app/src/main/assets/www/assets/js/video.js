window.onload = function(e){ 
    let box_video = document.querySelector('.box-video')
    let img_comments = document.querySelector('.img-comments')
    
    const initVideo = ev => {
        ev.preventDefault()
        box_video.style.display = 'block'
        btn_video.style.display = 'none'
        img_comments.style.display = 'block'
    }

    const initChat = ev => {
        ev.preventDefault()
        box_video.style.display = 'none'
        btn_video.style.display = 'block'
        img_comments.style.display = 'none'
    }

    let btn_video = document.querySelector('.btn_video')
    btn_video.addEventListener('click', initVideo);
    img_comments.addEventListener('click', initChat)
  
   
}
